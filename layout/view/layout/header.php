<?
function checkActive($itemName, $pageName)
{
    if ($itemName === $pageName) {
        return 'class="active"';
    } else {
        return '';
    }
}

if(!isset($name))
    $name = '';
?>

<header>
    <div class="header-logo"><a href="/" title="带豹回家">带豹回家</a></div>
    <ul class="header-menu">
        <li <?= checkActive('index', $name) ?>><a href="/" title="首页">首页</a></li>
        <li <?= checkActive('article', $name) ?>><a href="/article/" title="文章">文章</a></li>
        <li <?= checkActive('download', $name) ?>><a href="/download/" title="下载">下载</a></li>
        <li <?= checkActive('project-introduction', $name) ?>><a href="/pages/project-introduction/" title="带豹回家">带豹回家</a></li>
        <li <?= checkActive('about-north-chinese-leopards', $name) ?>><a href="/pages/about-north-chinese-leopards/" title="华北豹在中国">华北豹在中国</a></li>
    </ul>
</header>
