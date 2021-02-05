<?php
namespace app\controllers;

use app\database\models\AluguelVeiculos;

class AluguelVeiculosController extends Base{

    private $veiculos;
    private $aluguelVeiculos;

    public function __construct()
    {
        $this->aluguelVeiculos = new AluguelVeiculos;
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
}