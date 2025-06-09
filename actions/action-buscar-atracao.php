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
                'id_atracao' => $atracaoSelecionada->getId(),
                'id_evento' => $atracaoSelecionada->getIdEvento(),
                'nome_atracao' => $atracaoSelecionada->getNome(),
                'descricao_atracao' => $atracaoSelecionada->getDescricao(),
                'status' => $atracaoSelecionada->getStatus(),
                'banner_atracao' => $atracaoSelecionada->getBanner()
            ]
        ]);
    } else {
        echo json_encode(['status' => 'error', 'mensagem' => 'Atração não encontrada']);
    }
} else {
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida']);
}