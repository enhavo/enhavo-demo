import * as $ from 'jquery';
import 'slick-carousel';

export default abstract class Slider {
    /**
     *
     * Expects a Jquery element with a child having a data attribute "data-slider".
     * @param container
     *
     */
    public static initSlickSlider(container: JQuery, options?: any) {
        let slider = container.find('[data-slider]');
        if(!options) {
            options = {
                autoplay: true,
                arrows: false,
                speed: 800,
                autoplaySpeed: 5000,
                fade:true,
                adaptiveHeight: true,
                dots: true,
                appendDots: container
            };
        }
        slider.slick(options);
    }
}