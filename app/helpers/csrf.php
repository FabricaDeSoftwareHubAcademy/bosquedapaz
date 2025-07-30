<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


require '../../../vendor/autoload.php';
use app\suport\Csrf;

function getTolkenCsrf(){
    return Csrf::genereteCsrf();
}