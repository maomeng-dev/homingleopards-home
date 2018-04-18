<?php
/**
 * Created by PhpStorm.
 * User: fengzixi
 * Date: 2018/4/7
 * Time: 上午11:55
 */

namespace App\Api\Front;


class Download
{
    public function showlist()
    {
        $referer = $_SERVER['HTTP_REFERER'];
        $res = explode('.org', $referer);
        if (empty($res)) {
            exit;
        }
        $domain = $res[0] . ".org";
        if (strpos($domain, 'homingleopards.org')) {
            header("Access-Control-Allow-Origin:{$domain}");
        }
        $data = array(
            "page" => [
                "current" => 1,
                "size" => 10,
                "total" => 2,
                "page_total" => 1,
            ],
            "list" => array(
                [
                    "index" => 0,
                    "id" => 1,
                    "title" => "测试下载",
                    "modify_time" => 1503897505631,
                    "type" => 1,
                    "size" => 505631,
                    "down_url"=>'https://api.homingleopards.org/',
                    "tags" => ['华北豹', '华北豹', '大喵', '回家'],
                ],
                [
                    "index" => 2,
                    "id" => 1,
                    "title" => "测试下载2",
                    "modify_time" => 1503897505631,
                    "type" => 1,
                    "size" => 505631,
                    "down_url"=>'https://api.homingleopards.org/',
                    "tags" => ['华北豹2', '华北豹', '大喵', '回家'],
                ]
            )
        );
        \Flight::json(['errno' => 0, 'errmsg' => '', 'data' => $data]);
    }
}