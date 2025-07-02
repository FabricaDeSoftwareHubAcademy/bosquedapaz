<?php
require_once('../vendor/autoload.php');
use app\Controller\Parceiro;


try {
    $parceiro = new Parceiro();
    $dados = $parceiro->listar();
    header('Content-Type: application/json');
    echo json_encode($dados);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'Erro ao buscar parceiros',
        'mensagem' => $e->getMessage()
    ]);
}



