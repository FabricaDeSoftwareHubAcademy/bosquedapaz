<?php

require_once('../vendor/autoload.php');

use app\Controller\Carrossel;

$car = new Carrossel();

// ini_set('display_startup_errors', 1);
// ini_set('display_errors', 1);
// error_reporting(-1);

// funcao para mover o arquivo para o pasta de uploads
// o parametro $num serve para falar o  numero da img
function update_carrossel($img, $num) {
        // chmod ("../Public/uploads/uploads-carrosel/", 0777);
        $caminho = '../Public/uploads/uploads-expositor/';
        $new_img = $img['name'];
        $new_name = 'img_carrossel-'.$num;
        $extencao_imagem = strtolower(pathinfo($new_img, PATHINFO_EXTENSION));
    
        $caminho_img = $caminho . $new_name. '.'. $extencao_imagem;
            
        $upload_img = move_uploaded_file($img['tmp_name'], $caminho_img);
    
        return $caminho_img;
}

// quando chegar um POST sera feito uma atualizacao
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    try {
        $response = array('status' => 200);
    
    
        $i = 1; // contador para saber qual img
        // percorre todos os arquivos
        foreach ($_FILES as $chave => $dados) {
            if(!empty($dados['name'])){
                $caminho = update_carrossel($dados, $i);
                $car->caminho = $caminho;
                $car->posicao = $i;
                $atualizacao = $car->atualizar($i);
    
                // mensagem de retorno para o usuario
                if ($atualizacao == TRUE){
                    $response["message"] = "Carrossel atualizado com sucesso";
                    $response["erro"] = "0";
                }
                else if ($atualizacao == FALSE){
                    $response["message"] = "Não foi possível atualizar o carrossel";
                    $response["erro"] = "Tente mandar a imagem novamente.";
                }
            }
    
            $i++;
        }
    
        echo json_encode($response);
        
    } catch (\Throwable $th) {
        $response = array('status' => 500);
        echo json_encode($response);
    }
    
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $img = $car->get_imagem();

    $response = array("imagens" => $img, "status" => 200);
    echo json_encode($response);
}

?>
