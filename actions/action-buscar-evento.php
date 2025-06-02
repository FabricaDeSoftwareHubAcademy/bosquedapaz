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
                'id_evento' => $eventoSelecionado->getId(),
                'nome_evento' => $eventoSelecionado->getNome(),
                'descricao' => $eventoSelecionado->getDescricao(),
                'data_evento' => $eventoSelecionado->getData(),
                'status' => $eventoSelecionado->getStatus(),
                'banner' => $eventoSelecionado->getBanner()
            ]
        ]);
    } else {
        echo json_encode(['status' => 'error', 'mensagem' => 'Evento não encontrado']);
    }
} else {
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida']);
}