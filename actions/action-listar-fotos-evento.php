<?php
require_once '../vendor/autoload.php';

use app\Controller\FotosEvento;

header('Content-Type: application/json');

$id_evento = $_GET['id_evento'] ?? null;

if (!$id_evento || !is_numeric($id_evento)) {
    echo json_encode([
        'status' => 'error',
        'mensagem' => 'ID do evento inválido.'
    ]);
    exit;
}

try {
    $fotosEvento = new FotosEvento();
    $fotos = $fotosEvento->listarPorEvento((int)$id_evento);

    echo json_encode([
        'status' => 'success',
        'dados' => $fotos
    ], JSON_PRETTY_PRINT);
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'mensagem' => $e->getMessage()
    ]);
}