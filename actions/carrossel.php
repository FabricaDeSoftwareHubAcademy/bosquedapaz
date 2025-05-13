<?php

require_once("../app/adm/Controller/Carrossel.php");

$car = new Carrossel();

function update_carrossel($img,$num) {
    $caminho = '../../../Public/uploads/uploads-carrosel/';
    $new_img = $img['name'];
    $new_name = 'imgsel-'.$num;
    $extencao_imagem = strtolower(pathinfo($new_img, PATHINFO_EXTENSION));

    $size = getimagesize($img['tmp_name']);
    
    if ($extencao_imagem != 'png' && $extencao_imagem != 'jpg' && $extencao_imagem != 'jpeg'){
        return 'img invalida';
    }else{
        if ($size[0] > 1920 && $size > 1080){
            return 'img invalida';
        }else{
            $caminho_img = $caminho . $new_name. '.'. $extencao_imagem;
        
            $upload_img = move_uploaded_file($img['tmp_name'], $caminho_img);

            return $caminho_img;
        }
    }


}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (!empty($_FILES['img1'])){
        update_carrossel($_FILES['img1'], 1);
        
    }
    else if (!empty($_FILES['img2'])){
        update_carrossel($_FILES['img1'], 1);
        
    }
    else if (!empty($_FILES['img3'])){
        update_carrossel($_FILES['img1'], 1);

    }


    $car->atualizar();
}

?>



<!-- clico na img 
    o javascript valida os arquivos e tamanhos(png,jpg,jpeg, fullhd), deposi mostra na tela e manda para o php

chaa no php
    valida o os arquivos e tamanhos(png,jpg,jpeg, fullhd) cria o arquivo na pasta , depois manda para o banco -->