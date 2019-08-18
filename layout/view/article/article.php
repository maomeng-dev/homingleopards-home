<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<? fe('/layout/dist/favicon.png') ?>">

    <title>文章 - 带豹回家 - 猫盟CFCA</title>

    <? include VIEW_PATH . '/layout/tdk.php' ?>

    <? include VIEW_PATH . '/layout/head-res.php' ?>

    <link rel="stylesheet" href="<? fe('/layout/dist/css/article/article.css') ?>">
</head>

<body>

<? include VIEW_PATH . '/layout/header.php' ?>

<!-- content wrap -->
<div class="content content-static">

    <section class="article page-wrap">
        <div class="article-header clearfix">
            <h2 class="pull-left">文章</h2>
            <!--
            <div class="download-header-search pull-right">
                <input type="search" placeholder="搜索文章…" id="downloadSearchInput">
                <button id="downloadSearchButton">搜索</button>
            </div>
            -->
        </div>

        <ol class="article-list" id="articleList"></ol>

        <div class="article-loading" id="articleLoading" style="display: block;">
            <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>

        <a href="#" class="article-fetch" id="articleFetch" data-page="1" style="display: none;">点击加载更多内容…</a>
    </section>

    <script type="text/template" id="articleItemTemplate">
        <li class="article-item">
            <a href="<%= down_url %>" class="clearfix" target="_blank" rel="noopener" title="<%= title %>">
                <span class="item-main">
                    <span class="item-title"><%= title %></span>
                    <span class="item-author"><i class="fa fa-user"></i> <span><%= author %></span></span>
                </span>
                <span class="item-info">
                    <span class="item-time"><%= modify_time %></span>
                </span>
            </a>
        </li>
    </script>

</div>
<!--/content wrap -->

<? include VIEW_PATH . '/layout/sidebar.php' ?>

<? include VIEW_PATH . '/layout/footer.php' ?>

<? include VIEW_PATH . '/layout/foot-res.php' ?>

<script src="<? fe('/layout/dist/js/article/article.js') ?>"></script>

</body>
</html>
