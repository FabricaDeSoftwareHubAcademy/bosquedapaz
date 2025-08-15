<?php
require_once('../vendor/autoload.php');

use app\Controller\Evento;
use app\suport\Csrf;

header('Content-Type: application/json');

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

function validarData($data) {
    $d = DateTime::createFromFormat('Y-m-d', $data);
    return $d && $d->format('Y-m-d') === $data;
}

try {
    // Validação do CSRF
    if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
        throw new Exception('Token CSRF inválido.');
    }

    // Sanitização e validações
    $nome = sanitizarTexto($_POST['nomedoevento'] ?? '');
    $subtitulo = sanitizarTexto($_POST['subtitulo'] ?? '');
    $descricao = sanitizarTexto($_POST['descricaodoevento'] ?? '');
    $data = $_POST['dataevento'] ?? '';
    $hora_inicio = $_POST['hora_inicio'] ?? '';
    $hora_fim = $_POST['hora_fim'] ?? '';
    $endereco = $_POST['endereco'] ?? '';

    if (strlen($descricao) > 500) {
        throw new Exception('A descrição deve ter no máximo 500 caracteres.');
    }

    if (
        empty($nome) || empty($descricao) || empty($data) || !validarData($data) ||
        empty($subtitulo) || empty($hora_inicio) || empty($hora_fim) || empty($endereco)
    ) {
        throw new Exception('Preencha todos os campos corretamente.');
    }

    // Criação do evento
    $evento = new Evento();
    $evento->nome_evento = $nome;
    $evento->subtitulo_evento = $subtitulo;
    $evento->descricao_evento = $descricao;
    $evento->data_evento = $data;
    $evento->hora_inicio = $hora_inicio;
    $evento->hora_fim = $hora_fim;
    $evento->id_endereco_evento = $endereco;

    // Upload do banner
    if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('Erro no upload do banner.');
    }

    chmod("../Public/uploads/uploads-eventos/", 0777);
    $arquivoTmp = $_FILES['file']['tmp_name'];
    $nomeOriginal = basename($_FILES['file']['name']);
    $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

    $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($extensao, $extensoesPermitidas)) {
        throw new Exception('Formato de imagem inválido.');
    }

    $nomeSeguro = uniqid('evento_', true) . '.' . $extensao;
    $pastaDestino = '../Public/uploads/uploads-eventos/';
    $caminhoFinal = $pastaDestino . $nomeSeguro;

    if (!is_dir($pastaDestino)) {
        mkdir($pastaDestino, 0755, true);
    }

    if (!move_uploaded_file($arquivoTmp, $caminhoFinal)) {
        throw new Exception('Erro ao salvar o arquivo.');
    }

    $evento->banner_evento = 'uploads/uploads-eventos/' . $nomeSeguro;

    // Cadastrar evento
    if (!$evento->cadastrar_evento()) {
        throw new Exception('Erro ao cadastrar evento.');
    }

    // Sucesso
    echo json_encode([
        'status' => 'sucesso',
        'mensagem' => 'Evento cadastrado com sucesso!'
    ]);

} catch (Exception $e) {
    // Log interno
    error_log("[" . date('Y-m-d H:i:s') . "] Erro no cadastro de evento: " . $e->getMessage());

    // Retorno seguro
    echo json_encode([
        'status' => 'erro',
        'mensagem' => $e->getMessage() // ou mensagem genérica em produção
    ]);
}