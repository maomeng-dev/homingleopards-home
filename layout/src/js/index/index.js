'use strict';

let totop = require('../common/totop.module');
let passive = require('../common/passive.module');


$(() => {
    let page = {
        eles: {
            slider: $('.banner-slide')
        },

        init: function() {
            totop.init();

            this.initSlider();
        },

        initSlider: function() {
            this.eles.slider.slick({
                autoplay: true,
                autoplaySpeed: 5000,
                arrows: false,
                dots: true,
                infinite: true
            });
        }
    };

    page.init();
});