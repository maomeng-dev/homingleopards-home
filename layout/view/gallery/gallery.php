<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<? fe('/favicon.png') ?>">

    <? include VIEW_PATH . '/layout/tdk.php' ?>

    <? include VIEW_PATH . '/layout/head-res.php' ?>

    <script>
        window.__pageData.pageName = 'gallery';
    </script>

    <link rel="stylesheet" type="text/css" href="<? fe('/lib/slick/slick.css') ?>" />
    <link rel="stylesheet" href="<? fe('/css/gallery/gallery.css') ?>">
</head>

<body>

<? include VIEW_PATH . '/layout/header.php' ?>

<!-- content wrap -->
<div class="content">

    <!-- album -->
    <section class="album page-wrap">
        <ul class="album-list">
            <li class="album-item active">
                <div class="title text-center">北京</div>
                <div class="subtitle text-center">Beijing</div>
                <div class="cover">
                    <img src="https://picsum.photos/415/262/?random&alb=0" alt="">
                    <div class="album-text"><span>北京位于华北平原北部，背靠燕山，毗邻天津市和河北省。北京的气候为典型的北温带半湿润大陆性季风气候。山里有好多好多野生动物。</span></div>
                </div>
            </li>
            <li class="album-item">
                <div class="title text-center">北京</div>
                <div class="subtitle text-center">Beijing</div>
                <div class="cover">
                    <img src="https://picsum.photos/415/262/?random&alb=1" alt="">
                    <div class="album-text"><span>北京位于华北平原北部，背靠燕山，毗邻天津市和河北省。北京的气候为典型的北温带半湿润大陆性季风气候。山里有好多好多野生动物。</span></div>
                </div>
            </li>
            <li class="album-item">
                <div class="title text-center">北京</div>
                <div class="subtitle text-center">Beijing</div>
                <div class="cover">
                    <img src="https://picsum.photos/415/262/?random&alb=2" alt="">
                    <div class="album-text"><span>北京位于华北平原北部，背靠燕山，毗邻天津市和河北省。北京的气候为典型的北温带半湿润大陆性季风气候。山里有好多好多野生动物。</span></div>
                </div>
            </li>
        </ul>
        <div class="album-desc">
            该事件的发生，暴露了我队在管理上存在严重问题。对此，我们十分痛心并深感自责。我们诚恳地接受社会各界的批评，并真诚地向广大球迷和观众道歉。中国乒乓球队将从此事件中汲取教训，深刻反思，在努力争取优异运动成绩的同时，切实加强队伍的思想作风建设，传承和弘扬中国乒乓球队艰苦创业、顽强拼搏、为国争光的精神。
        </div>
    </section>
    <!--/album -->

    <!-- gallery -->
    <section class="gallery page-wrap">
        <div class="gallery-type clearfix">
            <ul class="pull-left">
                <li class="active"><a href="#" title="全部">全部</a></li>
                <li><a href="#" title="动物">动物</a></li>
                <li><a href="#" title="植物">植物</a></li>
                <li><a href="#" title="生态">生态</a></li>
                <li><a href="#" title="纪实">纪实</a></li>
            </ul>
            <div class="gallery-search pull-right">
                <input type="search" placeholder="请输入关键字进行检索…">
                <button><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>

        <ul class="gallery-list">
            <li>
                <img src="https://picsum.photos/206/206/?random&gal=0" alt="">
                <div>
                    <span class="title">标题</span>
                    <span class="desc">向左看的大老虎向左看的大老虎向左看的大老虎大老虎大老虎</span>
                </div>
            </li>
            <li>
                <img src="https://picsum.photos/206/206/?random&gal=1" alt="">
                <div>
                    <span class="title">标题</span>
                    <span class="desc">向左看的大老虎向左看的大老虎向左看的大老虎大老虎大老虎</span>
                </div>
            </li>
            <li>
                <img src="https://picsum.photos/206/206/?random&gal=2" alt="">
                <div>
                    <span class="title">标题</span>
                    <span class="desc">向左看的大老虎向左看的大老虎向左看的大老虎大老虎大老虎</span>
                </div>
            </li>
            <li>
                <img src="https://picsum.photos/206/206/?random&gal=3" alt="">
                <div>
                    <span class="title">标题</span>
                    <span class="desc">向左看的大老虎向左看的大老虎向左看的大老虎大老虎大老虎</span>
                </div>
            </li>
            <li>
                <img src="https://picsum.photos/206/206/?random&gal=4" alt="">
                <div>
                    <span class="title">标题</span>
                    <span class="desc">向左看的大老虎向左看的大老虎向左看的大老虎大老虎大老虎</span>
                </div>
            </li>
            <li>
                <img src="https://picsum.photos/206/206/?random&gal=5" alt="">
                <div>
                    <span class="title">标题</span>
                    <span class="desc">向左看的大老虎向左看的大老虎向左看的大老虎大老虎大老虎</span>
                </div>
            </li>
            <li>
                <img src="https://picsum.photos/206/206/?random&gal=6" alt="">
                <div>
                    <span class="title">标题</span>
                    <span class="desc">向左看的大老虎向左看的大老虎向左看的大老虎大老虎大老虎</span>
                </div>
            </li>
            <li>
                <img src="https://picsum.photos/206/206/?random&gal=7" alt="">
                <div>
                    <span class="title">标题</span>
                    <span class="desc">向左看的大老虎向左看的大老虎向左看的大老虎大老虎大老虎</span>
                </div>
            </li>
            <li>
                <img src="https://picsum.photos/206/206/?random&gal=8" alt="">
                <div>
                    <span class="title">标题</span>
                    <span class="desc">向左看的大老虎向左看的大老虎向左看的大老虎大老虎大老虎</span>
                </div>
            </li>
            <li>
                <img src="https://picsum.photos/206/206/?random&gal=9" alt="">
                <div>
                    <span class="title">标题</span>
                    <span class="desc">向左看的大老虎向左看的大老虎向左看的大老虎大老虎大老虎</span>
                </div>
            </li>
            <li>
                <img src="https://picsum.photos/206/206/?random&gal=10" alt="">
                <div>
                    <span class="title">标题</span>
                    <span class="desc">向左看的大老虎向左看的大老虎向左看的大老虎大老虎大老虎</span>
                </div>
            </li>
            <li>
                <img src="https://picsum.photos/206/206/?random&gal=11" alt="">
                <div>
                    <span class="title">标题</span>
                    <span class="desc">向左看的大老虎向左看的大老虎向左看的大老虎大老虎大老虎</span>
                </div>
            </li>
        </ul>

        <div class="gallery-pagination"></div>
    </section>
    <!--/gallery -->
</div>
<!--/content wrap -->

<? include VIEW_PATH . '/layout/footer.php' ?>

<? include VIEW_PATH . '/layout/foot-res.php' ?>

<script src="<? fe('/lib/slick/slick.min.js') ?>"></script>
<script src="<? fe('/js/gallery/gallery.js') ?>"></script>

</body>
</html>
