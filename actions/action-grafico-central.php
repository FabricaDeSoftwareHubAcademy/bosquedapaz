<?php
require_once('../vendor/autoload.php');
use app\Controller\Expositor;

header('Content-Type: application/json');

// 🚦 Apenas requisições GET com um ID são permitidas
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $expositorController = new Expositor();
    $expositor = $expositorController->listar();

    if ($expositor) {
        // Se a categoria foi encontrada, retorna os dados
        echo json_encode([
            'status' => 'success',
            'qtdExpositor' => count($expositor),
        ]);
    } else {
        // Se não encontrou, retorna um erro
        echo json_encode(['status' => 'error', 'mensagem' => 'Categoria não encontrada']);
    }
} else {
    // Se a requisição for inválida, retorna um erro
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida ou ID não fornecido.']);
}

// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//     $expositorController = new Expositor();
//     $expositor_espera = $expositorController->listar();

//     if ($expositor) {
//         echo json_encode([
//             'status' => 'success',
//             'qtdExpositorEspera' => count($expositor_espera),
//         ]);
//     } else {
//         echo json_encode(['status' => 'error', 'mensagem' => 'Expositores não encontrados']);
//     }
// } else {
//     echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida ou ID não fornecido.']);
// }