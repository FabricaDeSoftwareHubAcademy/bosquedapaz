<?php
ob_start();
require_once '../vendor/autoload.php';

use app\Controller\Categoria;
use app\suport\Csrf;

header("Content-Type: application/json");

$response = ['status' => 'error', 'message' => 'Ocorreu um erro na execução desta ação.'];

try {
    if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
        throw new Exception("Token CSRF inválido. Ação bloqueada.");
    }

    $id = $_POST['id_categoria'] ?? null;
    $statusAtual = $_POST['status_atual'] ?? null;

    if (!$id || !in_array($statusAtual, ['ativo', 'inativo'])) {
        throw new Exception("Dados inválidos para alterar o status.");
    }

    $novoStatus = ($statusAtual === 'ativo') ? 'inativo' : 'ativo';

    $cat = new Categoria();
    $res = $cat->alterarStatus($id, $novoStatus);


    if ($res) {
        $response = ['status' => 'success', 'message' => 'Status alterado com sucesso.'];
    } else {
        throw new Exception("Erro ao alterar o status.");
    }

} catch (Exception $e) {
    $response = ['status' => 'error', 'message' => $e->getMessage()];

} finally {
    ob_clean();
    echo json_encode($response);
    exit;
}
