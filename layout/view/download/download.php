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
        <div class="download-header clearfix">
            <h2 class="pull-left">项目资料</h2>
            <div class="download-header-search pull-right">
                <input type="search" placeholder="根据附件名称或标签进行匹配…" id="downloadSearchInput">
                <button id="downloadSearchButton">搜索</button>
            </div>
        </div>

        <ol class="download-list">
            <li class="download-item">
                <a href="#" class="clearfix" target="_blank" rel="noopener">
                    <span class="item-icon"><i class="fa fa-file-archive-o" aria-hidden="true"></i></span>
                    <span class="item-main">
                        <span class="item-title">中文</span>
                        <span class="item-tags"><em>tags</em><em>tags</em><em>tags</em><em>tags</em><em>tags</em><em>tags</em><em>tags</em><em>tags</em><em>tags</em></span>
                    </span>
                    <span class="item-info">
                        <span class="item-size">10MB</span>
                        <span class="item-time">2019-19-10</span>
                    </span>
                </a>
            </li>
        </ol>

        <div class="download-loading" id="downloadLoading" style="display: none;"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>

        <a href="#" class="download-more"  id="downloadMore">点击加载更多内容…</a>
    </section>

</div>
<!--/content wrap -->

<? include VIEW_PATH . '/layout/sidebar.php' ?>

<? include VIEW_PATH . '/layout/footer.php' ?>

<? include VIEW_PATH . '/layout/foot-res.php' ?>

<script src="<? fe('/js/download/download.js') ?>"></script>

</body>
</html>
