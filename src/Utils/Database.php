<?php

namespace eComairce\Utils;

use PDO;

abstract class Database
{
    private static ?PDO $pdo = null;

    public static function getPDO()
    {
        try {
            if (!self::$pdo) {
                self::$pdo = new PDO('mysql:host=' .DB_HOST. ';dbname=' .DB_NAME, DB_USER, DB_PASSWORD);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE , DB_ERROR_MODE);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, DB_FETCH_MODE);

                return self::$pdo;
            }
            return self::$pdo;
        } catch (\PDOException $e) {
            echo "Une erreur est survenue : <br>" . $e->getMessage();
        }
    }
}