import { Controller } from "@hotwired/stimulus";
import $ from "jquery";
export default class extends Controller {
    static targets = ["type", "typeContainer", "toggleIcon", "item"];

    connect() {
        this.showingTypes = false;
    }

    filterByJobType(e) {
        e.preventDefault();
        this.toggleJobTypesVisibility();

    }
    toggleJobTypesVisibility() {
        this.showingTypes = !this.showingTypes;
        this.typeContainerTarget.classList.toggle('visible', this.showingTypes);
        this.toggleIconTarget.classList.toggle('visible', this.showingTypes);
    }
    filterItems(e) {
        const selectedType = e.currentTarget.textContent.trim();
        this.itemTargets.forEach((item) => {
            item.style.display = "block";
        });
        this.itemTargets.forEach((item) => {
            if (item.getAttribute('data-type') !== selectedType) {
                item.style.display = "none";
            }
        });
    }
}
