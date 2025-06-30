<?php
require_once '../vendor/autoload.php';

use app\Controller\Atracao;

header('Content-Type: application/json');

try {
    if (!isset($_GET['id_evento']) || !is_numeric($_GET['id_evento'])) {
        throw new Exception("ID do evento não foi fornecido corretamente.");
    }

    $id_evento = (int)$_GET['id_evento'];
    $atracao = new Atracao();

    $atracoes = $atracao->listar("id_evento = {$id_evento}");

    echo json_encode([
        'status' => 'success',
        'dados' => $atracoes
    ], JSON_PRETTY_PRINT);
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'mensagem' => $e->getMessage()
    ]);
}