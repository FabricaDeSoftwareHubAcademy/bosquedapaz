<?php
require_once('../vendor/autoload.php');
use app\Controller\Atracao;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = sanitizarTexto($_POST['nome_atracao'] ?? '');
    $descricao = sanitizarTexto($_POST['descricao_atracao'] ?? '');
    $id_evento = intval($_POST['id_evento'] ?? '');

    if (!$nome || !$descricao || !$id_evento) {
        echo json_encode(["status" => "erro", "mensagem" => "Preencha todos os campos obrigatórios."]);
        exit;
    }

    $atracao = new Atracao();
    $atracao->setNome($nome);
    $atracao->setDescricao($descricao);
    $atracao->setIdEvento($id_evento);

    // Upload da imagem
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
    
        $nomeFinal = uniqid('atracao_', true) . '.' . $extensao;
        $pasta = '../Public/uploads/atracoes/';
    
        if (!is_dir($pasta)) {
            mkdir($pasta, 0755, true);
        }
    
        if (!move_uploaded_file($tmp, $pasta . $nomeFinal)) {
            echo json_encode(["status" => "erro", "mensagem" => "Erro ao salvar imagem."]);
            exit;
        }
    
        // ✅ Setando no objeto corretamente
        $atracao->setBanner("uploads/atracoes/" . $nomeFinal);
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