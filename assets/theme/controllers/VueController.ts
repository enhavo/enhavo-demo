import {Controller} from "@hotwired/stimulus";
import AppComponent from "../components/App.vue";
import {VueFactory} from "@enhavo/app/vue/VueFactory";
import {VueRouterFactory} from "../vue/VueRouterFactory";

export default class extends Controller
{
    connect()
    {
        this.init().then(() => {

        });
    }

    async init()
    {
        const vueFactory: VueFactory = await this.application.container.get('@enhavo/app/vue/VueFactory');
        const vueRouterFactory: VueRouterFactory = await this.application.container.get('vue/VueRouterFactory');
        const app = vueFactory.createApp(AppComponent);
        app.use(vueRouterFactory.createRouter());
        app.mount(this.element);
    }
}
