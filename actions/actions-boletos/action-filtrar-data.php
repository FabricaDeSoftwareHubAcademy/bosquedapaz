<?php
require_once '../../app/Controller/Boleto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_inicial = $_POST['data_inicial'] ?? '';
    $data_final = $_POST['data_final'] ?? '';

    $boletos = new Boleto();
    $dados = $boletos->FiltrarPorData($data_inicial, $data_final);

    header('Content-Type: application/json');
    echo json_encode($dados);
    exit;
}
?>
