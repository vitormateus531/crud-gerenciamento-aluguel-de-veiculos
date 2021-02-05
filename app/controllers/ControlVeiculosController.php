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

    public function inserir($request,$response){   
       
        $this->veiculos->inserir($request->getParsedBody());
        return $response->withHeader('Location', '/controle-veiculos');;
    }

    public function deletar($request,$response){   
       
        $this->veiculos->deletar($request->getParsedBody());
        return $response->withHeader('Location', '/controle-veiculos');;
    }

    public function atualizar($request,$response){   
       
        $this->veiculos->atualizar($request->getParsedBody());
        return $response->withHeader('Location', '/controle-veiculos');;
    }
}