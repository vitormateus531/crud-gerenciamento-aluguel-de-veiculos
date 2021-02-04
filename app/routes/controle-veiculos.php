<?php
use app\controllers\ControlVeiculosController;

$app->get('/controle-veiculos', ControlVeiculosController::class. ':index');
