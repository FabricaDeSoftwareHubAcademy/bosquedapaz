<?php

require_once('../vendor/autoload.php');
use app\Controller\Expositor;
use app\suport\Csrf;

header('Content-Type: application/json');

if(isset($_GET['id_expo'])){
    $id = $_GET['id_expo'];
    $objExpositor = new Expositor();
    $dados = $objExpositor->listar("id_expositor = ". $id);
    
    $array = [
        "status" => 200,
        "msg" => "Dados requisitados com sucesso!!",
        "data" => $dados
    ];
    
    echo json_encode($array);
}

if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf']) && isset($_POST['descricao'])){
    
    $id_expositor = $_POST['id_expositor'];
    $objExpo = new Expositor();
    
    // Configurar dados básicos
    $objExpo->setNome_marca($_POST['nome']);
    $objExpo->setDescricao($_POST['descricao']);
    $objExpo->setlink_instagram($_POST['instagram']);
    $objExpo->setLink_facebook($_POST['facebook']);
    $objExpo->setWhats($_POST['whatsapp']);
    $objExpo->setEmail($_POST['email']);
    $imagensProcessadas = [];

    $result = $objExpo->atualizar($id_expositor);
    
    if ($result) {
        $array = [
            "status" => 200,
            "msg" => "Perfil atualizado com sucesso!",
            "imagens_processadas" => count($imagensProcessadas)
        ];
    } else {
        $array = [
            "status" => 500,
            "msg" => "Erro ao atualizar perfil!"
        ];
    }
    
    echo json_encode($array);
}
?>