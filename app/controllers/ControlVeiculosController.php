<?php

namespace app\controllers;

class ControlVeiculosController extends Base{
    public function index($request,$response){
        return $this->getTwig()->render($response, $this->setView('controle-veiculos'),[
            'titulo' => 'Controle de Veículos' 
        ]);
    }
}