<?php
require_once('../vendor/autoload.php');
use app\Controller\Categoria;

header('Content-Type: application/json');

// 🚦 Apenas requisições GET com um ID são permitidas
try {
    if ($_SERVER['REQUEST_METHOD'] !== 'GET' || !isset($_GET['id'])) {
        throw new Exception('Requisição inválida ou ID não fornecido.');
    }

    $id = (int) $_GET['id'];
    $categoriaController = new Categoria();
    $categoria = $categoriaController->buscarPorId($id);

    if (!$categoria) {
        throw new Exception('Categoria não encontrada');
    }

    echo json_encode([
        'status' => 'success',
        'categoria' => [
            'id_categoria' => $categoria->getId(),
            'descricao' => $categoria->getDescricao(),
            'cor' => $categoria->getCor(),
            'icone' => $categoria->getIcone()
        ]
    ]);
} catch (Exception $e) {
    error_log("[".date('Y-m-d H:i:s')."] Erro ao buscar categoria: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'mensagem' => $e->getMessage()]);
}