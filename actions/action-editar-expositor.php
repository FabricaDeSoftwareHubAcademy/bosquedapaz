<?php

require_once('../vendor/autoload.php');
use app\Controller\Expositor;

header('Content-Type: application/json');


if(isset($_GET['id_expo'])){

    $id = $_GET['id_expo'];

    $objExpositor = new Expositor();

    $dados = $objExpositor->listar($id);

    $array = [
        "status" => 200,
        "msg" => "Dados requisitados com sucesso!!",
        "data" => $dados
    ];

    //return
    echo json_encode( $array );
}

if(isset($_POST['nome']) && isset ($_POST['descricao'])){

    $id_expositor = $_POST['id_expositor'];

    $objExpo = new Expositor();

    $objExpo->setNome_marca( $_POST['nome'] );
    $objExpo->setDescricao($_POST['descricao']);
    $objExpo->setlink_instagram($_POST['instagram']);
    $objExpo->setLink_facebook($_POST['facebook']);
    $objExpo->setWhats($_POST['whatsapp']);
    $objExpo->setEmail($_POST['email']);

    $result = $objExpo->atualizar($id_expositor);
    
    $array = [
        "status" => 200,
        "msg" => "CHEGOU NO POST!"
    ];

    echo json_encode( $array );


}


?>