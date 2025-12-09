var THEMEMASCOT = {};
(function($) {

    "use strict";


    /* ---------------------------------------------------------------------- */
    /* --------------------------- Start Demo Switcher  --------------------- */
    /* ---------------------------------------------------------------------- */
    var showSwitcher = true;
    var $body = $('body');
    var $style_switcher = $('#style-switcher');
    if (!$style_switcher.length && showSwitcher) {
        $.ajax({
            url: "color-switcher/style-switcher.html",
            success: function(data) {
                $body.append(data);
            },
            dataType: 'html'
        });
    }

    THEMEMASCOT.isRTL = {
        check: function() {
            if ($("html").attr("dir") === "rtl") {
                return true;
            } else {
                return false;
            }
        }
    };

    THEMEMASCOT.isLTR = {
        check: function() {
            if ($("html").attr("dir") !== "rtl") {
                return true;
            } else {
                return false;
            }
        }
    };

    /* ---------------------------------------------------------------------- */
    /* ----------------------------- En Demo Switcher  ---------------------- */
    /* ---------------------------------------------------------------------- */

    //Hide Loading Box (Preloader)
    function handlePreloader() {
        if ($('.preloader').length) {
            $('.preloader').delay(200).fadeOut(500);
        }
    }

    //Update Header Style and Scroll to Top
    function headerStyle() {
        if ($('.main-header').length) {
            var windowpos = $(window).scrollTop();
            var siteHeader = $('.header-style-one');
            var scrollLink = $('.scroll-to-top');
            var sticky_header = $('.main-header .sticky-header');
            if (windowpos > 100) {
                sticky_header.addClass("fixed-header animated slideInDown");
                scrollLink.fadeIn(300);
            } else {
                sticky_header.removeClass("fixed-header animated slideInDown");
                scrollLink.fadeOut(300);
            }
            if (windowpos > 1) {
                siteHeader.addClass("fixed-header");
            } else {
                siteHeader.removeClass("fixed-header");
            }
        }
    }
    headerStyle();

    //Submenu Dropdown Toggle
    if ($('.main-header li.dropdown ul').length) {
        $('.main-header .navigation li.dropdown').append('<div class="dropdown-btn"><i class="fa fa-angle-down"></i></div>');
    }

    //Mobile Nav Hide Show
    if ($('.mobile-menu').length) {

        var mobileMenuContent = $('.main-header .main-menu .navigation').html();

        $('.mobile-menu .navigation').append(mobileMenuContent);
        $('.sticky-header .navigation').append(mobileMenuContent);
        $('.mobile-menu .close-btn').on('click', function() {
            $('body').removeClass('mobile-menu-visible');
        });

        //Dropdown Button
        $('.mobile-menu li.dropdown .dropdown-btn').on('click', function() {
            $(this).prev('ul').slideToggle(500);
            $(this).toggleClass('active');
        });

        //Menu Toggle Btn
        $('.mobile-nav-toggler').on('click', function() {
            $('body').addClass('mobile-menu-visible');
        });

        //Menu Toggle Btn
        $('.mobile-menu .menu-backdrop, .mobile-menu .close-btn').on('click', function() {
            $('body').removeClass('mobile-menu-visible');
        });

    }

    //Header Search
    if ($('.search-btn').length) {
        $('.search-btn').on('click', function() {
            $('.main-header').addClass('moblie-search-active');
        });
        $('.close-search, .search-back-drop').on('click', function() {
            $('.main-header').removeClass('moblie-search-active');
        });
    }


    //Banner Carousel
    if ($('.banner-carousel').length) {
        $('.banner-carousel').owlCarousel({
            rtl: THEMEMASCOT.isRTL.check(),
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            loop: true,
            margin: 0,
            nav: true,
            smartSpeed: 500,
            autoHeight: true,
            autoplay: true,
            autoplayTimeout: 10000,
            navText: ['<span class="fa fa-long-arrow-alt-left"></span>', '<span class="fa fa-long-arrow-alt-right"></span>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1024: {
                    items: 1
                },
            }
        });
    }


    //Services Carousel
    if ($('.services-carousel').length) {
        $('.services-carousel').owlCarousel({
            rtl: THEMEMASCOT.isRTL.check(),
            loop: true,
            margin: 30,
            nav: false,
            smartSpeed: 500,
            autoHeight: true,
            autoplay: true,
            autoplayTimeout: 10000,
            navText: ['<span class="fa fa-long-arrow-alt-left"></span>', '<span class="fa fa-long-arrow-alt-right"></span>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3
                },
                1200: {
                    items: 4
                },
            }
        });
    }

    //Products Carousel
    if ($('.products-carousel').length) {
        $('.products-carousel').owlCarousel({
            rtl: THEMEMASCOT.isRTL.check(),
            loop: true,
            margin: 30,
            nav: false,
            smartSpeed: 400,
            autoplay: true,
            navText: ['<span class="flaticon-left"></span>', '<span class="flaticon-right"></span>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1024: {
                    items: 4
                },
            }
        });
    }

    // //Clients Carousel
    // if ($('.clients-carousel').length) {
    //     $('.clients-carousel').owlCarousel({
    //         rtl: THEMEMASCOT.isRTL.check(),
    //         loop: true,
    //         margin: 30,
    //         nav: false,
    //         smartSpeed: 400,
    //         autoplay: true,
    //         navText: ['<span class="flaticon-left"></span>', '<span class="flaticon-right"></span>'],
    //         responsive: {
    //             0: {
    //                 items: 1
    //             },
    //             480: {
    //                 items: 2
    //             },
    //             600: {
    //                 items: 3
    //             },
    //             768: {
    //                 items: 4
    //             },
    //             1023: {
    //                 items: 5
    //             },
    //         }
    //     });
    // }

    document.addEventListener('DOMContentLoaded', function () {

    // Helper: get gap between flex children
    function computeGap(container, items) {
        if (!container || items.length < 2) return 0;

        const style = getComputedStyle(container);
        if (style.gap && style.gap !== "0px") {
            return parseFloat(style.gap);
        }

        // Fallback: calculate margin between item 0 & 1
        const r0 = items[0].getBoundingClientRect();
        const r1 = items[1].getBoundingClientRect();
        return Math.round(r1.left - (r0.left + r0.width));
    }

    function setupInfiniteCarousel(selector, duplicates = 2, speedFactor = 120) {

        const carousel = document.querySelector(selector);
        if (!carousel) return;

        if (carousel.dataset.infiniteInitialized === "true") return;

        const items = Array.from(carousel.querySelectorAll(".slide-item"));
        if (!items.length) return;

        // Duplicate items
        const frag = document.createDocumentFragment();
        for (let i = 0; i < duplicates; i++) {
            items.forEach(item => frag.appendChild(item.cloneNode(true)));
        }
        carousel.appendChild(frag);

        // Calculate width of one loop
        let loopWidth = 0;
        const gap = computeGap(carousel, items);

        items.forEach(item => {
            loopWidth += item.getBoundingClientRect().width;
        });
        loopWidth += gap * (items.length - 1);

        if (!loopWidth || loopWidth < 1) {
            loopWidth = Math.round(carousel.scrollWidth / (duplicates + 1));
        }

        // Create unique animation name
        const anim = "carouselAnim_" + Math.random().toString(36).substr(2, 8);

        // Duration based on width
        const duration = Math.max(6, Math.round((loopWidth / speedFactor) * 10) / 10);

        // Reverse for carousel-2 only
        const reverse = selector === ".carousel-2";

        const keyframes = reverse
            ? `
            @keyframes ${anim} {
                0% { transform: translateX(-${loopWidth}px); }
                100% { transform: translateX(0); }
            }
        `
            : `
            @keyframes ${anim} {
                0% { transform: translateX(0); }
                100% { transform: translateX(-${loopWidth}px); }
            }
        `;

        // Inject CSS
        const style = document.createElement("style");
        style.textContent = `
            ${keyframes}
            ${selector} {
                display: flex;
                align-items: center;
                animation: ${anim} ${duration}s linear infinite;
            }
        `;
        document.head.appendChild(style);

        carousel.dataset.infiniteInitialized = "true";
    }

    // Run after all images load
    window.addEventListener("load", function () {
        setupInfiniteCarousel(".carousel-1", 3, 50); // Right → Left
        setupInfiniteCarousel(".carousel-2", 3, 50); // Left → Right
        setupInfiniteCarousel(".carousel-3", 3, 50); // Right → Left
    });

});



    // Testimonial Carousel
    if ($('.testimonial-carousel').length) {
        $('.testimonial-carousel').owlCarousel({
            rtl: THEMEMASCOT.isRTL.check(),
            loop: true,
            margin: 0,
            nav: false,
            items: 1,
            smartSpeed: 700,
            autoplay: 5000,
            navText: ['<span class="flaticon-left-chevron"></span>', '<span class="flaticon-right-chevron"></span>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1199: {
                    items: 3
                },
            }
        });
    }

    // Testinomials Carousel
    if ($('.testimonial-content').length) {
        var testimonial_thumbs = new Swiper('.testimonial-thumbs', {
            spaceBetween: 5,
            loop: false,
            slidesPerView: 3,
            breakpoints: {
                320: {
                    slidesPerView: 3,
                },
                600: {
                    slidesPerView: 3,
                },
            }
        });

        var testimonial_content = new Swiper('.testimonial-content', {
            spaceBetween: 0,
            effect: 'fade',
            loop: true,
            thumbs: {
                swiper: testimonial_thumbs
            },
            pagination: {
                el: '.testimonial-pagination',
                clickable: true,
            },
        });
    }

    //Fact Counter + Text Count
    if ($('.count-box').length) {
        $('.count-box').appear(function() {

            var $t = $(this),
                n = $t.find(".count-text").attr("data-stop"),
                r = parseInt($t.find(".count-text").attr("data-speed"), 10);

            if (!$t.hasClass("counted")) {
                $t.addClass("counted");
                $({
                    countNum: $t.find(".count-text").text()
                }).animate({
                    countNum: n
                }, {
                    duration: r,
                    easing: "linear",
                    step: function() {
                        $t.find(".count-text").text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $t.find(".count-text").text(this.countNum);
                    }
                });
            }

        }, {
            accY: 0
        });
    }

    //Accordion Box
    if ($('.accordion-box').length) {
        $(".accordion-box").on('click', '.acc-btn', function() {

            var outerBox = $(this).parents('.accordion-box');
            var target = $(this).parents('.accordion');

            if ($(this).hasClass('active') !== true) {
                $(outerBox).find('.accordion .acc-btn').removeClass('active ');
            }

            if ($(this).next('.acc-content').is(':visible')) {
                return false;
            } else {
                $(this).addClass('active');
                $(outerBox).children('.accordion').removeClass('active-block');
                $(outerBox).find('.accordion').children('.acc-content').slideUp(300);
                target.addClass('active-block');
                $(this).next('.acc-content').slideDown(300);
            }
        });
    }


    //LightBox / Fancybox
    if ($('.lightbox-image').length) {
        $('.lightbox-image').fancybox({
            openEffect: 'fade',
            closeEffect: 'fade',
            helpers: {
                media: {}
            }
        });
    }


    // Scroll to a Specific Div
    if ($('.scroll-to-target').length) {
        $(".scroll-to-target").on('click', function() {
            var target = $(this).attr('data-target');
            // animate
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 300);

        });
    }

    // Elements Animation
    if ($('.wow').length) {
        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: false, // trigger animations on mobile devices (default is true)
            live: true // act on asynchronously loaded content (default is true)
        });
        wow.init();
    }



    // count Bar
    if ($(".count-bar").length) {
        $(".count-bar").appear(
            function() {
                var el = $(this);
                var percent = el.data("percent");
                $(el).css("width", percent).addClass("counted");
            }, {
                accY: -50
            }
        );
    }



    $(".quantity-box .add").on("click", function() {
        if ($(this).prev().val() < 999) {
            $(this)
                .prev()
                .val(+$(this).prev().val() + 1);
        }
    });
    $(".quantity-box .sub").on("click", function() {
        if ($(this).next().val() > 1) {
            if ($(this).next().val() > 1)
                $(this)
                .next()
                .val(+$(this).next().val() - 1);
        }
    });


    if ($('.product-details .bxslider').length) {
        $('.product-details .bxslider').bxSlider({
            nextSelector: '.product-details #slider-next',
            prevSelector: '.product-details #slider-prev',
            nextText: '<i class="fa fa-angle-right"></i>',
            prevText: '<i class="fa fa-angle-left"></i>',
            mode: 'fade',
            auto: 'true',
            speed: '700',
            pagerCustom: '.product-details .slider-pager .thumb-box'
        });
    };

    //Tabs Box
    if ($('.tabs-box').length) {
        $('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {
            e.preventDefault();
            var target = $($(this).attr('data-tab'));

            if ($(target).is(':visible')) {
                return false;
            } else {
                target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
                $(this).addClass('active-btn');
                target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
                target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
                $(target).fadeIn(300);
                $(target).addClass('active-tab');
            }
        });
    }

    //Price Range Slider
    if ($('.price-range-slider').length) {
        $(".price-range-slider").slider({
            range: true,
            min: 10,
            max: 99,
            values: [10, 60],
            slide: function(event, ui) {
                $("input.property-amount").val(ui.values[0] + " - " + ui.values[1]);
            }
        });

        $("input.property-amount").val($(".price-range-slider").slider("values", 0) + " - $" + $(".price-range-slider").slider("values", 1));
    }



    // Select2 Dropdown
    $('.custom-select').select2({
        minimumResultsForSearch: 7,
    });

    //Gallery Filters
    if ($('.filter-list').length) {
        $('.filter-list').mixItUp({});
    }

    /* ---------------------------------------------------------------------- */
    /* ----------- Activate Menu Item on Reaching Different Sections ---------- */
    /* ---------------------------------------------------------------------- */
    var $onepage_nav = $('.onepage-nav');
    var $sections = $('section');
    var $window = $(window);

    function TM_activateMenuItemOnReach() {
        if ($onepage_nav.length > 0) {
            var cur_pos = $window.scrollTop() + 2;
            var nav_height = $onepage_nav.outerHeight();
            $sections.each(function() {
                var top = $(this).offset().top - nav_height - 80,
                    bottom = top + $(this).outerHeight();

                if (cur_pos >= top && cur_pos <= bottom) {
                    $onepage_nav.find('a').parent().removeClass('current').removeClass('active');
                    $sections.removeClass('current').removeClass('active');
                    $onepage_nav.find('a[href="#' + $(this).attr('id') + '"]').parent().addClass('current').addClass('active');
                }

                if (cur_pos <= nav_height && cur_pos >= 0) {
                    $onepage_nav.find('a').parent().removeClass('current').removeClass('active');
                    $onepage_nav.find('a[href="#header"]').parent().addClass('current').addClass('active');
                }
            });
        }
    }


    /* ==========================================================================
       When document is Scrollig, do
       ========================================================================== */

    $(window).on('scroll', function() {
        headerStyle();
        TM_activateMenuItemOnReach();
    });

    /* ==========================================================================
       When document is loading, do
       ========================================================================== */

    $(window).on('load', function() {
        handlePreloader();
    });

})(window.jQuery);