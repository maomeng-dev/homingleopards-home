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
                    "title" => "2017年带豹回家年报",
                    "modify_time" => 1525336721402,
                    "type" => 1,
                    "size" => 24000,
                    "down_url"=>'https://cdn.homingleopards.org/resource/file/bring-leopards-home-annual-report-2017.pdf',
                    "tags" => ['带豹回家', '年报', '猫盟', '荒野分析'],
                ],
            )
        );
        \Flight::json(['errno' => 0, 'errmsg' => '', 'data' => $data]);
    }
}
