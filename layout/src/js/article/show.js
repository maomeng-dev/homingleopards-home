'use strict'

let passive = require('../common/passive.module')
let totop = require('../common/totop.module')

$(() => {
  let page = {
    init: function () {
      totop.init()
      this.videoInit(true)

      passive.addPassiveEventListener(window, 'resize', () => {
        this.videoInit(false)
      })
    },

    videoInit: function (setSrc) {
      /*
       * try to present wechat article video correctly
       */

      // get all video iframes
      $('iframe').each((index, videoElement) => {
        if (videoElement.classList.contains('video_iframe')) {
          // is video iframe

          // get video params
          let { width, height, vid } = (src => {
            let result = {}

            if (videoElement.dataset.ready !== '1') {
              // init video data from url
              let url = new URL(src)
              let queryParam = url.search.slice(1)

              queryParam.split('&').forEach((data) => {
                let datas = data.split('=')
                result[datas[0]] = datas[1]
              })

              videoElement.dataset.width = result.width
              videoElement.dataset.height = result.height
              videoElement.dataset.vid = result.vid
              videoElement.dataset.ready = '1'
            } else {
              // video already init
              result.width = videoElement.dataset.width
              result.height = videoElement.dataset.height
              result.vid = videoElement.dataset.vid
            }

            return result
          })(videoElement.src)

          // set video src
          if (setSrc) {
            videoElement.src = `//v.qq.com/txp/iframe/player.html?vid=${vid}`
          }

          // set video dimensions
          this.setVideoDimension(videoElement, {
            width: +width,
            height: +height
          })
        }
      })
    },

    setVideoDimension: function (videoElement, dimensions) {
      let targetWidth = $(videoElement).parent().width()
      let targetHeight = (targetWidth * dimensions.height) / dimensions.width

      videoElement.width = targetWidth
      videoElement.height = targetHeight
    }
  }

  page.init()
})
