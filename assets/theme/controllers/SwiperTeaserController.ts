import { Controller } from "@hotwired/stimulus";
import $ from 'jquery';
import 'slick-carousel';

export default class extends Controller {
    static targets = ["slide", "navButton"];

    connect() {
        console.log('Slick carousel initialized', this.element);
        $(this.slideTarget).slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            pauseOnHover:true,
            responsive: [
                {
                    breakpoint: 780,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });

        this.setupNavigation();

        $(this.slideTarget).on('afterChange', (event, slick, currentSlide) => {
            this.highlightActiveButton(currentSlide);
        });
    }

    setupNavigation() {
        this.navButtonTargets.forEach((button) => {
            const index = button.dataset.index;

            button.addEventListener('click', () => {
                $(this.slideTarget).slick('slickGoTo', index);
                this.highlightActiveButton(index);
            });
        });
    }

    highlightActiveButton(index) {
        this.navButtonTargets.forEach((btn) => btn.classList.remove('active'));
        this.navButtonTargets[index].classList.add('active');
    }
}
