<?php

require_once('../vendor/autoload.php');

use app\Controller\UtilidadePublica;

header('Content-Type: application/json');

$proximaUtilidade = new UtilidadePublica();

$recente = (new DateTime())->format('Y-m-d');
$utilities = $proximaUtilidade->listar_mais_proximo("status = 1 AND data_inicio >= '$recente'", "data_inicio ASC", "1");

if (!empty($utilities)) {
    echo json_encode([
        'status' => 'success',
        'utilidade' => $utilities[0]
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'mensagem' => 'Nenhuma utilidade pública encontrada'
    ]);
}
