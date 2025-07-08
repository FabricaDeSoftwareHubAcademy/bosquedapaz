<?php
require_once '../vendor/autoload.php';

use app\Controller\Artista;

header('Content-Type: application/json; charset=utf-8');

try {
    $artistaController = new Artista();

    $resultado = $artistaController->listar();

    if ($resultado && count($resultado) > 0) {
        echo json_encode($resultado);
    } else {
        echo json_encode([]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao listar artistas: ' . $e->getMessage()]);
}
