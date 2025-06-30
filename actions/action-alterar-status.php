<?php
require_once '../../../vendor/autoload.php';

use app\Controller\Categoria;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if ($id) {
        $catController = new Categoria();
        $categoria = $catController->buscarPorId($id);

        if ($categoria) {
            $novoStatus = $categoria->getStatus() === 'ativo' ? 'inativo' : 'ativo';
            $categoria->setStatus($novoStatus);

            if ($catController->atualizar($categoria)) {
                echo json_encode(['status' => 'success', 'novoStatus' => $novoStatus]);
                exit;
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Falha ao atualizar.']);
                exit;
            }
        }
    }

    echo json_encode(['status' => 'error', 'message' => 'ID inválido']);
}
