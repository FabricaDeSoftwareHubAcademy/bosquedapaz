<?php
require_once '../vendor/autoload.php';

use app\Controller\Categoria;

header('Content-Type: application/json');

try {
    $categoria = new Categoria();
    $categorias = $categoria->listar(); // retorna array associativo

    echo json_encode([
        'status' => 'success',
        'dados' => $categorias
    ], JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'mensagem' => $e->getMessage()
    ]);
}