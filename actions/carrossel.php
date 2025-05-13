<?php

require_once("../app/adm/Controller/Carrossel.php");

$car = new Carrossel();

function update_carrossel($img,$num) {
    $caminho = '../../../Public/uploads/uploads-carrosel/';
    $new_img = $img['name'];
    $new_name = 'img-carrossel-'.$num;
    $extencao_imagem = strtolower(pathinfo($new_img, PATHINFO_EXTENSION));

    $caminho_img = $caminho . $new_name. '.'. $extencao_imagem;
        
    $upload_img = move_uploaded_file($img['tmp_name'], $caminho_img);

    return $caminho_img;
}


if($_SERVER['REQUEST_METHOD'] == 'FILES'){
    $res = $car->buscar_id(1);
    if (isset($_FILES['img1'])){
        $img1 = update_carrossel($_FILES['img1'], 1);
        $car->img1 = $img1;
    }
    else {
        $car->img1 = $res->img1;
    }
    if (isset($_FILES['img2'])){
        $img2 = update_carrossel($_FILES['img2'], 2);
        $car->img2 = $img2; 
    }
    else {
        $car->img2 = $res->img2;
    }
    if (isset($_FILES['img3'])){
        $img3 = update_carrossel($_FILES['img3'], 3);
        $car->img3 = $img3;
    }
    else {
        $car->img3 = $res->img3;
    }


    $res = $car->atualizar();

    if($res == TRUE){
        $response = array('status' => $car->img1);
        echo json_encode($response);
    }
    else {
        $response = array('status' => 'error');
        echo json_encode($response);
    }

}

?>
