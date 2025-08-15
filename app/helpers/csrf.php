<?php



require '../../../vendor/autoload.php';
use app\suport\Csrf;

function getTolkenCsrf(){
    return Csrf::genereteCsrf();
}