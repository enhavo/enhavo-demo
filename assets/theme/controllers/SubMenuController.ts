import { Controller } from "@hotwired/stimulus";
import * as $ from 'jquery';
export default class extends Controller {
    static targets = ['trigger', 'menu'];
    connect() {
        this.setupHover();
        console.log('submenu working');
    }

    setupHover() {
        const _this = this;

        // Hover on the headline to show the submenu
        $(this.triggerTargets).hover(
            function () {
                $(this).siblings(_this.menuTarget).addClass('active');
            },
            function () {
                $(this).siblings(_this.menuTarget).removeClass('active');
            }
        );

        // Keep submenu visible on hover
        $(this.menuTargets).hover(
            function () {
                $(this).addClass('active');
            },
            function () {
                $(this).removeClass('active');
            }
        );
    }
}