<?php

namespace app\database;

use PDO;
use PDOException;

class Conexao
{

    private static $pdo = null;

    public function connect()
    {
        if (!static::$pdo) {
            try {
                static::$pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);

                return static::$pdo;
            } catch (PDOException $e) {
                var_dump($e->getMessage());
            }
        }

        return static::$pdo;
    }
}
