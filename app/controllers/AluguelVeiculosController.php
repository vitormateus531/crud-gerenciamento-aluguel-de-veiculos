<?php
namespace app\controllers;

class AluguelVeiculosController extends Base{
    public function index($request,$response){
        return $this->getTwig()->render($response, $this->setView('aluguel-veiculos'),[
            'titulo' => 'Controle de Veículos',
            'uri' => 'aluguel-veiculos' 
        ]);
    }
}