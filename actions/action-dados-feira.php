<?php

require_once('../vendor/autoload.php');
require_once('../app/helpers/login.php');

use app\Controller\DadosFeira;
use app\suport\Csrf;

$dadosFeira = new DadosFeira();


// quando chegar um POST sera feito uma atualizacao
if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])){
    try {
        if(!confirmaLogin(1)){
            echo json_encode([
                'msg' => 'Login Inválido',
            ]);
            http_response_code(400);
            exit;
        }
        $dados = array();

        if(filter_var($_POST["num_visitantes"], FILTER_VALIDATE_INT) !== FALSE){
            $dados['qtd_visitantes'] =  htmlspecialchars(strip_tags($_POST['num_visitantes']));
            
            $res = $dadosFeira->atualizar(1, $dados);
            
            if ($res) {
                $response = array('menssage' => 'atualizado com sucesso','status' => 200);
                echo json_encode($response);
            }
            else {
                $response = array('menssage' => 'dados enviado ao servidor não suportados', 'status' => 404);
                http_response_code(404);
                echo json_encode($response);
            }

        }else{
            echo json_encode(['menssage' => 'Numero inválido']);
            http_response_code(404);
        }
    } catch (\Throwable $th) {
        $response = array('menssage' => 'erro no servidor', "erro" => 'servidor fora do ar', 'status' => 500);
        http_response_code(500);
        echo json_encode($response);
    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $res = $dadosFeira->get_dados();
    
        $response = array($res, "status" => 200);
        echo json_encode($response);
        
    } catch (\Throwable $th) {
        $response = array("status" => 500);
        http_response_code(500);
        echo json_encode($response);
    }
}

?>