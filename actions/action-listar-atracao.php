<?php
require_once '../vendor/autoload.php';
use app\Controller\Atracao;

header('Content-Type: application/json');

try {
    $atracao = new Atracao();

    $termo = isset($_GET['termo']) ? trim($_GET['termo']) : '';

    $atracoes = $atracao->buscarPorNome($termo);

    echo json_encode([
        'status' => 'success',
        'dados' => $atracoes
    ], JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'mensagem' => $e->getMessage()
    ]);
}