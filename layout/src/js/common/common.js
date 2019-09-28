'use strict'

let lazyload = require('../common/lazyload.module')
let totop = require('../common/totop.module')

// lazy load
lazyload.init()

// social share
let qrcode = null
let qrShowing = false

let $sidebar = $('#sidebar')
let $totopBtn = $sidebar.find('[data-role="to-top"]')
let $wxBtn = $sidebar.find('[data-role="share-wx"]')
let $wxQr = $sidebar.find('[data-role="share-wx-qr"]')
let $wxImg = $sidebar.find('[data-role="share-wx-img"]')

let wxImgLayer = {
    show: () => {
        $wxBtn.css({ 'right': '-60px' })
        $wxImg.css({ 'right': '0' })
        qrShowing = true
    },

    hide: () => {
        $wxBtn.css({ 'right': '0' })
        $wxImg.css({ 'right': '-160px' })
        qrShowing = false
    }
}

$sidebar
// share to weibo
    .on('click', '[data-role="share-wb"]', (e) => {
        e.preventDefault()
        window.open(
            `//service.weibo.com/share/share.php` +
            `?url=${encodeURIComponent(window.__shareConfig.link)}` +
            `&pic=${encodeURIComponent(window.__shareConfig.imgUrl)}` +
            `&title=${encodeURIComponent(window.__shareConfig.desc)} 【${encodeURIComponent(window.__shareConfig.title)}】` +
            `&ralateUid=2627373652`,
            'wbshare',
            'width=960,height=540,menubar=0,status=0,titlebar=0,toolbar=0'
        )
    })

    // share to wechat
    .on('click', '[data-role="share-wx"]', (e) => {
        e.preventDefault()
        if (!qrcode) {
            qrcode = new QRCode($wxQr[0], {
                text: window.__shareConfig.link,
                width: 140,
                height: 140,
                colorDark: '#000',
                colorLight: '#fff'
            })
        }

        if (!qrShowing) {
            wxImgLayer.show()
        } else {
            wxImgLayer.hide()
        }
    })

$(document).on('click', (e) => {
    let parentBtn = $(e.target).closest('.share-btn')
    if ((parentBtn.length === 0) || (parentBtn.attr('data-role') !== 'share-wx')) {
        wxImgLayer.hide()
    }
})

// totop
totop.init({
    element: $totopBtn
})
