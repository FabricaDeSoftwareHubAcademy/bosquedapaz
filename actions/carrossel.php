<?php

require_once("../app/adm/Controller/Carrossel.php");

$car = new Carrossel();

// $imagem1 = $_FILES['img1'];
            
// $nome_imagem1 = $imagem1['name'];
// $nova_imagem1 = 'img-carrossel-1';
// $extencao_imagem1 = strtolower(pathinfo($nome_imagem1, PATHINFO_EXTENSION));

// // verificando a extencao
// if($extencao_imagem1 != 'png' && $extencao_imagem1 != 'jpg') echo "<script>alert('Arquivo inválido')</script>";
// $caminho_img1 = $pasta . $nova_imagem1. '.'. $extencao_imagem1;
// $upload_img1 = move_uploaded_file($imagem1['tmp_name'], $caminho_img1);

// // cadastrando img no db
// $img1 = $caminho_img1;
// $car->img1 = $img1;

// function update_carrossel(img) {

// }

echo "<pre>";
print_r(getimagesize('../Public/uploads/uploads-carrosel/img-carrossel-1.jpg'));
echo "</pre>";
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     // $img1 = $_POST['img1'];
//     // $img2 = $_POST['img2'];
//     // $img3 = $_POST['img3'];
//     $img1 = '1';
//     $img2 = '2';
//     $img3 = '3';




//     $car->img1 = $img1;
//     $car->img2 = $img2;
//     $car->img3 = $img3;

//     $car->atualizar();
// }

?>



<!-- clico na img 
    o javascript valida os arquivos e tamanhos(png,jpg,jpeg, fullhd), deposi mostra na tela e manda para o php

chaa no php
    valida o os arquivos e tamanhos(png,jpg,jpeg, fullhd) cria o arquivo na pasta , depois manda para o banco -->