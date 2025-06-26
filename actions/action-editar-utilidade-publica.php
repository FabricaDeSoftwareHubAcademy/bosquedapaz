<?php
require_once('../vendor/autoload.php');
use app\Controller\UtilidadePublica;

    $util = new UtilidadePublica();

    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $data_inicio = $_POST["data_inicio"];
    $data_fim = $_POST["data_fim"];
    $imagem = $_POST["imagem"];

    $util->editar($id, $titulo, $descricao, $data_inicio, $data_fim, $imagem);

?>