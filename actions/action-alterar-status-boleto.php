<?php
require_once('../vendor/autoload.php');

use app\Controller\Boleto;
use app\suport\Csrf;

header('Content-Type: application/json');

try {
    if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
        throw new Exception('Token CSRF inválido.');
    }

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $status = $_POST['status'] ?? '';

    if (!$id) {
        throw new Exception('ID inválido.');
    }

    if (!in_array($status, ['Pago', 'Pendente'])) {
        throw new Exception('Status inválido.');
    }

    $boleto = new Boleto();
    $resultado = $boleto->AlterarStatus($status, $id);

    if ($resultado) {
        echo json_encode(['sucesso' => true]);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Falha ao atualizar o status.']);
    }

} catch (Exception $e) {
    // Log interno para debugging
    error_log("[" . date('Y-m-d H:i:s') . "] Erro ao atualizar status do boleto: " . $e->getMessage());

    // Resposta segura para o usuário
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro interno ao processar a requisição.']);
}