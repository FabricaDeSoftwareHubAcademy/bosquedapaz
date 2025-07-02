<?php
require_once '../vendor/autoload.php';

use app\Controller\Evento;

header('Content-Type: application/json');

try {
    $evento = new Evento();

    $termo = isset($_GET['termo']) ? trim($_GET['termo']) : '';

    $eventos = $evento->listar_evento($termo);

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