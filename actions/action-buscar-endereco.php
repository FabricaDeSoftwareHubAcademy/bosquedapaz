<?php

require_once '../vendor/autoload.php';

use app\Controller\EnderecoEvento;

header('Content-Type: application/json');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode(['erro' => 'ID inválido ou não fornecido.']);
    exit;
}

$id = (int) $_GET['id'];

try {
    $endereco = (new EnderecoEvento())->buscarPorId($id);

    if (!$endereco) {
        echo json_encode(['erro' => 'Endereço não encontrado.']);
        exit;
    }

    echo json_encode([
        'id_endereco_evento' => $endereco->id_endereco_evento,
        'nome_local' => $endereco->nome_local,
        'logradouro_evento' => $endereco->logradouro_evento,
        'cidade_evento' => $endereco->cidade_evento,
        'cep_evento' => $endereco->cep_evento,
        // inclua outros campos conforme a classe
    ]);
} catch (Exception $e) {
    echo json_encode(['erro' => 'Erro ao buscar endereço: ' . $e->getMessage()]);
}