<?php
require_once('../vendor/autoload.php');

use app\Controller\EnderecoEvento;
use app\suport\Csrf;

header('Content-Type: application/json');

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

try {
    // Validação do CSRF
    if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
        throw new Exception('Token CSRF inválido.');
    }

    // Sanitização e captura de dados
    $nome_local = sanitizarTexto($_POST['local_evento'] ?? '');
    $cep_evento = $_POST['cep_evento'] ?? '';
    $logradouro_evento = sanitizarTexto($_POST['logradouro_evento'] ?? '');
    $complemento_evento = sanitizarTexto($_POST['complemento_evento'] ?? '');
    $numero_evento = $_POST['numero_evento'] ?? '';
    $bairro_evento = sanitizarTexto($_POST['bairro_evento'] ?? '');
    $cidade_evento = sanitizarTexto($_POST['cidade_evento'] ?? '');

    // Validações obrigatórias
    if (empty($logradouro_evento) || empty($numero_evento) || empty($bairro_evento) || empty($cidade_evento)) {
        throw new Exception('Preencha todos os campos obrigatórios corretamente.');
    }

    // Criação e atribuição no objeto
    $endereco = new EnderecoEvento();
    $endereco->nome_local = $nome_local;
    $endereco->cep_evento = $cep_evento;
    $endereco->logradouro_evento = $logradouro_evento;
    $endereco->complemento_evento = $complemento_evento;
    $endereco->numero_evento = $numero_evento;
    $endereco->bairro_evento = $bairro_evento;
    $endereco->cidade_evento = $cidade_evento;

    // Cadastro no banco
    if (!$endereco->cadastrar_endereco_evento()) {
        throw new Exception('Erro ao cadastrar endereço.');
    }

    // Sucesso
    echo json_encode([
        'status' => 'sucesso',
        'mensagem' => 'Endereço cadastrado com sucesso!'
    ]);

} catch (Exception $e) {
    // Log interno para depuração
    error_log("[" . date('Y-m-d H:i:s') . "] Erro no cadastro de endereço: " . $e->getMessage());

    // Retorno para o cliente
    echo json_encode([
        'status' => 'erro',
        'mensagem' => $e->getMessage() // Pode ser genérico em produção
    ]);
}