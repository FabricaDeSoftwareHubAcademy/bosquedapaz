<?php
require_once('../vendor/autoload.php');
use app\Controller\Expositor;

header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $expositorController = new Expositor();
    $expositor = $expositorController->listar();
    $expositor_espera = $expositorController->filtrar("", "= 'aguardando'");
    // $expositor_pagou = $expositorController->filtrar("", "= 'aguardando'");

    if ($expositor) {
        // Se a categoria foi encontrada, retorna os dados
        echo json_encode([
            'status' => 'success',
            'qtdExpositor' => count($expositor),
            'qtdExpositorEspera' => count($expositor_espera)
            // 'qtdExpositorPagante' => count($expositor_pagou)
        ]);
    } else {
        // Se não encontrou, retorna um erro
        echo json_encode(['status' => 'error', 'mensagem' => 'Categoria não encontrada']);
    }
} else {
    // Se a requisição for inválida, retorna um erro
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida ou ID não fornecido.']);
}

// if ($_SERVER['REQUEST_METHOD'] === 'GET'){
//     $expositorController = new Expositor();
//     $expositor_espera = $expositorController->filtrar("", "= 'aguardando'");
    
//     if ($expositor_espera) {
//         echo json_encode([
//             'status' => 'success',
//             'qtdExpositorEspera' => count($expositor_espera),
//         ]);
//     } else {
//         // Se não encontrou, retorna um erro
//         echo json_encode(['status' => 'error', 'mensagem' => 'Categoria não encontrada']);
//     }

// }
