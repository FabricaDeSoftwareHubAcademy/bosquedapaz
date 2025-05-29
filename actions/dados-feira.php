<?php

require_once('../vendor/autoload.php');

use app\Controller\DadosFeira;

$dadosFeira = new DadosFeira();

// quando chegar um POST sera feito uma atualizacao
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    try {
        $dados = array();
        
        foreach ($_POST as $key => $value) {
            if(!empty($_POST[$key])){
                $filter = filter_var($_POST[$key], FILTER_VALIDATE_INT);
                if($filter){
                    $dados[$key] = $filter;
                }
                else {
                    $response = array(
                        'menssage' => 'erro ao enviar os dados em '. $key,
                        'status' => 400,
                        'error' => 'dados fora do padrão, envie apenas numeros.'
                    );
                    echo json_encode($response);
                    break;
                }
            }
        }
        
        $res = $dadosFeira->atualizar(1, $dados);
        
        if ($res) {
            $response = array('menssage' => 'atualizado com sucesso','status' => 200);
            echo json_encode($response);
        }
        else {
            $response = array('menssage' => 'dados enviado ao servidor não suportados', 'status' => 404);
            echo json_encode($response);
        }
                
    } catch (\Throwable $th) {
        $response = array('menssage' => 'erro no servidor', "erro" => 'servidor fora do ar', 'status' => 500);
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
        echo json_encode($response);
    }
}

?>
