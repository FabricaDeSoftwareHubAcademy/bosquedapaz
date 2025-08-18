<?php
require_once('../vendor/autoload.php');
use app\Controller\UtilidadePublica;

header('Content-Type: application/json');

try {
    $util = new UtilidadePublica();
    $utilidades = $util->listar("status_utilidade = 1");

    echo json_encode([
        'status' => 'success',
        'dados' => $utilidades
    ], JSON_PRETTY_PRINT);
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'mensagem' => $e->getMessage()
    ]);
}


