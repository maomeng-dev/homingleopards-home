<?php
/**
 * Created by PhpStorm.
 * User: fengzixi
 * Date: 2018/1/21
 * Time: 上午10:56
 */

namespace App\Route;

use App\Model\Article;
use App\Model\ArticleContent;

/**
 * 前台页面路由
 * Class Web
 * @package App\Route
 */

final class Web
{
    public static function router()
    {
        \Flight::route('/article', function () {
            \Flight::render("article/article", array("name" => "article"));
        });

        \Flight::route('/download', function () {
            \Flight::render("download/download", array("name" => "download"));
        });

        \Flight::route('/gallery', function () {
            \Flight::render("gallery/gallery", array("name" => "gallery"));
        });

        \Flight::route('/coming', function () {
            \Flight::render("coming", array("name" => "coming"));
        });

        \Flight::route('/pages/@page', function ($page) {
            \Flight::render("page/{$page}", array("name" => $page));
        });

        \Flight::route('/articles/@id', function ($id) {
            $article = new Article();
            $article->id($id);
            $data = $article->getData();
            if(empty($data))
            {
                exit('error article id');
            }
            $content = new ArticleContent();
            \Flight::render("article/show", array("content" => $content->getContent($id, $data['wechat_url']), 'info' => $data));
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
