<?php
require_once('../vendor/autoload.php');
use app\Controller\Evento;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $evento = new Evento();
    $eventoSelecionado = $evento->buscarPorId($id);

    if ($eventoSelecionado) {
        echo json_encode([
            'status' => 'success',
            'evento' => [
                'id_evento' => $eventoSelecionado->id_evento,
                'nome_evento' => $eventoSelecionado->nome_evento,
                'descricao' => $eventoSelecionado->descricao,
                'data_evento' => $eventoSelecionado->data_evento,
                'status' => $eventoSelecionado->status,
                'banner' => $eventoSelecionado->banner
            ]
        ]);
    } else {
        echo json_encode(['status' => 'error', 'mensagem' => 'Evento não encontrado']);
    }
} else {
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida']);
}