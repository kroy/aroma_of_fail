<?php

class Db {
    const DRIVER = 'pgsql';
    const HOST = 'localhost';

    private static $pdo;

    public static function getPdo() {
        if (!isset(self::$pdo)) {
            $dbinfo = Config::getDbInfo();
            $dsn = self::buildDsn($dbinfo['dbname']);
            try {
                self::$pdo = new PDO($dsn, $dbinfo['dbuser'], $dbinfo['dbpassword']);
            } catch (PDOException $e) {
                // TODO Add Logger
            }
        }

        return self::$pdo;
    }

    private static function buildDsn($dbname) {
        return self::DRIVER . ':host=' . self::HOST . ';dbname=' . $dbname;
    }
}