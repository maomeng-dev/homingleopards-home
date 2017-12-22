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
        window.__pageData.pageName = 'coming';
    </script>

    <link rel="stylesheet" href="<? fe('/css/index/coming.css') ?>">
</head>

<body>

<? include VIEW_PATH . '/layout/header.php' ?>

<div class="main">
    <div class="bg"></div>
    <div class="mask">
        <div class="mask-row mask-bg"></div>
        <div class="mask-row" style="height: 24vw;">
            <div class="mask-col mask-bg"></div>
            <div class="mask-col" style="width: 50vw;">
                <div class="mask-center mask-comingsoon"></div>
                <p class="mask-text">Copyright CFCA 2017-<? echo date("o") ?>.</p>
            </div>
            <div class="mask-col mask-bg"></div>
        </div>
        <div class="mask-row mask-bg"></div>
    </div>
</div>

<div class="footer">
    <i class="fa fa-code" aria-hidden="true"></i> with <i class="fa fa-heart" aria-hidden="true"></i> by CFCA-Dev-Team.
</div>

<? include VIEW_PATH . '/layout/foot-res.php' ?>

</body>
</html>
