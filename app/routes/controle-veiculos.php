<?php
use app\controllers\ControlVeiculosController;

$app->get('/controle-veiculos', ControlVeiculosController::class. ':index');
$app->post('/insere-veiculos', ControlVeiculosController::class. ':inserir');
$app->post('/atualiza-veiculos', ControlVeiculosController::class. ':atualizar');
$app->post('/remove-veiculos', ControlVeiculosController::class. ':deletar');


