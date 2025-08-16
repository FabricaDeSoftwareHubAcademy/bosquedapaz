<?php
session_start();
header('Content-Type: application/json');

require_once '../vendor/autoload.php';
use app\Controller\Evento;

$id_evento = $_SESSION['id_evento'] ?? null;

if (!$id_evento) {
    echo json_encode([
        'status' => 'error',
        'mensagem' => 'ID do evento não encontrado.'
    ]);
    exit;
}

$eventoController = new Evento();
$eventoObj = $eventoController->buscarPorId_evento($id_evento);

if (!$eventoObj) {
    echo json_encode([
        'status' => 'error',
        'mensagem' => 'Evento não encontrado.'
    ]);
    exit;
}

echo json_encode([
    'status' => 'success',
    'id_evento' => $id_evento,
    'nome_evento' => $eventoObj->nome_evento ?? 'Evento'
]);