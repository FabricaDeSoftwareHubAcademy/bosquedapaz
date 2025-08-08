<?php
require_once '../vendor/autoload.php';
use app\Controller\Atracao;

header('Content-Type: application/json');

try {
    $atracao = new Atracao();

    $termo = isset($_GET['termo']) ? trim($_GET['termo']) : '';
    $id_evento = isset($_GET['id_evento']) ? intval($_GET['id_evento']) : 0;

    $atracoes = $atracao->buscarPorNome($termo, $id_evento);

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