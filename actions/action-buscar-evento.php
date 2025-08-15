<?php
require_once('../vendor/autoload.php');

use app\Controller\Evento;

header('Content-Type: application/json');

// Define log específico do projeto
ini_set('error_log', __DIR__ . '/../logs/sistema.log');

try {
    // Validação da requisição
    if ($_SERVER['REQUEST_METHOD'] !== 'GET' || !isset($_GET['id'])) {
        throw new Exception('Requisição inválida.');
    }

    $id = (int) $_GET['id'];
    if ($id <= 0) {
        throw new Exception('ID do evento inválido.');
    }

    // Busca do evento
    $evento = new Evento();
    $eventoSelecionado = $evento->buscarPorId_evento($id);

    if (!$eventoSelecionado) {
        throw new Exception('Evento não encontrado.');
    }

    // Retorno de sucesso
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
            'endereco_evento' => $eventoSelecionado->id_endereco_evento,
            'status' => $eventoSelecionado->status,
            'banner_evento' => $eventoSelecionado->banner_evento
        ]
    ]);

} catch (Exception $e) {
    // Log interno
    error_log("[" . date('Y-m-d H:i:s') . "] Erro ao buscar evento: " . $e->getMessage());

    // Retorno seguro
    echo json_encode([
        'status' => 'error',
        'mensagem' => $e->getMessage() // em produção, pode ser genérica
    ]);
}