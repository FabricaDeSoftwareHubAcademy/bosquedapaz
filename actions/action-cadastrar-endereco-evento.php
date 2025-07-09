<?php
require_once('../vendor/autoload.php');
use app\Controller\EnderecoEvento;

header('Content-Type: application/json');

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cep_vento = sanitizarTexto($_POST['cep_evento'] ?? '');
    $logradouro_evento = sanitizarTexto($_POST['logradouro_evento'] ?? '');
    $complemento_evento = sanitizarTexto($_POST['complemento_evento'] ?? '');
    $numero_evento = $_POST['numero_evento'] ?? '';
    $bairro_evento = $_POST['bairro_evento'] ?? '';
    $cidade_evento = $_POST['cidade_evento'] ?? '';

    if (strlen($descricao) > 500) {
        echo json_encode(["status" => "erro", "mensagem" => "A descrição deve ter no máximo 250 caracteres."]);
        exit;
    }    

    
    if (empty($nome) || empty($descricao) || empty($data) || !validarData($data) || empty($subtitulo) || empty($hora_inicio) || empty($hora_fim) || empty($endereco)) {
       echo json_encode(["status" => "erro", "mensagem" => "Preencha todos os campos corretamente."]);
        exit;
    }

    $evento = new Evento();
    $evento->nome_evento = $nome;
    $evento->subtitulo_evento = $subtitulo;
    $evento->descricao_evento = $descricao;
    $evento->data_evento = $data;
    $evento->hora_inicio = $hora_inicio;
    $evento->hora_fim = $hora_fim;
    $evento->endereco_evento = $endereco;

   
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        chmod("../Public/uploads/uploads-eventos/", 0777);
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
        
        $evento->banner_evento = 'uploads/uploads-eventos/' . $nomeSeguro;
    } else {
        echo json_encode(["status" => "erro", "mensagem" => "Erro no upload do banner."]);
        exit;
    }

    
    if ($evento->cadastrar_evento()) {
        echo json_encode(["status" => "sucesso", "mensagem" => "Evento cadastrado com sucesso!"]);
    } else {
        echo json_encode(["status" => "erro", "mensagem" => "Erro ao cadastrar evento."]);
    }
    exit;
}
?>