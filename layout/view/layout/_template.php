<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<? fe('/layout/dist/favicon.png') ?>">

    <? include VIEW_PATH . '/layout/tdk.php' ?>

    <? include VIEW_PATH . '/layout/head-res.php' ?>
</head>

<body>

<? include VIEW_PATH . '/layout/header.php' ?>

<div class="container-fluid page-wrap">
    <div class="row page-wrap">

        <? include VIEW_PATH . '/layout/sidebar.php' ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Page Title</h1>

            Main page content

            <? include VIEW_PATH . '/layout/footer.php' ?>

        </div>
    </div>
</div>

<? include VIEW_PATH . '/layout/foot-res.php' ?>

<script src="<? fe('/layout/dist/assets/index.js') ?>"></script>

</body>
</html>
