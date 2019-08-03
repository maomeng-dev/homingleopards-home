<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<? fe('/layout/dist/favicon.png') ?>">
    <meta name="referrer" content="no-referrer">
    <title><?=$info['title']?> - 带豹回家 - 猫盟CFCA</title>


    <link rel="stylesheet" href="<? fe('/layout/dist/css/download/download.css') ?>">
</head>
<body>
<?php
    echo str_replace("data-src", 'src', $content);
?>
</body>

