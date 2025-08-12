<?php
require_once('../vendor/autoload.php');

use app\Controller\Boleto;

header("Content-Type: application/json");

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

if (!is_array($input)) {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Formato de dados inválido."
    ]);
    exit;
}

if (empty($input['pesquisar-nome'])) {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Nome do expositor não informado."
    ]);
    exit;
}

$nome = htmlspecialchars(strip_tags(trim($input['pesquisar-nome'])));
$modo = isset($input['modo']) ? $input['modo'] : 'busca';

$expositorModel = new Boleto();
$resultado = $expositorModel->PesquisarExpositor($nome);

// ====================
// Modo sugestões (lista de nomes)
// ====================
if ($modo === "sugestoes") {
    if ($resultado && count($resultado) > 0) {
        $lista = [];
        foreach ($resultado as $expositor) {
            $lista[] = [
                "id"   => $expositor['id_expositor'],
                "nome" => $expositor['nome'],
                "cpf"  => $expositor['cpf']
            ];
        }
        echo json_encode([
            "status" => "ok",
            "expositores" => $lista
        ]);
    } else {
        echo json_encode([
            "status" => "erro",
            "mensagem" => "Nenhum expositor encontrado."
        ]);
    }
    exit;
}

// ====================
// Modo busca única (preenche os campos)
// ====================
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
