<?php
require_once('../vendor/autoload.php');

use app\Controller\Atracao;

header('Content-Type: application/json');

try {
    // Validação da requisição
    if ($_SERVER['REQUEST_METHOD'] !== 'GET' || !isset($_GET['id_atracao'])) {
        throw new Exception('Requisição inválida.');
    }

    $id = (int) $_GET['id_atracao'];
    if ($id <= 0) {
        throw new Exception('ID da atração inválido.');
    }

    // Busca da atração
    $atracao = new Atracao();
    $atracaoSelecionada = $atracao->buscarPorId($id);

    if (!$atracaoSelecionada) {
        throw new Exception('Atração não encontrada.');
    }

    // Retorno de sucesso
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

} catch (Exception $e) {
    // Log interno para depuração
    error_log("[" . date('Y-m-d H:i:s') . "] Erro ao buscar atração: " . $e->getMessage());

    // Retorno seguro
    echo json_encode([
        'status' => 'error',
        'mensagem' => $e->getMessage() // Em produção, pode ser genérica
    ]);
}