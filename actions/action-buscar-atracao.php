<?php
require_once('../vendor/autoload.php');
use app\Controller\Atracao;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_atracao'])) {
    $id = (int) $_GET['id_atracao'];
    $atracao = new Atracao();
    $atracaoSelecionada = $atracao->buscarPorId($id);

    if ($atracaoSelecionada) {
        echo json_encode([
            'status' => 'success',
            'atracao' => [
                'id_atracao' => $atracaoSelecionada->id_atracao,
                'id_evento' => $atracaoSelecionada->id_evento,
                'nome_atracao' => $atracaoSelecionada->nome_atracao,
                'descricao_atracao' => $atracaoSelecionada->descricao_atracao,
                'status' => $atracaoSelecionada->status,
                'banner_atracao' => $atracaoSelecionada->banner_atracao
            ]
        ]);
    } else {
        echo json_encode(['status' => 'error', 'mensagem' => 'Atração não encontrada']);
    }
} else {
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida']);
}