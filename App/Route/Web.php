<?php
/**
 * Created by PhpStorm.
 * User: fengzixi
 * Date: 2018/1/21
 * Time: 上午10:56
 */

namespace App\Route;


final class Web
{
    public static function router()
    {
        \Flight::route('/gallery', function () {
            \Flight::render("gallery/gallery", array("name" => "gallery"));
        });
    
        \Flight::route('/coming', function () {
            \Flight::render("coming", array("name" => "coming"));
        });
    
        \Flight::route('/pages/@page', function ($page) {
            \Flight::render("page/{$page}", array("name" => $page));
        });
    
        \Flight::map('notFound', function () {
            // 显示自定义的404页面
            \Flight::render("error/404", array("name" => "404"));
        });
    
        \Flight::route('/@con/@act/', function ($con, $act) {
            \Flight::render("{$con}/{$act}");
        });
    
    }
}