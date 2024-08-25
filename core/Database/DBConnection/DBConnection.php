<?php

namespace Core\Database\DBConnection;

use PDO;
use PDOException;

class DBConnection
{
    private static $dbConnectionInstance = null;

    private function __construct()
    {
    }

    public static function getDBConnectionInstance()
    {
        if (self::$dbConnectionInstance == null) {
            $DBConnectionInstance = new DBConnection();
            self::$dbConnectionInstance = $DBConnectionInstance->dbConnection();
        }
        return self::$dbConnectionInstance;
    }

    public function dbConnection()
    {
        $servername = DBHOST;
        $dbname = DBNAME;
        $username = DBUSERNAME;
        $password = DBPASSWORD;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            echo "Connected successfully";
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }

    public static function newInsertedId()
    {
        return self::getDBConnectionInstance()->lastInsertId();
    }
}