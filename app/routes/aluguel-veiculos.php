<?php
use app\controllers\AluguelVeiculosController;

$app->get('/aluguel-veiculos', AluguelVeiculosController::class. ':index');
