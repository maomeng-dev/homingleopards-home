'use strict';

let $doc = $(document);

let lazyload = {
    init: function(conf) {
        conf = conf || {};
        this.delay = conf.delay || 100;
        this.distance = conf.distance || 100;

        let scrollTimer = 0;

        $doc.on('scroll resize', () => {
            clearTimeout(scrollTimer);
            scrollTimer = setTimeout(() => {
                this.lazy();
            }, this.delay);
        });

        this.lazy();
    },

    lazy: function() {
        $.each($('[data-lazysrc]'), (index, element) => {
            this.check(element);
        });
    },

    check: function(element) {
        if (element.getBoundingClientRect().top - window.innerHeight < this.distance) {
            this.load(element);
        }
    },

    load: function(element) {
        let $ele = $(element);
        $ele
            .attr({
                src: $ele.attr('data-lazysrc')
            })
            .removeAttr('data-lazysrc');
    }
};

module.exports = lazyload;