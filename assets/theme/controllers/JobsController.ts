import { Controller } from "@hotwired/stimulus";
import $ from "jquery";
export default class extends Controller {
    static targets = ["type", "typeContainer", "toggleIcon", "item", "label", "reset"];

    connect() {
        this.showingTypes = false;
        this.defaultLabel = this.hasLabelTarget ? this.labelTarget.textContent.trim() : "";
        this.updateResetVisibility();
    }

    updateResetVisibility() {
        if (!this.hasResetTarget) {
            return;
        }
        const isDefault = !this.hasLabelTarget || this.labelTarget.textContent.trim() === this.defaultLabel;
        this.resetTarget.style.display = isDefault ? "none" : "block";
    }

    toggleJobTypes(e) {
        e.preventDefault();
        this.showingTypes = !this.showingTypes;
        this.typeContainerTarget.classList.toggle('visible', this.showingTypes);
        this.toggleIconTarget.classList.toggle('visible', this.showingTypes);
    }

    closeDropdown() {
        this.showingTypes = false;
        this.typeContainerTarget.classList.remove('visible');
        this.toggleIconTarget.classList.remove('visible');
    }

    filterItems(e) {
        const selectedType = e.currentTarget.textContent.trim();
        this.itemTargets.forEach((item) => {
            item.style.display = item.getAttribute('data-type') === selectedType ? "block" : "none";
        });
        this.labelTarget.textContent = selectedType;
        this.updateResetVisibility();
        this.closeDropdown();
    }

    showAll(e) {
        e.preventDefault();
        this.itemTargets.forEach((item) => {
            item.style.display = "block";
        });
        this.labelTarget.textContent = this.defaultLabel;
        this.updateResetVisibility();
        this.closeDropdown();
    }
}
