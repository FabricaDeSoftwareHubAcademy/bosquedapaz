<?php
require_once '../../app/Controller/Boleto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';

    $suaClasse = new Boleto();
    $dados = $suaClasse->ListarBoletos($nome);

    header('Content-Type: application/json');
    echo json_encode($dados);
    exit;
}
?>
