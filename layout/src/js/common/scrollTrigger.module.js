'use strict'

let passive = require('./passive.module')

let $doc = $(document)

let scrollTrigger = {
  init: function (conf) {
    conf = conf || {}
    this.delay = conf.delay || 100
    this.distance = conf.distance || 0

    let scrollTimer = 0

    let callCheck = () => {
      clearTimeout(scrollTimer)
      scrollTimer = setTimeout(() => {
        this.check()
      }, this.delay)
    }

    passive.addPassiveEventListener($doc[0], 'scroll', () => {
      callCheck()
    })
    passive.addPassiveEventListener(window, 'resize', () => {
      callCheck()
    })

    this.check()
  },

  check: function () {
    $.each($('[data-scroll]'), (index, element) => {
      let distance = this.distance || (window.innerHeight / 3)
      if (element.getBoundingClientRect().top - window.innerHeight < -distance) {
        this.trigger(element)
      }
    })
  },

  trigger: function (element) {
    let $ele = $(element)
    $ele
        .addClass('scroll-triggered')
        .removeAttr('data-scroll')

    $.each($ele.find('[data-scroll-child]'), (index, childElement) => {
      let $childElement = $(childElement)
      let durationTime = $childElement.attr('data-scroll-child') || 0

      setTimeout(() => {
        $childElement.addClass('scroll-triggered')
      }, durationTime)
    })
  }
}

module.exports = scrollTrigger
