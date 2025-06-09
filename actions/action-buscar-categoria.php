<?php
require_once('../vendor/autoload.php');
use app\Controller\Categoria;

header('Content-Type: application/json');

// 🚦 Apenas requisições GET com um ID são permitidas
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $categoriaController = new Categoria();
    $categoria = $categoriaController->buscarPorId($id);

    if ($categoria) {
        // Se a categoria foi encontrada, retorna os dados
        echo json_encode([
            'status' => 'success',
            'categoria' => [
                'id_categoria' => $categoria->getId(),
                'descricao' => $categoria->getDescricao(),
                'cor' => $categoria->getCor(),
                'icone' => $categoria->getIcone()
            ]
        ]);
    } else {
        // Se não encontrou, retorna um erro
        echo json_encode(['status' => 'error', 'mensagem' => 'Categoria não encontrada']);
    }
} else {
    // Se a requisição for inválida, retorna um erro
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida ou ID não fornecido.']);
}