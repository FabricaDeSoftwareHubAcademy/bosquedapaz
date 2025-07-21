<?php
require_once '../vendor/autoload.php';

use app\Controller\FotosEvento;

header('Content-Type: application/json');

$id_foto = $_POST['id_foto'] ?? null;

if (!$id_foto || !is_numeric($id_foto)) {
    echo json_encode(['status' => 'error', 'mensagem' => 'ID da foto inválido.']);
    exit;
}

try {
    $foto = new FotosEvento();
    $foto->excluir($id_foto); // Você deve implementar isso na classe
    echo json_encode(['status' => 'success', 'mensagem' => 'Foto excluída com sucesso.']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'mensagem' => $e->getMessage()]);
}