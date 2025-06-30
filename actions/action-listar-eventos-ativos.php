<?php
require_once '../vendor/autoload.php';

use app\Controller\Evento;

header('Content-Type: application/json');

try {
    $evento = new Evento();
    $eventos = $evento->listar_evento("status = 1"); // ou "status = 'ativo'" dependendo do seu DB

    echo json_encode([
        'status' => 'success',
        'dados' => $eventos
    ], JSON_PRETTY_PRINT);
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'mensagem' => $e->getMessage()
    ]);
}