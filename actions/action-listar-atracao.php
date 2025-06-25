<?php
require_once '../vendor/autoload.php';
use app\Controller\Atracao;

header('Content-Type: application/json');

try {
    $atracao = new Atracao();

    $id_evento = isset($_GET['id_evento']) ? (int)$_GET['id_evento'] : null;
    $where = $id_evento ? "id_evento = {$id_evento}" : null;

    $atracoes = $atracao->listar($where);

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