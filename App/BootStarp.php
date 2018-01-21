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
    
    }
    
    protected static function initDb()
    {
        $dbhost = \Yaconf::get("db.dbhost");
        $dbDsn = "mysql:host={$dbhost};dbname=" . \Yaconf::get("db.dbname");
        $dbUser = \Yaconf::get("db.dbuser");
        $dbPass = \Yaconf::get("db.dbpass");
        \FlightWind::register("DbConn", "PDO", array($dbDsn, $dbUser, $dbPass,array(\PDO::ATTR_PERSISTENT=>true)),function ($dbconn) {
            $dbconn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        });
    
        \FlightWind::register("Capsule", "\Illuminate\Database\Capsule\Manager", array(),function ($capsule) {
            $capsule->addConnection([
            
                'driver'    => 'mysql',
            
                'host'      => \Yaconf::get("db.dbhost"),
            
                'database'  => \Yaconf::get("db.dbname"),
            
                'username'  => \Yaconf::get("db.dbuser"),
            
                'password'  => \Yaconf::get("db.dbpass"),
            
                'charset'   => 'utf8mb4',
            
                'collation' => 'utf8mb4_general_ci',
            
                'prefix'    => ''
        
            ]);
        
            $capsule->bootEloquent();
        });
    
    }
}