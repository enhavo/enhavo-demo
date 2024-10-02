import { Controller } from "@hotwired/stimulus";
import $ from 'jquery';
import 'slick-carousel';

export default class extends Controller {
    static targets = ["slide", "navButton"];

    connect() {
        $(this.slideTarget).slick({
            slidesToShow: 2,
            centerMode:true,
            slidesToScroll: 1,
            autoplay: true,
            arrows:false,
            dots: true,
            autoplaySpeed: 2000,
            pauseOnHover:true,
            responsive: [
                {
                    breakpoint: 780,
                    settings: {
                        slidesToShow: 2,
                        centerMode:true,
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
    }
}
