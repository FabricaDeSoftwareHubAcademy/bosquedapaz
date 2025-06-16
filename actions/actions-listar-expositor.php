<?php

header('Content-Type: application/json');

require_once('../vendor/autoload.php');

use app\Controller\Expositor;

if (isset($_GET['filtro'])){
    $exp = new Expositor();
    try {
        $response = $exp->listar($_GET['filtro']);

        if (count($response) < 1){
            echo json_encode(["msg" => "Nenhum expositor encontrado.", 'status' => 201]);
        }else{
            echo json_encode(["expositores" => $response , 'status' => 200]);
        }
       
    } catch (\Throwable $th) {
        $response = ['status' => '500'];
        echo json_encode($response);
    }

}
if(!isset($_GET['filtro'])){
    $exp = new Expositor();
    
    try {
        $response = $exp->listar();

        if (count($response) < 1){
            echo json_encode(["msg" => "Nenhum expositor encontrado.", 'status' => 201, $response]);

        }else{
            echo json_encode(["expositores" => $response, 'status' => 200]);
        }
       
    } catch (\Throwable $th) {
        $response = ['status' => '500'];
        echo json_encode($response);
    }
}