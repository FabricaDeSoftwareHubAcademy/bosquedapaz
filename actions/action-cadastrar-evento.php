<?php
require_once('../vendor/autoload.php');
use app\Controller\Evento;

ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

function validarData($data) {
    $d = DateTime::createFromFormat('Y-m-d', $data);
    return $d && $d->format('Y-m-d') === $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = sanitizarTexto($_POST['nomedoevento'] ?? '');
    $descricao = sanitizarTexto($_POST['descricaodoevento'] ?? '');
    $data = $_POST['dataevento'] ?? '';

    
    if (empty($nome) || empty($descricao) || empty($data) || !validarData($data)) {
       echo json_encode(["status" => "erro", "mensagem" => "Preencha todos os campos corretamente."]);
        exit;
    }

    $evento = new Evento();
    $evento->setNome($nome);
    $evento->setDescricao($descricao);
    $evento->setData($data);

   
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $arquivoTmp = $_FILES['file']['tmp_name'];
        $nomeOriginal = basename($_FILES['file']['name']);
        $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($extensao, $extensoesPermitidas)) {
            echo json_encode(["status" => "erro", "mensagem" => "Formato de imagem inválido."]);
            exit;
        }

        $nomeSeguro = uniqid('evento_', true) . '.' . $extensao;
        $pastaDestino = '../Public/uploads/uploads-eventos/';
        $caminhoFinal = $pastaDestino . $nomeSeguro;

        if (!is_dir($pastaDestino)) {
            mkdir($pastaDestino, 0755, true);
        }

        if (!move_uploaded_file($arquivoTmp, $caminhoFinal)) {
            echo json_encode(["status" => "erro", "mensagem" => "Erro ao salvar o arquivo."]);
            exit;
        }

        
        $evento->setBanner('uploads/uploads-eventos/' . $nomeSeguro);
    } else {
        echo json_encode(["status" => "erro", "mensagem" => "Erro no upload do banner."]);
        exit;
    }

    
    if ($evento->cadastrar()) {
        echo json_encode(["status" => "sucesso", "mensagem" => "Evento cadastrado com sucesso!"]);
    } else {
        echo json_encode(["status" => "erro", "mensagem" => "Erro ao cadastrar evento."]);
    }
    exit;
}
?>