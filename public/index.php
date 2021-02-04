<?php

require '../vendor/autoload.php';
use Slim\Factory\AppFactory;

$app = AppFactory::create();

require '../app/helpers/config.php';
require '../app/routes/home.php';

$app->run();

 