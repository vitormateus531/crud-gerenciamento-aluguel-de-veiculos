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
            $query = $this->conexao->query('select * from veiculos order by id desc');
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

    public function inserir($array)
    {
        try {
            $inserir = $this->conexao->prepare("insert into veiculos(modelo,ano,marca,placa,imagem,status) values (:modelo, :ano, :marca,:placa,:imagem,:status)");
            $inserir->bindValue(":modelo", $array['modelo']);
            $inserir->bindValue(":ano", $array['ano']);
            $inserir->bindValue(":marca", $array['marca']);
            $inserir->bindValue(":placa", $array['placa']);
            $inserir->bindValue(":imagem", $array['imagem']);
            $inserir->bindValue(":status", 0);
            $inserir->execute();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function deletar($array)
    {
        try {
            $deletar = $this->conexao->prepare("delete from veiculos where id = :id");
            $deletar->bindValue(':id', $array['id-veiculo']);
            $deletar->execute();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function atualizar($array){
        try {
            $atualizar = $this->conexao->prepare("update veiculos set modelo = :modelo, ano = :ano, marca = :marca, placa = :placa");
            $atualizar->bindValue(':modelo', $array['atualizar-modelo']);
            $atualizar->bindValue(':ano', $array['atualizar-ano']);
            $atualizar->bindValue(':marca', $array['atualizar-marca']);
            $atualizar->bindValue(':placa', $array['atualizar-placa']);
            $atualizar->execute();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
