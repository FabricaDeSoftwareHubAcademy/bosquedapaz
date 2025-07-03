<?php

header('Content-Type: application/json');

require_once('../vendor/autoload.php');

use app\Controller\Expositor;

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    try {
        $expositor = new Expositor();

        if(isset($_GET['filtro'])){
            $filtrar = $expositor->filtrar_exp($_GET['filtro']);
            if (!empty($filtrar)) {
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
            if (!empty($buscar_id)) {
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
        }else if (isset($_GET['categoria'])){
            $buscar_cat = $expositor->filtrar_exp_categoria($_GET['categoria']);
            if (!empty($buscar_cat)) {
                $response = [
                    'expositores' => $buscar_cat,
                    'status' => 200
                ];
            }else {
                $response = [
                    'status' => 400,
                    'msg' => 'Nenhum expositor encontrado'
                ];
            }
            echo json_encode($response);



        }else if (isset($_GET['status'])){

            if (!empty($_GET['status'])) {
                $buscar_status = $expositor->Listar_expositores_aguardando();
                $response = [
                    'expositores' => $buscar_status,
                    'status' => 200,
                ];
            }else {
                $response = [
                    'status' => 400,
                    'msg' => 'Nenhum expositor encontrado',
                ];
            }
            echo json_encode($response);
        }
        



        
        else {
            $buscar = $expositor->listar();
            if (!empty($buscar)) {
                $response = [
                    'expositores' => $buscar,
                    'status' => 200,
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