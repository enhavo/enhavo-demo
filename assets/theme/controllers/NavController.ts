import { Controller } from "@hotwired/stimulus";

/**
 * Keeps the `is-active` underline on the nav item you click.
 */
export default class extends Controller {
    static targets = ['navItem'];

    declare readonly navItemTargets: HTMLElement[];

    activate(event: Event) {
        const clicked = event.currentTarget as HTMLElement;
        this.navItemTargets.forEach((item) => {
            item.classList.toggle('is-active', item === clicked);
        });
    }
}
