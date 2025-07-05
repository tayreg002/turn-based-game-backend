<?php
declare(strict_types=1);

namespace App;



require_once ('Configs.php');

class Connection
{
    private static null|self $instance = null;
    private \PDO $dbConn;

    private function __construct() {}

    public static function getDbConnection(): \PDO
    {
        try {
            $db = self::initConnection();

            return $db->dbConn;
        } catch (\Exception $e) {
            throw new \RuntimeException($e->getMessage());
        }
    }

    private static function getInstance(): self
    {
        if (self::$instance == null) {
            $className = __CLASS__;
            self::$instance = new $className;
        }

        return self::$instance;
    }

    private static function initConnection(): self
    {
        $db = self::getInstance();
        $db->dbConn =  new \PDO('mysql:host='.Configs::HOST.';dbname='.Configs::DBNAME,Configs::USER,Configs::PASSWORD);

        return $db;
    }
}
