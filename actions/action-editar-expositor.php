<?php

require_once('../vendor/autoload.php');
use app\Controller\Expositor;

header('Content-Type: application/json');

 

if(isset($_GET['id_expo'])){

    $id = $_GET['id_expo'];

    $objExpositor = new Expositor();

    $dados = $objExpositor->listar($id);

    echo json_encode($dados);

    // // $array = [
    // //     "status" => 200,
    // //     "msg" => "Dados requisitados com sucesso!!"
    // // ];

    // //return
    // echo json_encode( $array );
}



if(isset($_POST)){
    print_r($_POST);
    $array = [
        "status" => 200,
        "msg" => "veio o post",
        "POST" => $_POST
    ];

    echo json_encode( $array );
}

?>