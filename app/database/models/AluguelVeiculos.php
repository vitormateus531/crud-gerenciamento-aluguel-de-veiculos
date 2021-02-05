<?php

namespace app\database\models;

use app\database\Conexao;

use PDOException;

class AluguelVeiculos
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::connect();
    }

    public function listar()
    {
        try {
            $query = $this->conexao->query('select * from alugados inner join 
                                            cliente on alugados.id_cliente = cliente.id  
                                            inner join veiculos 
                                            on alugados.id_carro = veiculos.id order by alugados.id desc');
            return $query->fetchAll();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function listarVeiculosNaoAlugados()
    {
        try {
            $query = $this->conexao->query('select * from veiculos where status = 0');
            return $query->fetchAll();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function inserir($array){

    }
}
