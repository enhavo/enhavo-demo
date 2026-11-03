import {Form} from "@enhavo/vue-form/model/Form";
import {FormUtil} from "@enhavo/vue-form/form/FormUtil";
import {FormFactory} from "@enhavo/vue-form/form/FormFactory";
import axios from "axios";

export default class FormManager
{
    public form: Form = null;
    public formActionUrl: string = null;
    public loading: boolean = false;
    public hasErrors: boolean = false;
    public success: boolean = false;
    public successMessageHtml: string = null;

    constructor(
        private formFactory: FormFactory,
    ) {
    }

    public submit(): Promise<boolean>
    {
        console.log('contact-form submitted')
        if (this.formActionUrl === null) {
            this.formActionUrl = this.form.action;
        }
        if (this.formActionUrl === null) {
            this.formActionUrl = location.href;
        }
        return new Promise<boolean>((resolve) => {
            this.loading = true;
            this.hasErrors = false;
            axios
                .post(this.formActionUrl, FormUtil.serializeForm(this.form))

                .then((response) => {
                    if (this.form) {
                        this.form.destroy();
                    }
                    this.form = this.formFactory.create(response.data.form);

                    console.log(response);
                    this.hasErrors = this.formHasErrors(this.form);
                    if (!this.hasErrors) {
                        window.location.href = response.data.redirect;
                        return;
                    }
                    this.loading = false;
                    resolve(this.success);
                })
                .catch((error) => {
                    console.log(error.response);
                    if (error.hasOwnProperty('response')
                        && error.response.hasOwnProperty('data')
                        && error.response.data.hasOwnProperty('form')
                    ) {
                        if (this.form) {
                            this.form.destroy();
                        }
                        this.form = this.formFactory.create(error.response.data.form);
                    } else {
                        console.log(error);
                    }
                    this.hasErrors = true;
                    this.success = false;
                    this.loading = false;
                    resolve(false);
                });
        });
    }

    private formHasErrors(form: Form): boolean
    {
        if (form.errors.length > 0) {
            return true;
        }
        for(let child of form.children) {
            if (this.formHasErrors(child)) {
                return true;
            }
        }
        return false;
    }
}
