'use strict';

function Passive () {
    this.isSupport = (() => {
        let supportsPassive = false;
        try {
            let opts = Object.defineProperty({}, 'passive', {
                get: function () {
                    supportsPassive = true;
                }
            });
            window.addEventListener('test', null, opts);
        } catch (e) {
        }
        return supportsPassive;
    })();
}

Passive.prototype = {
    constructor: Passive,

    addPassiveEventListener: function (element, event, handler) {
        event = event || '';
        event.split(' ').forEach((eventName) => {
            element.addEventListener(eventName, handler, this.isSupport ? { passive: true } : false);
        });
    }
};

module.exports = new Passive();