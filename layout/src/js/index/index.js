'use strict';

let totop = require('../common/totop.module');
let scrollTrigger = require('../common/scrollTrigger.module');

$(() => {
    let page = {
        eles: {
            slider: $('.banner-slide')
        },

        init: function () {
            totop.init();
            scrollTrigger.init();

            this.initSlider();
        },

        initSlider: function () {
            this.eles.slider.slick({
                autoplay: true,
                autoplaySpeed: 5000,
                pauseOnHover: false,
                arrows: false,
                dots: true,
                infinite: true
            });
        }
    };

    page.init();
});