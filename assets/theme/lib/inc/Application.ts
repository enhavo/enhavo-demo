import * as $ from 'jquery';

export default class Application {

    private scrolling:boolean = false;
    private headerHeight = 0;

    public init()
    {
        this.headerHeight = $('[data-header]').height();
        this.handleMenuOnScroll();
        this.toggleMobileMenu();
        this.handleBackToTop($('[data-back-to-top]'));
    }

    private handleBackToTop(elements: JQuery) {
        let self = this;

        $('html,body').on("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove", function () {
            if (self.scrolling) $(this).stop();
        });

        elements.on('click', function () {
            self.scrolling = true;
            $('body,html').animate({
                scrollTop: 0
            }, {
                duration: 800,
                complete: function () {
                    self.scrolling = false;
                }
            });
            return false;
        });

        $(window).on('scroll', function() {
            self.checkHandleBackToTopScrollPosition(elements);
        });
        self.checkHandleBackToTopScrollPosition(elements);
    }

    private checkHandleBackToTopScrollPosition(elements: JQuery)
    {
        let windowHeight = $(window).height();
        let documentHeight = document.documentElement.scrollHeight;
        let scrollSpace = documentHeight - windowHeight - 2*windowHeight/3;
        if(scrollSpace > windowHeight) scrollSpace = windowHeight;
        let scrollTop = $(document).scrollTop();
        if(scrollTop > 2*windowHeight/3) {
            scrollTop = scrollTop - 2*windowHeight/3;
            let opacity = scrollTop/scrollSpace;
            if(opacity > 1) opacity = 1;
            elements.css('opacity',opacity);
        } else {
            elements.css('opacity',0);
        }
    }

    private toggleMobileMenu()
    {
        let menuBtn = $('[data-mobile-menu-toggle]');
        menuBtn.on('click', function() {
            $('html').toggleClass('menu-active');
        });
    }

    private handleMenuOnScroll()
    {
        let self = this;

        $(window).on('scroll', function() {
            self.checkScrollPosition();
        });
        this.checkScrollPosition();
    }

    private checkScrollPosition()
    {
        let scrolled = $(window).scrollTop();
        if(scrolled > 2*this.headerHeight) {
            $('html').addClass('scrolled');
        } else {
            $('html').removeClass('scrolled');
        }
    }
}
