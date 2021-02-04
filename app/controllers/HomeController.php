<?php

namespace app\controllers;

class HomeController extends Base{

    public function index($request,$response){
        return $this->getTwig()->render($response, $this->setView('home'),[
            'nome' => 'meu nome teste' 
        ]);
    }
}