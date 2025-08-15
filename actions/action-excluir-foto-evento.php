<?php
require_once '../vendor/autoload.php';

use app\Controller\FotosEvento;
use app\suport\Csrf;

header('Content-Type: application/json');

try {
    if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
        throw new Exception('Token CSRF inválido.');
    }

    $id_foto = filter_input(INPUT_POST, 'id_foto', FILTER_VALIDATE_INT);
    if (!$id_foto) {
        throw new Exception('ID da foto inválido.');
    }

    $foto = new FotosEvento();
    $resultado = $foto->excluir($id_foto);

    if ($resultado) {
        echo json_encode(['status' => 'success', 'mensagem' => 'Foto excluída com sucesso.']);
    } else {
        echo json_encode(['status' => 'error', 'mensagem' => 'Foto não encontrada ou já foi excluída.']);
    }

} catch (Exception $e) {
    // Log interno para debugging
    error_log("[" . date('Y-m-d H:i:s') . "] Erro ao excluir foto: " . $e->getMessage());

    // Resposta segura para o usuário
    echo json_encode(['status' => 'error', 'mensagem' => 'Erro interno ao processar a requisição.']);
}