<?php
namespace app\controllers;

use app\database\models\ClienteAluguelVeiculos;

class AluguelVeiculosController extends Base{

    private $aluguelVeiculos;

    public function __construct()
    {
        $this->aluguelVeiculos = new ClienteAluguelVeiculos;
    }

    public function index($request,$response){
        
        $veiculosNaoAlugados = $this->aluguelVeiculos->listarVeiculosNaoAlugados();
        $veiculosAlugados = $this->aluguelVeiculos->listar();
        
        return $this->getTwig()->render($response, $this->setView('aluguel-veiculos'),[
            'titulo' => 'Controle de Veículos',
            'uri' => 'aluguel-veiculos' ,
            'listarVeiculosNaoAlugados' => $veiculosNaoAlugados,
            'veiculosAlugados' => $veiculosAlugados
        ]);
    }

    public function inserirCarroAlugado($request,$response){
        
        $this->aluguelVeiculos->inserirCliente($request->getParsedBody());
        $this->aluguelVeiculos->inserirCarroAlugado($request->getParsedBody());
        return $response->withHeader('Location', '/aluguel-veiculos');;
    }
}