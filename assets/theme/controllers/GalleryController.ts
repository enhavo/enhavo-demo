import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ["item"];

    connect() {
        this.currentIndex = 0;
        this.showCurrent();
    }

    toggle() {
        this.element.classList.toggle('collapsed');
    }

    next() {
        if (this.itemTargets.length === 0) return;
        this.currentIndex = (this.currentIndex + 1) % this.itemTargets.length;
        this.showCurrent();
    }

    prev() {
        if (this.itemTargets.length === 0) return;
        this.currentIndex = (this.currentIndex - 1 + this.itemTargets.length) % this.itemTargets.length;
        this.showCurrent();
    }

    showCurrent() {
        this.itemTargets.forEach((item, index) => {
            item.classList.toggle('active', index === this.currentIndex);
        });
    }
}
