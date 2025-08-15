<?php
require_once('../vendor/autoload.php');

use app\Controller\Evento;

header('Content-Type: application/json');

try {
    $evento = new Evento();

    $hoje = (new DateTime())->format('Y-m-d');

    // Filtra eventos finalizados com data passada
    $eventos = $evento->listar_evento(
        "status = 0 AND data_evento <= :hoje",
        "data_evento DESC",
        "1",
        [':hoje' => $hoje] // caso listar_evento suporte bind params
    );

    if (!empty($eventos)) {
        echo json_encode([
            'status' => 'success',
            'evento' => $eventos[0]
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'mensagem' => 'Nenhum evento finalizado encontrado'
        ]);
    }

} catch (Exception $e) {
    error_log("[" . date('Y-m-d H:i:s') . "] Erro ao buscar último evento finalizado: " . $e->getMessage());

    echo json_encode([
        'status' => 'error',
        'mensagem' => 'Erro interno ao buscar evento finalizado.'
    ]);
}