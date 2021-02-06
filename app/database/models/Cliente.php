<?php

namespace app\database\models;

use app\database\Conexao;

use PDOException;

class Cliente
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::connect();
    }

    public function countVerificaCliente($cpf){
        $countCliente = $this->conexao->prepare("select COUNT(*) from cliente where cpf = :cpf");
        $countCliente->bindValue(":cpf",$cpf);
        $countCliente->execute();
        $rowCount = $countCliente->fetchColumn(0); 
        return $rowCount;
    }
}
