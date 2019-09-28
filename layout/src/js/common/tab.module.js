'use strict'

let $doc = $(document)
let $body = $('html, body')

function Tab (conf) {
  this.tabContainer = conf.tabContainer
  this.contentContainer = conf.contentContainer
  this.activeClass = conf.activeClass || 'active'

  this.currentIndex = 0

  this.tabElement = this.tabContainer.find('[data-tab="item"]')
  this.contentElement = this.contentContainer.find('[data-tab="item"]')

  this.tabContainer.on('click', '[data-tab="item"]', (e) => {
    e.preventDefault()
    this.switchTo(this.tabElement.index(e.currentTarget))
  })
}

Tab.prototype = {
  constructor: Tab,

  switchTo: function (targetIndex) {
    if (targetIndex !== this.currentIndex) {
      this.currentIndex = targetIndex
      this.tabElement.removeClass(this.activeClass)
      this.tabElement.eq(this.currentIndex).addClass(this.activeClass)
      this.contentElement.removeClass(this.activeClass)
      this.contentElement.eq(this.currentIndex).addClass(this.activeClass)
    }
  }
}

module.exports = Tab
