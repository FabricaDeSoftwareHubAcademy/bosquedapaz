<?php
header('Content-Type: application/json');
require_once '../../app/Models/Database.php';
require_once '../../app/Controller/Boleto.php';

$nome = isset($_GET['nome']) ? trim($_GET['nome']) : '';

$classe = new Boleto();
$dados = $classe->ListarBoletos($nome);

echo json_encode($dados);
?>