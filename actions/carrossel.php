<?php

require_once("../app/adm/Controller/Carrossel.php");

$car = new Carrossel();

function update_carrossel($img,$num) {
    $caminho = '../Public/uploads/uploads-carrosel/';
    $new_img = $img['name'][$num];
    $new_name = 'img-carrossel-'.$num+1;
    $extencao_imagem = strtolower(pathinfo($new_img, PATHINFO_EXTENSION));

    $caminho_img = $caminho . $new_name. '.'. $extencao_imagem;
        
    $upload_img = move_uploaded_file($img['tmp_name'][$num], $caminho_img);

    return $caminho_img;
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $busca = $car->buscar_id(1);
    $files = $_FILES['files'];
    if (!empty($files['name'][0])){
        $img1 = update_carrossel($files, 0);
        $car->img1 = $img1;
    }
    else {
        $car->img1 = $busca->img1;
    }
    if (!empty($files['name'][1])){
        $img2 = update_carrossel($files, 1);
        $car->img2 = $img2;
    }
    else {
        $car->img2 = $busca->img2;
    }
    if (!empty($files['name'][2])){
        $img3 = update_carrossel($files, 2);
        $car->img3 = $img3;
    }
    else {
        $car->img3 = $busca->img3;
    }
    
    try {
        $res = $car->atualizar();
        $status = $res ? 200 : 400;
        
        $response = array("status" => status);
        echo json_encode($response);
    } catch (\Throwable $th) {
        $response = array("status" => 500);
        echo json_encode($response);
    }
    
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $carrossel = $car->buscar_id(1);

    $response = array($carrossel, "status" => 200);
    echo json_encode($response);
}

?>
