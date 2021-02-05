<?php

namespace app\controllers;

use app\database\models\Veiculos;

class HomeController extends Base
{

    private $veiculos;

    public function __construct()
    {
        $this->veiculos = new Veiculos;
    }
    

    public function index($request, $response)
    {
        $veiculos = $this->veiculos->listar();
        
        return $this->getTwig()->render($response, $this->setView('home'), [
            'titulo' => 'Home',
            'uri' => '/',
            'listarVeiculos' => $veiculos
        ]);
    }

}
