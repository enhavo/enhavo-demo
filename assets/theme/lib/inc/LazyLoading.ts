import * as $ from 'jquery';

export default abstract class LazyLoading {
    /**
     * Images are loaded as soon as their elements enter the visible viewport
     *
     * Expects Jquery img-elements with an attribute called "data-lazy-load-img-src".
     * The attributes value needs to be a valid URL to an image file.
     * The img can also be inside a picture-element. Every nested source of the element then needs an attribute called "data-srcset".
     * Its value needs to be a valid srcset.
     * @param images
     * @param callback
     * callback will be executed for each image loaded; the image can be used as first argument inside the callback function
     */
    public static initLazyLoadImagesIO(images: JQuery, callback?: Function)
    {
        let self = this;
        let io = new IntersectionObserver(
            entries => {
                entries.forEach(function(entry,index) {
                    if(entry.isIntersecting && ($(entry.target).data('lazy-loaded') == 0 || typeof $(entry.target).data('lazy-loaded') == "undefined")) {
                        let img = $(entry.target);
                        self.handleImageLoad(img,callback);
                    }
                });
            },
            {'rootMargin':'10%'}
        );

        images.each(function() {
            io.observe(this);
        });
    }

    /**
     * Images are loaded as soon as their elements enter the visible viewport
     *
     * Expects Jquery elements with an attribute called "data-lazy-load-background-src".
     * The attributes value needs to be a valid URL to an image file.
     * @param elements
     * @param callback
     * callback will be executed for each image loaded; the element can be used as first argument inside the callback function
     */
    public static initLazyLoadBackgroundImagesIO(elements: JQuery, callback?: Function) {
        let ioBackgrounds = new IntersectionObserver(
            entries => {
                entries.forEach(function(entry,index) {
                    if (entry.isIntersecting && ($(entry.target).data('lazy-loaded') == 0 || typeof $(entry.target).data('lazy-loaded') == "undefined")) {
                        let element = $(entry.target);
                        element.css('background-image','url('+element.data('lazy-load-background-src')+')');
                        element.data('lazy-loaded',1);
                        if(callback && typeof callback == "function") {
                            callback(element);
                        }
                    }
                });
            },
            {'rootMargin':'10%'}
        );

        elements.each(function() {
            ioBackgrounds.observe(this);
        });
    }

    public static initLazyLoadImagesInsideElement(element: JQuery, callbackForEachImage?: Function)
    {
        let self = this;
        let ioElement = new IntersectionObserver(
            entries => {
                entries.forEach(function(entry,index) {
                    if (entry.isIntersecting && ($(entry.target).data('lazy-loaded') == 0 || typeof $(entry.target).data('lazy-loaded') == "undefined")) {
                        let element = $(entry.target);
                        let images = element.find('[data-lazy-load-img-src]');
                        let imagesFinished = 0;
                        images.each(function() {
                            $(this).on('lazyLoadFinished', function() {
                                imagesFinished++;
                                if(imagesFinished == images.length) element.trigger('imagesLazyLoadFinished');
                            });
                            self.handleImageLoad($(this), callbackForEachImage);
                        });
                        element.data('lazy-loaded', 1);
                    }
                });
            },
            {}
        );

        ioElement.observe(element.get(0));
    }

    public static handleImageLoad(img: any, callback?: Function) {
        let isCached = false;

        if(img.parent('picture').length > 0) {
            let sources = img.parent('picture').find('source');
            if(sources.length > 0) {
                sources.each(function() {
                    if($(this).data('srcset')) {
                        $(this).prop('srcset', $(this).data('srcset'));
                    }
                });
            }
        }

        if (window.caches) {
            let imgSrc = img.data('lazy-load-img-src');
            if (window.caches.match(imgSrc)) {
                isCached = true;
                setTimeout(function () {
                    img.on('load', function() {
                        if(callback && typeof callback == "function") {
                            callback(img);
                        }
                        img.trigger('lazyLoadFinished');
                    });
                    img.prop('src', imgSrc);
                }, 1);
                img.data('lazy-loaded', 1);
            }
        }

        if (!isCached) {
            let tempImg = new Image();
            let imgSrc = img.data('lazy-load-img-src');
            tempImg.onload = function () {
                setTimeout(function () {
                    img.on('load', function() {
                        if(callback && typeof callback == "function") {
                            callback(img);
                        }
                        img.trigger('lazyLoadFinished');
                    });
                    img.prop('src', imgSrc);
                }, 1);
            };
            tempImg.src = imgSrc;
            img.data('lazy-loaded', 1);
        }
    }

}