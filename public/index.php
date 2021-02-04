<?php

require '../vendor/autoload.php';
use Slim\Factory\AppFactory;

$app = AppFactory::create();

require '../app/helpers/config.php';
require '../app/routes/home.php';
require '../app/routes/controle-veiculos.php';
require '../app/routes/aluguel-veiculos.php';

$app->run();

 