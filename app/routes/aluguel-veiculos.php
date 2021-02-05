<?php
use app\controllers\AluguelVeiculosController;

$app->get('/aluguel-veiculos', AluguelVeiculosController::class. ':index');
$app->post('/alugar-carro', AluguelVeiculosController::class. ':inserirCarroAlugado');

