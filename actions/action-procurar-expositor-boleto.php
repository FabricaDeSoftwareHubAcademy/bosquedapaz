<?php
require_once('../vendor/autoload.php');

use app\Controller\Boleto;

// Define o cabeçalho para resposta JSON
header("Content-Type: application/json");

// Lê o corpo da requisição JSON
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

// Verifica se o JSON foi decodificado corretamente
if (!is_array($input)) {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Formato de dados inválido."
    ]);
    exit;
}

// Verifica se o campo 'pesquisar-nome' foi enviado
if (empty($input['pesquisar-nome'])) {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Nome do expositor não informado."
    ]);
    exit;
}

// Sanitiza o nome para evitar XSS
$nome = htmlspecialchars(strip_tags(trim($input['pesquisar-nome'])));

// Busca expositor
$expositorModel = new Boleto();
$resultado = $expositorModel->PesquisarExpositor($nome);

if ($resultado && count($resultado) > 0) {
    $expositor = $resultado[0];

    echo json_encode([
        "status" => "ok",
        "expositor" => [
            "id"   => $expositor['id_expositor'],
            "nome" => $expositor['nome'],
            "cpf"  => $expositor['cpf']
        ]
    ]);
} else {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Erro ao buscar expositor."
    ]);
}

