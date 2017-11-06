<?php
require 'flight/Flight.php';

define("VIEW_PATH", __DIR__ . "/layout/view");
define("RES_VERSION", "20170715");

Flight::set('flight.views.path', VIEW_PATH);

function fe($path)
{
	echo "/layout/dist" . $path . "?v=" . RES_VERSION;
}

Flight::route('/', function(){
    Flight::render("index/index");
});

Flight::route('/gallery', function(){
    Flight::render("gallery/gallery");
});

Flight::route('/pages/@page', function($page){
	Flight::render("page/{$page}");
});

Flight::map('notFound', function(){
	// 显示自定义的404页面
	echo "喵，你也穿越失败了?";
});

Flight::route('/@con/@act/',function ($con,$act){
	Flight::render("{$con}/{$act}");});
Flight::start();
?>
