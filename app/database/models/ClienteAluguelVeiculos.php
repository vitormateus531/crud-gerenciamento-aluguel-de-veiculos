<?php

namespace app\database\models;

use app\database\Conexao;

use PDOException;

class ClienteAluguelVeiculos
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
                                            cliente on alugados.cpf_cliente = cliente.cpf  
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

    public function inserirCliente($array){
        try {
            $inserir = $this->conexao->prepare("insert into alugados(nome,cpf,telefone,endereco) values (:nome,:cpf,:telefone,:endereco)");
            $inserir->bindValue(":nome", $array['nome-locatario']);
            $inserir->bindValue(":cpf", $array['cpf-locatario']);
            $inserir->bindValue(":telefone", $array['telefone-locatario']);
            $inserir->bindValue(":endereco", $array['endereco-locatario']);
            $inserir->execute();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function inserirCarroAlugado($array){
        try {
            $inserir = $this->conexao->prepare("insert into alugados(id_carro,id_cliente,valor_contratado,data_aluguel,data_expiracao) values (:id_carro,:id_cliente,:valor_contratado,:data_aluguel,:data_expiracao)");
            $inserir->bindValue(":id_carro", $array['selecionar-veiculo-alugar']);
            $inserir->bindValue(":id_cliente", $array['cpf-locatario']);
            $inserir->bindValue(":valor_contratado", $array['valor-aluguel']);
            $inserir->bindValue(":data_aluguel", $array['data-locacao']);
            $inserir->bindValue(":data_expiracao", $array['data-entrega-alocacao']);
            $inserir->execute();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function mudarStatusVeiculo($array){
        try {
            $mudaStatus = $this->conexao->prepare("update veiculos set status = :status where id = :id");
            $mudaStatus->bindValue(":status", $array['']);
            $mudaStatus->bindValue(":id", $array['']);
            $mudaStatus->execute();
        }catch(PDOException $e){
            var_dump($e->getMessage());
        }
    }

}
