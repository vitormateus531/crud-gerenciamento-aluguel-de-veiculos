<?php

namespace app\database\models;

use app\database\Conexao;

use PDOException;

class Veiculos
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::connect();
    }

    public function listar()
    {
        try {
            $query = $this->conexao->query('select * from veiculos');
            return $query->fetchAll();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
