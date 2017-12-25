<script src="<? fe('/lib/jquery/jquery.min.js') ?>"></script>
<script src="<? fe('/lib/ejs/ejs.min.js') ?>"></script>
<script src="<? fe('/js/common/common.js') ?>"></script>


<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>

<script>
    var _hmt = _hmt || [];
    (function () {
        /* track */
        var hm = document.createElement('script');
        hm.src = 'https://hm.baidu.com/hm.js?bd019c4b798c9f99f8da9fa737c6e5a8';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(hm, s);

        /* push */
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);

        /* share */
        wx.config(<? echo shareJssdk(array('onMenuShareAppMessage', 'onMenuShareTimeline')) ?>);
        wx.ready(function () {
            wx.onMenuShareTimeline({
                title: window.__shareConfig.title,
                link: window.__shareConfig.link,
                imgUrl: window.__shareConfig.imgUrl,
                success: function () {
                    _hmt.push([
                        '_trackEvent',
                        window.__pageData.pageName,
                        'actoin-share',
                        'wx-timeline'
                    ]);
                }
            });

            wx.onMenuShareAppMessage({
                title: window.__shareConfig.title,
                desc: window.__shareConfig.desc,
                link: window.__shareConfig.link,
                imgUrl: window.__shareConfig.imgUrl,
                success: function () {
                    _hmt.push([
                        '_trackEvent',
                        window.__pageData.pageName,
                        'actoin-share',
                        'wx-message'
                    ]);
                }
            });
        });

        $(document)
            .on('DOMContentLoaded', function () {
                _hmt.push([
                    '_trackEvent',
                    window.__pageData.pageName,
                    'load-document',
                    'time',
                    Math.round((new Date()).getTime() - window.__pageData.bootTime)
                ]);
            })
            .on('click', '[data-log-key]', function () {
                _hmt.push([
                    '_trackEvent',
                    window.__pageData.pageName,
                    'action-click',
                    $(this).attr('data-log-key'),
                    +($(this).attr('data-log-value'))
                ]);
            });

        $(window).on('load', function () {
            _hmt.push([
                '_trackEvent',
                window.__pageData.pageName,
                'load-window',
                'time',
                Math.round((new Date()).getTime() - window.__pageData.bootTime)
            ]);
        });
    })();
</script>
