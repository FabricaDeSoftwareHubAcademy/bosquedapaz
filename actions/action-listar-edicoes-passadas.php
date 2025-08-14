<?php
require_once '../vendor/autoload.php';

use app\Controller\Evento;

header('Content-Type: application/json');

try {
    $eventoObj = new Evento();

    // status = 0 (finalizado), ordenado por data_evento desc, limite 4
    $eventos = $eventoObj->listar_evento(
        "status = 0",
        "data_evento DESC",
        "4"
    );

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