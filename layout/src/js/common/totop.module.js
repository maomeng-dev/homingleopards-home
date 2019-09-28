'use strict'

let passive = require('./passive.module')

let $doc = $(document)
let $body = $('html, body')

let totop = {
  init: function (conf) {
    conf = conf || {}
    this.wrapWidth = conf.wrapWidth || 1440
    this.className = conf.className || 'page-totop'
    this.duration = conf.duration || 500

    this.template = '<a class="page-totop" style="display: none;"><i class="fa fa-chevron-up" aria-hidden="true"></i><span>返回顶部</span></a>'
    this.element = $(conf.element) || $(ejs.render(this.template))
    this.isShowing = false

    passive.addPassiveEventListener($doc[0], 'scroll', () => {
      this.check()
    })
    passive.addPassiveEventListener(window, 'resize', () => {
      this.check()
    })

    this.element.on('click', function () {
      $body.stop().animate({
        scrollTop: 0
      }, 500)
    })

    if (!conf.element) {
      $body.append(this.element)
    }

    this.check()
  },

  check: function () {
    if (this.wrapWidth > window.innerWidth) {
      this.hide()
    } else {
      if ($doc.scrollTop() > window.innerHeight) {
        this.show()
      } else {
        this.hide()
      }
    }
  },

  show: function () {
    if (!this.isShowing) {
      this.element
          .stop()
          .css({
            'display': 'block',
            'opacity': '0'
          })
          .animate({
            'opacity': '1'
          }, 200)
      this.isShowing = true
    }
  },

  hide: function () {
    if (this.isShowing) {
      this.element
          .stop()
          .animate({
            'opacity': '0'
          }, 200, () => {
            this.element.css({ 'display': 'none' })
          })
      this.isShowing = false
    }
  }
}

module.exports = totop
