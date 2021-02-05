<?php

namespace app\controllers;

use app\database\models\Veiculos;

class ControlVeiculosController extends Base{

    private $veiculos;

    public function __construct()
    {
        $this->veiculos = new Veiculos;
    }

    public function index($request,$response){
        
        $veiculos = $this->veiculos->listar();

        return $this->getTwig()->render($response, $this->setView('controle-veiculos'),[
            'titulo' => 'Controle de Veículos',
            'uri' => 'controle-veiculos',
            'listarVeiculos' => $veiculos 
        ]);
    }
}