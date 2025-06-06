<?php

header('Content-Type: application/json');

require_once('../vendor/autoload.php');

use app\Controller\Expositor;

if (isset($_GET['filtro'])){
    $exp = new Expositor();
    
    try {
        $response = $exp->filtrarExpositor($_GET['filtro']);
        echo json_encode(["expositores" => $response, 'status' => 200]);       
    } catch (\Throwable $th) {
        $response = ['status' => '500'];
        echo json_encode($response);
    }


}