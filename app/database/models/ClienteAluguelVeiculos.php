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
            $query = $this->conexao->query('select alugados.id,alugados.id_carro,cliente.nome,cliente.telefone,alugados.valor_contratado,
                                            veiculos.modelo,veiculos.placa,alugados.data_aluguel,alugados.data_expiracao from alugados inner join 
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
            $inserir = $this->conexao->prepare("insert into cliente(nome,cpf,telefone,endereco) values (:nome,:cpf,:telefone,:endereco)");
            $inserir->bindValue(":nome", $array['nome_locatario']);
            $inserir->bindValue(":cpf", $array['cpf_locatario']);
            $inserir->bindValue(":telefone", $array['telefone_locatario']);
            $inserir->bindValue(":endereco", $array['endereco_locatario']);
            $inserir->execute();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function inserirCarroAlugado($array){
        try {
            $inserir = $this->conexao->prepare("insert into alugados(id_carro,cpf_cliente,valor_contratado,data_aluguel,data_expiracao) values (:id_carro,:cpf_cliente,:valor_contratado,:data_aluguel,:data_expiracao)");
            $inserir->bindValue(":id_carro", $array['selecionar_veiculo_alugar']);
            $inserir->bindValue(":cpf_cliente", $array['cpf_locatario']);
            $inserir->bindValue(":valor_contratado", str_replace(",",".",$array['valor_aluguel']));
            $inserir->bindValue(":data_aluguel", date("Y-m-d", str_replace("/","-",$array['data_locacao'])));
            $inserir->bindValue(":data_expiracao", date("Y-m-d", str_replace("/","-",$array['data_entrega_locacao'])));
            $inserir->execute();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function deletarCarroAlugado($id){
        try{
            $deleteCarroAlugado = $this->conexao->prepare("delete from alugados where id = :id");
            $deleteCarroAlugado->bindValue(":id",$id);
            $deleteCarroAlugado->execute();
        }catch(PDOException $e){
            var_dump($e->getMessage());
        }

    }

    public function mudarStatusVeiculo($id,$status){
        try {
            $mudaStatus = $this->conexao->prepare("update veiculos set status = :status where id = :id");
            $mudaStatus->bindValue(":status", $status);
            $mudaStatus->bindValue(":id", $id);
            $mudaStatus->execute();
        }catch(PDOException $e){
            var_dump($e->getMessage());
        }
    }

}
