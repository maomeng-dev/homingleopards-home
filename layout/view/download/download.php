<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<? fe('/favicon.png') ?>">

    <title>下载 - 带豹回家 - 猫盟CFCA</title>

    <? include VIEW_PATH . '/layout/tdk.php' ?>

    <? include VIEW_PATH . '/layout/head-res.php' ?>

    <link rel="stylesheet" href="<? fe('/css/download/download.css') ?>">
</head>

<body>

<? include VIEW_PATH . '/layout/header.php' ?>

<!-- content wrap -->
<div class="content content-static">

    <section class="download page-wrap">
        <div class="download-header">
            <h2>项目资料</h2>
            <div class="download-header-search">
                <input type="search">
                <button>sousuo</button>
            </div>
        </div>

        <ol class="download-list">
            <li>
                <a href="#">
                    <span class="item-icon"></span>
                    <span class="item-main">
                        <span class="item-title">title</span>
                        <span class="item-tags"><em>tags</em><em>tags</em><em>tags</em></span>
                    </span>
                    <span class="item-info">
                        <span class="item-size">10MB</span>
                        <span class="item-time">2019-19-10</span>
                    </span>
                </a>
            </li>
        </ol>

        <a href="#" class="download-more">点击加载更多内容…</a>
    </section>

</div>
<!--/content wrap -->

<? include VIEW_PATH . '/layout/sidebar.php' ?>

<? include VIEW_PATH . '/layout/footer.php' ?>

<? include VIEW_PATH . '/layout/foot-res.php' ?>

<script src="<? fe('/js/download/download.js') ?>"></script>

</body>
</html>
