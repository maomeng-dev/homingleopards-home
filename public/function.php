<?php
/**
 * Created by PhpStorm.
 * User: fengzixi
 * Date: 2018/1/21
 * Time: 上午10:59
 */

/**
 * @param $path
 */
function fe($path)
{
    $host = DEV ? $_SERVER['SERVER_NAME'] : "cdn.homingleopards.org";
    echo "https://{$host}" . $path . "?v=" . RES_VERSION;
}

function shareJssdk($api)
{
    $config = [
        
        'debug' => true,
        /**
         * 账号基本信息，请从微信公众平台/开放平台获取
         */
        'app_id' => \Yaconf::get('maomeng.wechat.appid'),  // AppID
        'secret' => \Yaconf::get('maomeng.wechat.secret'),     // AppSecret
        /**
         * 日志配置
         *
         * level: 日志级别, 可选为：
         *         debug/info/notice/warning/error/critical/alert/emergency
         * permission：日志文件权限(可选)，默认为null（若为null值,monolog会取0644）
         * file：日志文件位置(绝对路径!!!)，要求可写权限
         */
        'log' => [
            'level' => 'debug',
            'permission' => 0777,
            'file' => '/tmp/easywechat.log',
        ],
    ];
    /*
    $app = EasyWeChat\Factory::officialAccount($config);
    return $app->jssdk->buildConfig($api);
    */
    return '';
}