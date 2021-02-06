<?php

namespace app\controllers;

use app\database\models\ClienteAluguelVeiculos;
use app\database\models\Cliente;

class AluguelVeiculosController extends Base
{

    private $aluguelVeiculos;
    private $verificaCliente;

    public function __construct()
    {
        $this->aluguelVeiculos = new ClienteAluguelVeiculos;
        $this->verificaCliente = new Cliente;
    }

    public function index($request, $response)
    {

        $veiculosNaoAlugados = $this->aluguelVeiculos->listarVeiculosNaoAlugados();
        $veiculosAlugados = $this->aluguelVeiculos->listar();

        return $this->getTwig()->render($response, $this->setView('aluguel-veiculos'), [
            'titulo' => 'Controle de Veículos',
            'uri' => 'aluguel-veiculos',
            'listarVeiculosNaoAlugados' => $veiculosNaoAlugados,
            'veiculosAlugados' => $veiculosAlugados
        ]);
    }

    public function inserirCarroAlugado($request, $response)
    {

        $array = $request->getParsedBody();
        $verificaCliente = $this->verificaCliente->countVerificaCliente($array['cpf_locatario']);
        if ($verificaCliente == "0") {
            $this->aluguelVeiculos->inserirCliente($request->getParsedBody());
        }
        $this->aluguelVeiculos->inserirCarroAlugado($request->getParsedBody());
        $this->aluguelVeiculos->mudarStatusVeiculo($array['selecionar_veiculo_alugar'], 1);
        return $response->withHeader('Location', '/aluguel-veiculos');
    }

    public function deletarCarroAlugado($request, $response)
    {

        $id = $request->getParsedBody();
        $this->aluguelVeiculos->mudarStatusVeiculo($id['id_carro'], 0);
        $this->aluguelVeiculos->deletarCarroAlugado($id['id_remocao_carro_alugado']);
        return $response->withHeader('Location', '/aluguel-veiculos');
    }
}
