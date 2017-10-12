'use strict';

let $doc = $(document);
let $body = $('html, body');

let totop = {
    init: function(conf) {
        conf = conf || {};
        this.wrapWidth = conf.wrapWidth || 1440;
        this.className = conf.className || 'page-totop';
        this.duration = conf.duration || 500;

        this.template = '<a class="page-totop" style="display: none;"><i class="fa fa-chevron-up" aria-hidden="true"></i><span>返回顶部</span></a>';
        this.element = $(ejs.render(this.template));

        $doc.on('scroll resize', () => {
            this.check();
        });

        this.element.on('click', function() {
            $body.stop().animate({
                scrollTop: 0
            }, 500);
        });

        $body.append(this.element);
        this.check();
    },

    check: function() {
        if (this.wrapWidth > window.innerWidth) {
            this.element.stop().fadeOut();
        } else {
            if ($doc.scrollTop() > window.innerHeight) {
                this.element.stop().fadeIn();
            } else {
                this.element.stop().fadeOut();
            }
        }
    }
};

module.exports = totop;