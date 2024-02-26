import * as VueRouter from "vue-router";
import {VueFactory} from "@enhavo/app/vue/VueFactory";

export class VueRouterFactory
{
    private router: VueRouter.Router;

    constructor(
        private vueFactory: VueFactory,
    ) {
    }

    getRouter(): VueRouter.Router
    {
        return this.router;
    }

    createRouter()
    {
        const routes = [
            { path: '/', name: 'sample_name', component: this.vueFactory.getComponent('sample-component'), },
        ];

        this.router = VueRouter.createRouter({
            history: VueRouter.createWebHistory(),
            routes,
        })

        return this.router;
    }
}
