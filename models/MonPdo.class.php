<?php

echo "dbbbb";
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

            try {

                self::$instance = new PDO("mysql:host=localhost;dbname=maude_test_db", "root", "");
                self::$instance->query("SET CHARACTER SET utf8 ");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "alert('connected to db')";
            } catch (PDOException $e) {
                echo "alert('failed to connected to db')";
                die("Failed to connect to db");
            }
        }
        return self::$instance;
    }
}
