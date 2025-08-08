<?php
require_once('../vendor/autoload.php');
use app\Controller\Atracao;
use app\suport\Csrf;

header('Content-Type: application/json');

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if (isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
    $nome = sanitizarTexto($_POST['nome_atracao'] ?? '');
    $descricao = sanitizarTexto($_POST['descricao_atracao'] ?? '');
    $id_evento = intval($_POST['id_evento'] ?? '');
    $nome_evento = sanitizarTexto($_POST['nome_evento'] ?? '');

    if (!$nome || !$descricao || !$id_evento) {
        echo json_encode(["status" => "erro", "mensagem" => "Preencha todos os campos obrigatórios."]);
        exit;
    }

    $atracao = new Atracao();
    $atracao->nome_atracao = $nome;
    $atracao->descricao_atracao = $descricao;
    $atracao->id_evento = $id_evento;

    
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $tmp = $_FILES['file']['tmp_name'];
        $nomeOriginal = basename($_FILES['file']['name']);
        $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
        $mime = mime_content_type($tmp);
    
        $permitidas = ['jpg', 'jpeg', 'png', 'gif'];
        $mimePermitidos = ['image/jpeg', 'image/png', 'image/gif'];
    
        if (!in_array($extensao, $permitidas) || !in_array($mime, $mimePermitidos)) {
            echo json_encode(["status" => "erro", "mensagem" => "Formato ou tipo de imagem inválido."]);
            exit;
        }
    
        $nomeSeguro = uniqid('atracao_', true) . '.' . $extensao;
        $pastaDestino = '../Public/uploads/atracoes/';
        $caminhoFinal = $pastaDestino . $nomeSeguro;
    
        if (!is_dir($pastaDestino)) {
            mkdir($pastaDestino, 0755, true);
        }

        if (!move_uploaded_file($tmp, $caminhoFinal)) {
            echo json_encode(["status" => "erro", "mensagem" => "Erro ao salvar imagem."]);
            exit;
        }
    
        $atracao->banner_atracao = "uploads/atracoes/" . $nomeSeguro;        
    } else {
        echo json_encode(["status" => "erro", "mensagem" => "Imagem obrigatória."]);
        exit;
    }

    if ($atracao->cadastrar()) {
        echo json_encode(["status" => "sucesso", "mensagem" => "Atração cadastrada com sucesso!"]);
    } else {
        echo json_encode(["status" => "erro", "mensagem" => "Erro ao cadastrar atração."]);
    }
}