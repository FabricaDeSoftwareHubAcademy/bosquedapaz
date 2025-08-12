<?php


require '../vendor/autoload.php';

use app\Controller\Login;

function confirmaLogin($tipo){
    return Login::validaLogin($tipo);
}

function obterLogin(){
    return Login::decodejwt();
}