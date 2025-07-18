<?php
require_once('../vendor/autoload.php');

use app\Controller\EnderecoEvento;

header('Content-Type: application/json');

try {
    $endereco = new EnderecoEvento();

    // Criar método listar_enderecos() se ainda não tiver
    $resultados = $endereco->listar_enderecos();

    echo json_encode([
        'status' => 'sucesso',
        'dados' => $resultados
    ]);
} catch (Exception $e) {
    echo json_encode([
        'status' => 'erro',
        'mensagem' => 'Erro ao buscar endereços: ' . $e->getMessage()
    ]);
}