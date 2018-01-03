'use strict';

let lazyload = require('../common/lazyload.module');

// lazy load
lazyload.init();

// social share
$('#sidebar')
    // share to weibo
    .on('click', '[data-role="share-wb"]', (e) => {
        e.preventDefault();
        window.open(
            `//service.weibo.com/share/share.php` +
            `?url=${encodeURIComponent(window.__shareConfig.link)}` +
            `&pic=${encodeURIComponent(window.__shareConfig.imgUrl)}` +
            `&title=${encodeURIComponent(window.__shareConfig.desc)} 【${encodeURIComponent(window.__shareConfig.title)}】` +
            `&ralateUid=2627373652`
        );
    })

    // share to wechat
    .on('click', '[data-role="share-wx"]', (e) => {
        e.preventDefault();
        var qrcode = new QRCode(document.getElementById('qrcontainer'), {
            text: window.__shareConfig.link,
            width: 128,
            height: 128,
            colorDark : '#000000',
            colorLight : '#ffc000'
        });
    });