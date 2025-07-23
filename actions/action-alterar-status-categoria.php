<?php
require_once '../../../vendor/autoload.php';

use app\Controller\Categoria;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if ($id) {
        $catController = new Categoria();
        $categoria = $catController->buscarPorId($id);

        if ($categoria) {
            $novoStatus = $categoria->getStatus() === 'ativo' ? 'inativo' : 'ativo';
            $categoria->setStatus($novoStatus);

            if ($catController->atualizar($categoria)) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Status alterado com sucesso.',
                    'novoStatus' => $novoStatus
                ]);
                exit;
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Falha ao atualizar o status.'
                ]);
                exit;
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Categoria não encontrada.'
            ]);
            exit;
        }
    }

    echo json_encode([
        'status' => 'error',
        'message' => 'ID inválido.'
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Requisição inválida.'
    ]);
}
