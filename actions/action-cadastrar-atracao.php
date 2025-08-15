<?php
require_once('../vendor/autoload.php');

use app\Controller\Atracao;
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

    // Captura e sanitização dos campos
    $nome = sanitizarTexto($_POST['nome_atracao'] ?? '');
    $descricao = sanitizarTexto($_POST['descricao_atracao'] ?? '');
    $id_evento = intval($_POST['id_evento'] ?? 0);
    $nome_evento = sanitizarTexto($_POST['nome_evento'] ?? '');

    // Validação obrigatória
    if (!$nome || !$descricao || !$id_evento) {
        throw new Exception('Preencha todos os campos obrigatórios.');
    }

    // Instanciação e atribuição dos dados
    $atracao = new Atracao();
    $atracao->nome_atracao = $nome;
    $atracao->descricao_atracao = $descricao;
    $atracao->id_evento = $id_evento;

    // Upload da imagem obrigatória
    if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('Imagem obrigatória.');
    }

    $tmp = $_FILES['file']['tmp_name'];
    $nomeOriginal = basename($_FILES['file']['name']);
    $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
    $mime = mime_content_type($tmp);

    $permitidas = ['jpg', 'jpeg', 'png', 'gif'];
    $mimePermitidos = ['image/jpeg', 'image/png', 'image/gif'];

    if (!in_array($extensao, $permitidas) || !in_array($mime, $mimePermitidos)) {
        throw new Exception('Formato ou tipo de imagem inválido.');
    }

    $nomeSeguro = uniqid('atracao_', true) . '.' . $extensao;
    $pastaDestino = '../Public/uploads/atracoes/';
    $caminhoFinal = $pastaDestino . $nomeSeguro;

    if (!is_dir($pastaDestino)) {
        mkdir($pastaDestino, 0755, true);
    }

    if (!move_uploaded_file($tmp, $caminhoFinal)) {
        throw new Exception('Erro ao salvar imagem.');
    }

    $atracao->banner_atracao = "uploads/atracoes/" . $nomeSeguro;

    // Cadastro no banco
    if (!$atracao->cadastrar()) {
        throw new Exception('Erro ao cadastrar atração.');
    }

    // Sucesso
    echo json_encode([
        'status' => 'sucesso',
        'mensagem' => 'Atração cadastrada com sucesso!'
    ]);

} catch (Exception $e) {
    // Log interno do erro real
    error_log("[" . date('Y-m-d H:i:s') . "] Erro no cadastro de atração: " . $e->getMessage());

    // Retorno controlado
    echo json_encode([
        'status' => 'erro',
        'mensagem' => $e->getMessage() // ou mensagem genérica em produção
    ]);
}