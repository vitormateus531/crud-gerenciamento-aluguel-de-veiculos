<?php

namespace app\traits;
use Exception;
use Slim\Views\Twig;

trait Views{
    public function getTwig()
    {
        try {
            return Twig::create(DIR_VIEWS);
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    public function setView($nome)
    {
        return $nome . EXT_VIEWS;
    }
}