<?php
require_once('../vendor/autoload.php');
use app\Controller\UtilidadePublica;

// Define o cabeçalho para garantir que o navegador espere um JSON
header('Content-Type: application/json');

try {
    $util = new UtilidadePublica();
    $utilidades = $util->listar();

    if ($utilidades) {
        echo json_encode([
            'status' => 'success',
            'dados' => $utilidades
        ]);
    } else {
        echo json_encode([
            'status' => 'success',
            'dados' => []
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Erro interno ao listar utilidades: ' . $e->getMessage()
    ]);
}
?>
