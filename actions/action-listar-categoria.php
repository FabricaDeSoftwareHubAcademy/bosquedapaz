<?php
require_once('../vendor/autoload.php');
use app\Controller\Categoria;

header('Content-Type: application/json');

try {
    $categoria = new Categoria();
    $dados = $categoria->listar();

    echo json_encode($dados);

} catch (Exception $e) {
    http_response_code(500); 
    echo json_encode([
        'status' => 'Erro ao buscar categorias',
        'mensagem' => $e->getMessage()
    ]);
}
