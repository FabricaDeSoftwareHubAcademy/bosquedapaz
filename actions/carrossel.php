<?php

require_once("../app/adm/Controller/Carrossel.php");

$car = new Carrossel();

$imagem1 = $_FILES['img1'];
            
$nome_imagem1 = $imagem1['name'];
$nova_imagem1 = 'img-carrossel-1';
$extencao_imagem1 = strtolower(pathinfo($nome_imagem1, PATHINFO_EXTENSION));

// verificando a extencao
if($extencao_imagem1 != 'png' && $extencao_imagem1 != 'jpg') echo "<script>alert('Arquivo inválido')</script>";
$caminho_img1 = $pasta . $nova_imagem1. '.'. $extencao_imagem1;
$upload_img1 = move_uploaded_file($imagem1['tmp_name'], $caminho_img1);

// cadastrando img no db
$img1 = $caminho_img1;
$car->img1 = $img1;

?>



<!-- clico na img 
    o javascript valida os arquivos e tamanhos(png,jpg,jpeg, fullhd), deposi mostra na tela e manda para o php

chaa no php
    valida o os arquivos e tamanhos(png,jpg,jpeg, fullhd) cria o arquivo na pasta , depois manda para o banco -->