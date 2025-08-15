<?php
require_once '../../../vendor/autoload.php';

use app\Controller\Categoria;
use app\suport\Csrf;

header('Content-Type: application/json');

if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
    echo json_encode(['status' => 'error', 'message' => 'Requisição inválida.']);
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    echo json_encode(['status' => 'error', 'message' => 'ID inválido.']);
    exit;
}

try {
    $catController = new Categoria();
    $categoria = $catController->buscarPorId($id);

    if (!$categoria) {
        echo json_encode(['status' => 'error', 'message' => 'Categoria não encontrada.']);
        exit;
    }

    $novoStatus = $categoria->getStatus() === 'ativo' ? 'inativo' : 'ativo';
    $categoria->setStatus($novoStatus);

    if ($catController->atualizar($categoria)) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Status alterado com sucesso.',
            'novoStatus' => $novoStatus
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Falha ao atualizar o status.']);
    }
} catch (\Exception $e) {
    error_log("Erro ao alterar status da categoria: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Erro interno do sistema.']);
}