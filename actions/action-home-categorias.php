<?php
require_once('../vendor/autoload.php');
use app\Controller\Categoria;

$categoria = new Categoria();

$dados = $categoria->listar();

header('Content-Type: application/json');
echo json_encode($dados);
