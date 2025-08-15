<?php
require_once('../vendor/autoload.php');

use app\Controller\Evento;

header('Content-Type: application/json');

try {
    $eventoController = new Evento();

    // Data de hoje formatada
    $hoje = (new DateTime())->format('Y-m-d');

    // Filtra eventos ativos com data futura
    $eventos = $eventoController->listar_evento(
        "status = 1 AND data_evento >= :hoje",
        "data_evento ASC",
        "1",
        [':hoje' => $hoje] // Evita injeção, se listar_evento aceitar bind params
    );

    if (!empty($eventos)) {
        echo json_encode([
            'status' => 'success',
            'evento' => $eventos[0]
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'mensagem' => 'Nenhum evento encontrado'
        ]);
    }

} catch (Exception $e) {
    error_log("[" . date('Y-m-d H:i:s') . "] Erro ao buscar próximo evento: " . $e->getMessage());

    echo json_encode([
        'status' => 'error',
        'mensagem' => 'Erro interno ao buscar evento.'
    ]);
}