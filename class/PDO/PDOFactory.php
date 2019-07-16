<?php
    namespace App\PDO;
    use PDO;

    class PDOFactory
    {
        public static function getMysqlConnexion($dbName, $login, $password)
        {
            $db = new PDO('mysql:host=localhost;dbname=' . $dbName, $login, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        }

        public static function getPgsqlConnexion($dbName, $login, $password)
        {
            $db = new PDO('pgsql:host=localhost;dbname=tests' . $dbName, $login, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        }

        public static function getsqliteConnexion()
        {
            $db = new PDO('sqlite:../data.db');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        }
    }
