<?php
require_once('../vendor/autoload.php');
use app\Controller\Boleto;

header("Content-Type: application/json");

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

if (!isset($input['pesquisar-nome'])) {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Nome do expositor não informado."
    ]);
    exit;
}

$nome = trim($input['pesquisar-nome']);

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
        "mensagem" => "Expositor não encontrado."
    ]);
}
?>