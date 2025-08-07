<?php

// ini_set('display_startup_errors', 1);
// ini_set('display_errors', 1);
// error_reporting(-1);
require '../vendor/autoload.php';
header('Content-Type: application/json');

use app\controler\Login;
use app\Controller\Colaborador;
use app\Controller\Imagem;
use app\Controller\Expositor;
use app\suport\Csrf;

if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])){
    try {
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
    } catch (\Throwable $th) {
        echo json_encode(['msg' => 'Login inválido']);
        http_response_code(404);
    }
}


if(isset($_GET['perfil'])){
    $jwt = Login::decodejwt();
    if(!isset($jwt['jwt'])){
        echo json_encode(["login" => FALSE]);
        http_response_code(200);
    }else{
        if($jwt['jwt']->perfil == 1){
            $colab = new \app\Controller\Colaborador();
        
            $dados = $colab->buscarPorIdPessoa($jwt['jwt']->sub);
            
            echo json_encode(["login" => $dados]);
            http_response_code(200);
        }
        else if($jwt['jwt']->perfil == 0){
            $imagens = new Imagem();
            //// busca imagens pelo id do expositor
            $buscarImagem = $imagens->listar($_GET['id']);
            $buscarId = $expositor->listar("id_login = ". $jwt['jwt']->sub);
            //// faz append das imagens
            $buscarId[0]['imagens'] = $buscarImagem;
            echo json_encode(["login" => $buscarId]);
            http_response_code(200);
        }else{
            http_response_code(404);
        }

    }

}

if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['logout']) {
    session_start();
    session_destroy();
    exit;
}
