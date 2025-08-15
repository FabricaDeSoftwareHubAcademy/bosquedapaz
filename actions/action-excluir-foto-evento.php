<?php
require_once '../vendor/autoload.php';

use app\Controller\FotosEvento;
use app\suport\Csrf;

header('Content-Type: application/json');

if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])){
    $id_foto = $_POST['id_foto'] ?? null;

    if (!$id_foto || !is_numeric($id_foto)) {
        echo json_encode(['status' => 'error', 'mensagem' => 'ID da foto inválido.']);
        exit;
    }

    try {
        $foto = new FotosEvento();
        $resultado = $foto->excluir($id_foto);
        
        if ($resultado) {
            echo json_encode(['status' => 'success', 'mensagem' => 'Foto excluída com sucesso.']);
        } else {
            echo json_encode(['status' => 'error', 'mensagem' => 'Foto não encontrada ou já foi excluída.']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'mensagem' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'mensagem' => 'Token CSRF inválido.']);
}