<?php
require_once('../vendor/autoload.php');
use app\Controller\Evento;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $evento = new Evento();
    $eventoSelecionado = $evento->buscarPorId_evento($id);

    if ($eventoSelecionado) {
        echo json_encode([
            'status' => 'success',
            'evento' => [
                'id_evento' => $eventoSelecionado->id_evento,
                'nome_evento' => $eventoSelecionado->nome_evento,
                'subtitulo_evento' => $eventoSelecionado->subtitulo_evento,
                'descricao_evento' => $eventoSelecionado->descricao_evento,
                'data_evento' => $eventoSelecionado->data_evento,
                'hora_inicio' => $eventoSelecionado->hora_inicio,
                'hora_fim' => $eventoSelecionado->hora_fim,
                'endereco_evento' => $eventoSelecionado->endereco_evento,
                'status' => $eventoSelecionado->status,
                'banner_evento' => $eventoSelecionado->banner_evento
            ]
        ]);
    } else {
        echo json_encode(['status' => 'error', 'mensagem' => 'Evento não encontrado']);
    }
} else {
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida']);
}