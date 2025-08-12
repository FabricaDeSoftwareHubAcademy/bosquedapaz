<?php
require_once('../vendor/autoload.php');

use app\Controller\Evento;

header('Content-Type: application/json');

$eventoController = new Evento();

$hoje = (new DateTime())->format('Y-m-d');
$eventos = $eventoController->listar_evento("status = 0 AND data_evento <= '$hoje'", "data_evento DESC", "1");

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