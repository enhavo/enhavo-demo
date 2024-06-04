import { Controller } from "@hotwired/stimulus";
import * as $ from 'jquery'
export default class extends Controller {
    static targets = ["grid","caret","caretDown"];
    public jobs : string[];
    caretTarget!: HTMLElement;
    caretDownTarget!: HTMLElement;
    showCaret: boolean = true; // Initial state
    connect() {
        this.updateCaret();
    }
    down() {
        console.log('caret-down')
        $('.job-button,.hr-container,hr,.caret-down').toggleClass('open-job');
        this.showCaret = !this.showCaret;
        this.updateCaret();
        $('.caret').toggleClass('open-caret');
    }
    caret(){
        console.log('carter clicked');
        $('.job-button,.hr-container,hr,.caret-down').toggleClass('open-job');
        this.showCaret = !this.showCaret;
        this.updateCaret();
        $('.caret').toggleClass('hide-caret');
    }
    updateCaret() {
        if (this.showCaret) {
            this.caretTarget.style.display = "inline-block";
            this.caretDownTarget.style.display = "none";
        } else {
            this.caretTarget.style.display = "none";
            this.caretDownTarget.style.display = "inline-block";
        }
    }
    filterByJobType(event) {
        const jobType = event.target.dataset.jobType;
        const jobItems = this.gridTarget.querySelectorAll('[data-job-item]');
        jobItems.forEach(blocks => {
            const itemJobType = blocks.querySelector('[data-job-type] ').textContent;
            if (jobType === "" || itemJobType === jobType) {
                blocks.style.display = 'block'; // Show the item
            } else {
                blocks.style.display = 'none'; // Hide the item
            }
        });
    }
}
