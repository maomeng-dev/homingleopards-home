'use strict';

let totop = require('../common/totop.module');
let Tab = require('../common/tab.module');

$(() => {
    let $body = $('html, body');
    let $doc = $(document);

    let page = {
        eles: {
            introSlide: $('#introSlide'),

            progressTab: $('#progressTab'),
            progressContent: $('#progressContent')
        },

        init: function () {
            this.initSlider();
            this.initTab();
            totop.init();
        },

        initSlider: function () {
            this.eles.introSlide.slick({
                autoplay: true,
                dots: false,
                prevArrow: '<a><i class="fa fa-chevron-left" aria-hidden="true"></i></a>',
                nextArrow: '<a><i class="fa fa-chevron-right" aria-hidden="true"></i></a>',
                lazyLoad: 'ondemand'
            });
        },

        initTab: function () {
            new Tab({
                tabContainer: this.eles.progressTab,
                contentContainer: this.eles.progressContent
            });
        }
    };

    page.init();
});