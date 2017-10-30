<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<? fe('/favicon.ico') ?>">

    <? include VIEW_PATH . '/layout/tdk.php' ?>

    <? include VIEW_PATH . '/layout/head-res.php' ?>

    <script>
        window.__pageData.pageName = 'index';
    </script>

<!--    <link rel="stylesheet" type="text/css" href="--><?// fe('/lib/slick/slick.css') ?><!--" />-->
    <link rel="stylesheet" href="<? fe('/css/index/index.css') ?>">
</head>

<body>

<? include VIEW_PATH . '/layout/header.php' ?>

<!-- content wrap -->
<div class="content">

    <!-- banner -->
    <div class="banner">
        <img src="https://picsum.photos/1440/720/?random&i=0" alt="banner1">
    </div>
    <!--/banner -->

    <!-- intro -->
    <div class="intro">
        <h2>中国猫科动物保护联盟（CFCA）简介</h2>
        <div class="page-wrap">
            <p>中国猫科动物保护联盟（CFCA）简称猫盟，是由几个生态爱好者和科学家共同成立的民间环保组织，这些年来一直在做一件事：研究和保护中国的野生猫科动动。</p>
            <p><br></p>
            <p>行走在山林里，猫盟的每一个人都像兽类一样安静，对移动的活物敏感，对各种动物痕迹敏感，摸爬滚打不在话下；离开山林，整理分析数据、写稿编视频、传播、设计制作周边……各有分工，每个人都是一支队伍。以下，逐一介绍一下猫盟的兄弟姐妹。</p>
        </div>
    </div>

</div>
<!--/content wrap -->

<? include VIEW_PATH . '/layout/footer.php' ?>

<? include VIEW_PATH . '/layout/foot-res.php' ?>

<script src="<? fe('/lib/slick/slick.min.js') ?>"></script>
<!--<script src="--><?// fe('/js/page/about-north-chinese-leopards.js') ?><!--"></script>-->

</body>
</html>
