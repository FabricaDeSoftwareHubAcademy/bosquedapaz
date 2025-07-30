<?php

// ini_set('display_startup_errors', 1);
// ini_set('display_errors', 1);
// error_reporting(-1);
require '../vendor/autoload.php';

use app\controler\Login;
use app\suport\Csrf;

if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])){
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $senha = htmlspecialchars(strip_tags($_POST["senha"]));

    ////////// REALIZADO O LOGIN \\\\\\\\\\

    $log = new Login();

    $logar = $log->logar($email, $senha);

    /////////// RETORNA UM ARRAY SE O LOGIN FOI COMPLETO
    if($logar['sucess']){
        if($logar['perfil'] == '0'){
            echo json_encode(['location' => '../Expositor/']);
            http_response_code(200);
        }else if ($logar['perfil'] == '1'){
            echo json_encode(['location' => '../Adm/']);
            http_response_code(200);
        }
    }else{
        echo json_encode(['msg' => $logar['msg']]);
        http_response_code(404);
    }
}
