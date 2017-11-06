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
                    <span>北京位于华北平原北部，背靠燕山，毗邻天津市和河北省。北京的气候为典型的北温带半湿润大陆性季风气候。山里有好多好多野生动物。</span>
                </div>
            </li>
            <li class="album-item">
                <div class="title text-center">北京</div>
                <div class="subtitle text-center">Beijing</div>
                <div class="cover">
                    <img src="https://picsum.photos/415/262/?random&alb=1" alt="">
                    <span>北京位于华北平原北部，背靠燕山，毗邻天津市和河北省。北京的气候为典型的北温带半湿润大陆性季风气候。山里有好多好多野生动物。</span>
                </div>
            </li>
            <li class="album-item">
                <div class="title text-center">北京</div>
                <div class="subtitle text-center">Beijing</div>
                <div class="cover">
                    <img src="https://picsum.photos/415/262/?random&alb=2" alt="">
                    <span>北京位于华北平原北部，背靠燕山，毗邻天津市和河北省。北京的气候为典型的北温带半湿润大陆性季风气候。山里有好多好多野生动物。</span>
                </div>
            </li>
        </ul>
    </section>
    <!--/album -->

</div>
<!--/content wrap -->

<? include VIEW_PATH . '/layout/footer.php' ?>

<? include VIEW_PATH . '/layout/foot-res.php' ?>

<script src="<? fe('/lib/slick/slick.min.js') ?>"></script>
<script src="<? fe('/js/gallery/gallery.js') ?>"></script>

</body>
</html>
