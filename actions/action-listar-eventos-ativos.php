<?php
require_once '../vendor/autoload.php';

use app\Controller\Evento;
use app\Controller\EnderecoEvento;

header('Content-Type: application/json');

try {
    $eventoObj = new Evento();
    $enderecoObj = new EnderecoEvento();

    $eventos = $eventoObj->listar_evento("status = 1");

    // Adiciona os dados de endereço para cada evento
    foreach ($eventos as &$evento) {
        $endereco = $enderecoObj->buscarPorId($evento['id_endereco_evento']);
        $evento['endereco_completo'] = $endereco;
    }

    echo json_encode([
        'status' => 'success',
        'dados' => $eventos
    ], JSON_PRETTY_PRINT);
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'mensagem' => $e->getMessage()
    ]);
}

