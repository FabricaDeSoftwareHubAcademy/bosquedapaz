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
    $bairro_evento = sanitizarTexto($_POST['bairro_evento'] ?? '');
    $cidade_evento = sanitizarTexto($_POST['cidade_evento'] ?? '');
        
    if (empty($logradouro_evento) || empty($numero_evento) || empty($bairro_evento) || !validarData($cidade_evento)) {
       echo json_encode(["status" => "erro", "mensagem" => "Preencha todos os campos corretamente."]);
        exit;
    }

    $endereco = new EnderecoEvento();
    $endereco->cep_evento = $cep_evento;
    $endereco->logradouro_evento = $logradouro_evento;
    $endereco->complemento_evento = $complemento_evento;
    $endereco->numero_evento = $numero_evento;
    $endereco->bairro_evento = $bairro_evento;
    $endereco->cidade_evento = $cidade_evento;

    
    if ($endereco->cadastrar_endereco_evento()) {
        echo json_encode(["status" => "sucesso", "mensagem" => "Endereço cadastrado com sucesso!"]);
    } else {
        echo json_encode(["status" => "erro", "mensagem" => "Erro ao cadastrar evento."]);
    }
    exit;
}
?>