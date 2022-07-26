<?php

require_once('../Config.php');

class DatabaseConnection
{
    private static $instance = null;
    private static $connection = null;

    private function __construct()
    {
        try {
            self::$connection = new \PDO("mysql:host=" . Config::DB_HOST . ';dbname=' . Config::DB_NAME, Config::DB_USER,  Config::DB_PWD,[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ] );
            self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_SILENT);
        } catch (\PDOException $error) {
            echo $error->getMessage();
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function getConnection()
    {
        return self::$connection;
    }
}