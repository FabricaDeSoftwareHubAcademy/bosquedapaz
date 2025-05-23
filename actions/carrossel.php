<?php

require_once("../app/adm/Controller/Carrossel.php");

$car = new Carrossel();

function update_carrossel($img,$num) {
    $caminho = '../Public/uploads/uploads-carrosel/';
    $new_img = $img['name'];
    $new_name = 'img-carrossel-'.$num;
    $extencao_imagem = strtolower(pathinfo($new_img, PATHINFO_EXTENSION));

    $caminho_img = $caminho . $new_name. '.'. $extencao_imagem;
        
    $upload_img = move_uploaded_file($img['tmp_name'], $caminho_img);

    return $caminho_img;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $response = array('status' => 200);

    $i = 1;

    foreach ($_FILES as $chave => $dados) {
        if(!empty($dados['name'])){
            $caminho = update_carrossel($dados, $i);
            $car->caminho = $caminho;
            $car->possicao = $i;
            $atualizacao = $car->atualizar($i);
            array_push($response, $atualizacao);
        }

        $i++;
    }

    echo json_encode($response);
    
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $img = $car->get_imagem();

    $response = array("imagens" => $img, "status" => 200);
    echo json_encode($response);
}

?>
