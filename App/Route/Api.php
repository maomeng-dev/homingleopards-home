<?php
/**
 * Created by PhpStorm.
 * User: fengzixi
 * Date: 2018/1/21
 * Time: 上午10:56
 */

namespace App\Route;

use App\Front\Download\Download;

/**
 * Router of Api.
 * Class Api
 * @package App\Route
 */

final class Api
{
    public static function router()
    {
        \Flight::route('/front/download/@act', function ($act) {
            $controller = new Download();
            if ($act == 'list') {
                $controller->showlist();
            }
        });
    }
}