<?php
namespace app\controllers;

use app\database\models\Veiculos;

class AluguelVeiculosController extends Base{

    private $veiculos;

    public function __construct()
    {
        $this->veiculos = new Veiculos;
    }

    public function index($request,$response){
        
        $veiculosNaoAlugados = $this->veiculos->listarVeiculosNaoAlugados();
        
        return $this->getTwig()->render($response, $this->setView('aluguel-veiculos'),[
            'titulo' => 'Controle de Veículos',
            'uri' => 'aluguel-veiculos' ,
            'listarVeiculosNaoAlugados' => $veiculosNaoAlugados
        ]);
    }
}