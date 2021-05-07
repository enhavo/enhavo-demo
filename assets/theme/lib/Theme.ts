import * as $ from "jquery";
import 'slick-carousel';
import InitializerInterface from "@enhavo/app/InitializerInterface";
import Application from './inc/Application';
import LazyLoading from './inc/LazyLoading';
import Slider from './inc/Slider';

export default class Theme implements InitializerInterface
{
    public init(element: HTMLElement)
    {
        let app = new Application();
        $(() => {
            app.init();
            LazyLoading.initLazyLoadBackgroundImagesIO($('[data-lazy-load-background-src]'));
            LazyLoading.initLazyLoadImagesIO($('[data-lazy-load-img-src]'));
            this.handleLoadingCursor(element);
            $('[data-block="slider"]').each(function() {
                Slider.initSlickSlider($(this));
            });
        })
    }

    private handleLoadingCursor(element: HTMLElement)
    {
        $('[data-loading-screen]').on('mouseover', function() {
            $(this).find('[data-loading-spinner]').fadeIn();
            document.onmousemove = handleMouseMove;
            function handleMouseMove(event: any) {

                let eventDoc, doc, body;
                event = event || window.event;

                if (event.pageX == null && event.clientX != null) {
                    eventDoc = (event.target && event.target.ownerDocument) || document;
                    doc = eventDoc.documentElement;
                    body = eventDoc.body;

                    event.pageX = event.clientX +
                        (doc && doc.scrollLeft || body && body.scrollLeft || 0) -
                        (doc && doc.clientLeft || body && body.clientLeft || 0);
                    event.pageY = event.clientY +
                        (doc && doc.scrollTop  || body && body.scrollTop  || 0) -
                        (doc && doc.clientTop  || body && body.clientTop  || 0 );
                }

                let element = <HTMLElement>document.getElementsByClassName('loading')[0];

                element.style.top=event.pageY+'px';
                element.style.left=event.pageX+'px';
            }
        });
        $('[data-loading-screen]').on('mouseleave', function() {
            $('[data-loading-spinner]').fadeOut();
        });
    };
}