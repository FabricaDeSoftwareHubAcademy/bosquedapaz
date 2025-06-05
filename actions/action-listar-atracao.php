<?php
require_once '../vendor/autoload.php';

use app\Controller\Atracao;

header('Content-Type: application/json');

if (!isset($_GET['id_evento'])) {
    echo json_encode([
        'status' => 'error',
        'mensagem' => 'ID do evento não fornecido.'
    ]);
    exit;
}

$id_evento = intval($_GET['id_evento']);

try {
    $atracao = new Atracao();
    // WHERE: apenas atrações deste evento
    $atracoes = $atracao->listar("id_evento = {$id_evento}");

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