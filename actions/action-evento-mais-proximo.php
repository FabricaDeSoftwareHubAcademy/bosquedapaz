<?php
require_once('../vendor/autoload.php');

use app\Controller\Evento;

header('Content-Type: application/json');

$eventoController = new Evento();

// Pega eventos com status ativo e data futura
$hoje = (new DateTime())->format('Y-m-d');
$eventos = $eventoController->listar_evento("status = 1 AND data_evento >= '$hoje'", "data_evento ASC", "1");

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