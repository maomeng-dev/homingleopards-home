'use strict';

$(() => {
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
        },

        initBanner: function() {
            $doc.on('scroll', function(e) {
            });
        },

        initSlider: function() {
            this.eles.slider.slick({
                autoplay: true,
                autoplaySpeed: 5000,
                arrows: false,
                dots: true,
                infinite: true
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
            $doc.on('scroll', (e) => {
                this.eles.goalBlock.css({
                    'background-position': '0 ' + (this.eles.goalBlock[0].getBoundingClientRect().top / 20).toString() + 'px'
                });
            });
        }
    };

    page.init();
});