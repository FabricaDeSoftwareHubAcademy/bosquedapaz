<?php
require_once('../vendor/autoload.php');
use app\Controller\Expositor;

header('Content-Type: application/json');

try {
    $obj = new Expositor();
    $dados = $obj->buscar(null, "RAND()", 10);

    echo json_encode($dados);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'Erro ao buscar expositores',
        'mensagem' => $e->getMessage()
    ]);
}
