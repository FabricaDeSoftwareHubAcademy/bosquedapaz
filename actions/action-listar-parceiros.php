<?php
require_once('../vendor/autoload.php');
use app\Controller\Parceiro;

$nome = $_GET['nome'];

$parceiro = new Parceiro();
$dados = $parceiro->ListarParceiros($nome);

header('Content-Type: application/json');
echo json_encode($dados);
