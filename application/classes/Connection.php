<?php
namespace App;

use \Illuminate\Database\Capsule\Manager;
use \Illuminate\Events\Dispatcher;
use \Illuminate\Container\Container;
class Connection
{
    private static $instance = null;

    private function __construct()
    {
        $db = new Manager;
        $db->addConnection([
            'driver'    => 'mysql',
            'host'      => DATABASE_HOST,
            'database'  => DATABASE_NAME,
            'username'  => DATABASE_USER,
            'password'  => DATABASE_PASSWORD,
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $db->setEventDispatcher(new Dispatcher(new Container));
        $db->setAsGlobal();
        $db->bootEloquent();
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }
}