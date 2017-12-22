<?php
require 'flight/Flight.php';
require __DIR__.'/vendor/autoload.php';

define("VIEW_PATH", __DIR__ . "/layout/view");
define("RES_VERSION", "20170715");

Flight::set('flight.views.path', VIEW_PATH);

function fe($path)
{
    echo "/layout/dist" . $path . "?v=" . RES_VERSION;
}

function shareJssdk($api)
{
    $config = [
        
        'debug'  => true,
        /**
         * 账号基本信息，请从微信公众平台/开放平台获取
         */
        'app_id'  => 'wx8758c214cb84c524',  // AppID
        'secret'  => '442ae884069ea57925344ed8479066e3',     // AppSecret
        /**
         * 日志配置
         *
         * level: 日志级别, 可选为：
         *         debug/info/notice/warning/error/critical/alert/emergency
         * permission：日志文件权限(可选)，默认为null（若为null值,monolog会取0644）
         * file：日志文件位置(绝对路径!!!)，要求可写权限
         */
        'log' => [
            'level'      => 'debug',
            'permission' => 0777,
            'file'       => '/tmp/easywechat.log',
        ],
    ];
    $app = EasyWeChat\Factory::officialAccount($config);
    return $app->jssdk->buildConfig($api);
}

Flight::route('/', function(){
    Flight::render("index/index");
});

Flight::route('/gallery', function(){
    Flight::render("gallery/gallery");
});

Flight::route('/coming', function(){
    Flight::render("coming");
});

Flight::route('/pages/@page', function($page){
    Flight::render("page/{$page}");
});

Flight::map('notFound', function(){
    // 显示自定义的404页面
    Flight::render("error/404");
});

Flight::route('/@con/@act/',function ($con,$act){
    Flight::render("{$con}/{$act}");});
Flight::start();
?>
