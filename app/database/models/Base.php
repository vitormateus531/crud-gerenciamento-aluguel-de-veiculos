<?php

namespace app\database\models;

use PDOException;
use app\database\Conexao;

abstract class Base
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::connect();
    }

    public function findAll()
    {
        try {
            $query = $this->conexao->query('select * from ' . $this->table);
            return $query->fetchAll();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
