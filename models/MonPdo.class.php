<?php
class MonPdo
{


    private static $instance = null;

    private function __destruct()
    {
        self::$instance = null;
    }
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new PDO("mysql:host=localhost;dbname=library", "root", "");
            self::$instance->query("SET CHARACTER SET utf8 ");
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
