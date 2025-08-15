<?php
require_once('../vendor/autoload.php');

use app\Controller\Parceiro;
use app\suport\Csrf;

header('Content-Type: application/json');

try {
    // Validação CSRF
    if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
        throw new Exception('Token CSRF inválido.');
    }

    // Validação dos parâmetros
    if (!isset($_POST['id'], $_POST['status'])) {
        throw new Exception('Parâmetros faltando.');
    }

    $id = (int) $_POST['id'];
    $status = $_POST['status'];

    if (!in_array($status, ['Ativo', 'Inativo'])) {
        throw new Exception('Status inválido.');
    }

    $parceiro = new Parceiro();
    if (!$parceiro->AlterarStatusParceiro($status, $id)) {
        throw new Exception('Falha ao atualizar o status.');
    }

    // Retorno de sucesso
    echo json_encode([
        'status' => 'success',
        'message' => 'Status atualizado com sucesso.'
    ]);

} catch (Exception $e) {
    // Log de erro para análise
    error_log("[" . date('Y-m-d H:i:s') . "] Erro ao alterar status do parceiro: " . $e->getMessage());

    // Retorno de erro padronizado
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}