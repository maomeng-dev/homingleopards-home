'use strict';

let totop = require('../common/totop.module');

$(() => {
    let $body = $('html, body');
    let $doc = $(document);

    let page = {
        eles: {
            content: $('.content'),
            slider: $('.distribution-slide'),
            valueWrap: $('.value-wrap'),
            goalBlock: $('.goal')
        },

        init: function() {
            this.initBanner();
            this.initSlider();
            this.initValue();
            this.initGoal();

            totop.init();
        },

        initBanner: function() {
            let whellLock = false;

            // click event
            $body.on('click', '.banner-scrollbtn', () => {
                whellLock = true;
                $body.stop().animate({
                    scrollTop: window.innerHeight
                }, 500, () => {
                    whellLock = false;
                });
            });

            // mouse wheel scroll
            $body.on('wheel', (e) => {
                if (whellLock) {
                    e.preventDefault();
                    return false;
                }

                if ($doc.scrollTop() < window.innerHeight) {
                    // at banner
                    whellLock = true;

                    if ((e.originalEvent.deltaY || -e.originalEvent.wheelDelta) > 0) {
                        // wheel scroll down
                        $body.stop().animate({
                            scrollTop: window.innerHeight
                        }, 500, () => {
                            whellLock = false;
                        });
                    } else {
                        // wheel scroll up
                        $body.stop().animate({
                            scrollTop: 0
                        }, 500, () => {
                            whellLock = false;
                        });
                    }
                }
            });
        },

        initSlider: function() {
            this.eles.slider.slick({
                autoplay: true,
                autoplaySpeed: 5000,
                arrows: false,
                dots: true,
                infinite: true,
                lazyLoad: 'ondemand'
            });
        },

        initValue: function() {
            this.eles.valueWrap
                .on('mouseenter', '.value-wrap-block', (e) => {
                    let $target            = $(e.currentTarget),
                        targetClassElement = $(e.delegateTarget),
                        targetClassName    = 'value-' + $target.attr('data-block');

                    if (!targetClassElement.hasClass(targetClassName)) {
                        targetClassElement
                            .removeClass('value-left')
                            .removeClass('value-right')
                            .addClass(targetClassName);
                    }
                })
                .on('mouseleave', (e) => {
                    let $target = $(e.currentTarget);
                    $target
                        .removeClass('value-left')
                        .removeClass('value-right')
                });
        },

        initGoal: function() {
            $doc.on('scroll', () => {
                this.eles.goalBlock.css({
                    'background-position': '0 ' + (this.eles.goalBlock[0].getBoundingClientRect().top / 20).toString() + 'px'
                });
            });
        }
    };

    page.init();
});