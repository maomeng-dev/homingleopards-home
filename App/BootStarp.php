<?php
/**
 * Created by PhpStorm.
 * User: fengzixi
 * Date: 2018/1/21
 * Time: 下午12:06
 */

namespace App;


class BootStarp
{
    public static function start()
    {
        self::initDb();
        self::defineResourceVersion();
    }
    
    /**
     * 定义资源版本号，如果没读取到文件则初始化
     */
    protected static function defineResourceVersion()
    {
        $fileName = ROOT_PATH . "/VERSION.txt";
        $version = file_exists($fileName) ?
            file_get_contents($fileName) :
            self::initResourceVersion($fileName);
        define("RES_VERSION", $version);
    }
    
    /**
     * 初始化资源文件版本
     * @param $fileName
     * @return int
     */
    protected static function initResourceVersion($fileName)
    {
        $time = time();
        file_put_contents($fileName, $time);
        return $time;
    }
    
    /**
     * init the db conn;
     */
    protected static function initDb()
    {
        \Flight::register("Capsule", "\Illuminate\Database\Capsule\Manager", array(),function ($capsule) {
            $capsule->addConnection([
            
                'driver'    => 'mysql',
            
                'host'      => \Yaconf::get("maomeng.db.host"),
            
                'database'  => \Yaconf::get("maomeng.db.dbname"),
            
                'username'  => \Yaconf::get("maomeng.db.user"),
            
                'password'  => \Yaconf::get("maomeng.db.pass"),
            
                'charset'   => 'utf8mb4',
            
                'collation' => 'utf8mb4_general_ci',
            
                'prefix'    => ''
        
            ]);
        
            $capsule->bootEloquent();
        });
    
    }
}