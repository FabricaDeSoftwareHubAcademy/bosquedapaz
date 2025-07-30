<?php


require '../vendor/autoload.php';

use app\controler\Login;

function confirmaLogin($tipo){
    return Login::validaLogin($tipo);
}