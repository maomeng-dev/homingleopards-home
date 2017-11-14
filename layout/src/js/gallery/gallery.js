'use strict';

let totop = require('../common/totop.module');

$(() => {
    let page = {
        eles: {
            slider: $('.banner-slide')
        },

        init: function() {
            totop.init();
        }
    };

    page.init();
});