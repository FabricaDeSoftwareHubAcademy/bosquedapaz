<?php

header('Content-Type: application/json');

require_once('../vendor/autoload.php');

use app\Controller\Expositor;

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    try {
        $expositor = new Expositor();

        if(isset($_GET['filtro'])){
            $filtrar = $expositor->filtrar_exp($_GET['filtro']);
            if ($filtrar) {
                $response = [
                    'expositores' => $filtrar,
                    'status' => 200
                ];
            }else {
                $response = [
                    'status' => 400,
                    'msg' => 'Nenhum expositor encontrado'
                ];
            }
            echo json_encode($response);
        }
        else if (isset($_GET['buscar'])){
            $buscar_id = $expositor->listar($_GET['buscar']);
            if ($buscar_id) {
                $response = [
                    'expositores' => $buscar_id,
                    'status' => 200
                ];
            }else {
                $response = [
                    'status' => 400,
                    'msg' => 'Nenhum expositor encontrado'
                ];
            }
            echo json_encode($response);
        }else {
            $buscar = $expositor->listar();
            if ($buscar) {
                $response = [
                    'expositores' => $buscar,
                    'status' => 200
                ];
            }else {
                $response = [
                    'status' => 400,
                    'msg' => 'Nenhum expositor encontrado'
                ];
            }
            echo json_encode($response);
        }

    } catch (\Throwable $th) {
        $response = [
            'status' => 500,
            'msg' => 'Erro no servidor'. $th
        ];
        echo json_encode($response);
    }
}