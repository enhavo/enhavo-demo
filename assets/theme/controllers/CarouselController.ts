import {Controller} from "@hotwired/stimulus";
import * as $ from 'jquery';

export default class extends Controller {
    static targets = ["track", "slide", "navButton"];

    connect() {
        this.currentIndex = 0;
        this.updateNavButtons(); // Ensure updateNavButtons is called when the controller connects
    }

    updateNavButtons() {
        this.navButtonTargets.forEach((button, index) => {
            button.classList.toggle("active", index === this.currentIndex);
        });
    }

    moveToSlide(index) {
        this.currentIndex = index;
        const slideWidth = this.slideTargets[0].offsetWidth;
        this.trackTarget.style.transform = `translateX(-${slideWidth * index}px)`;
        this.updateNavButtons(); // Call updateNavButtons to update navigation buttons
    }

    right() {
        console.log('right cliekd')
        if (this.currentIndex < this.slideTargets.length - 1) {
            this.moveToSlide(this.currentIndex + 1);
        } else {
            this.moveToSlide(0); // Move to the first slide if currently on the last slide
        }
    }

    left() {
        if (this.currentIndex > 0) {
            this.moveToSlide(this.currentIndex - 1);
        } else {
            this.moveToSlide(this.slideTargets.length - 1); // Move to the last slide if currently on the first slide
        }
    }

    goTo(event) {
        const index = this.navButtonTargets.indexOf(event.currentTarget);
        this.moveToSlide(index);
    }
}