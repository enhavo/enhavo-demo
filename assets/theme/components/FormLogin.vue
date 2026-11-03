<template>
    <form-form :form="form">
        <div class="form-wrapper">
            <form-widget :form="form.get('userIdentifier')"></form-widget>
            <form-widget :form="form.get('password')"></form-widget>
            <form-widget :form="form.get('csrfToken')"></form-widget>
        </div>
        <ul class="form-field__errors" v-if="form.errors.length > 0">
            <li v-for="error in form.errors">{{ error.message }}</li>
        </ul>
        <button class="theme-cta__button" type="submit" :disabled="loading">Login</button>
    </form-form>
</template>

<script setup lang="ts">
import {ref} from "vue";
import {ChoiceForm} from "@enhavo/vue-form/model/ChoiceForm";
import {FormUtil} from "@enhavo/vue-form/form/FormUtil";

const props = defineProps<{
    form: ChoiceForm
}>()

const userIdentifier = props.form.get('userIdentifier')
userIdentifier.attr = {...userIdentifier.attr, placeholder: 'E-Mail-Adresse'}

const password = props.form.get('password')
password.attr = {...password.attr, placeholder: 'Passwort'}

const loading = ref(false)

function applyErrors(formData: any): void
{
    props.form.errors = formData?.errors ?? []

    for (const child of (formData?.children ?? [])) {
        if (!props.form.has(child.name)) {
            continue
        }

        props.form.get(child.name).errors = child.errors ?? []

        if (child.name === 'csrfToken' && typeof child.value === 'string') {
            props.form.get('csrfToken').value = child.value
        }
    }
}
function validateRequired(): boolean
{
    let valid = true

    const identifier = props.form.get('userIdentifier')
    const password = props.form.get('password')

    identifier.errors = []
    password.errors = []

    if (!identifier.value) {
        identifier.errors = [{message: 'Please enter your e-mail address.'}]
        valid = false
    }

    if (!password.value) {
        password.errors = [{message: 'Please enter your password.'}]
        valid = false
    }

    return valid
}

async function onSubmit(event: Event): Promise<void>
{
    event.preventDefault()

    if (loading.value) {
        return
    }

    if (!validateRequired()) {
        return
    }

    loading.value = true

    try {
        const response = await FormUtil.submitAsync(props.form)

        if (response.data?.redirect) {
            window.location.href = response.data.redirect
            return
        }

        if (response.data?.form) {
            applyErrors(response.data.form)
        }
    } catch (error: any) {
        const data = error?.response?.data

        if (data?.form) {
            applyErrors(data.form)
        }
    } finally {
        loading.value = false
    }
}
</script>
