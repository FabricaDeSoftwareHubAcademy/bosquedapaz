<?php
require_once('../vendor/autoload.php');

use app\Controller\Boleto;

header("Content-Type: application/json");

// Recebe e decodifica JSON
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

// Validação inicial
if (!isset($input['pesquisar-nome']) || empty(trim($input['pesquisar-nome']))) {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Nome do expositor não informado."
    ]);
    exit;
}

// Sanitiza o nome para evitar XSS
$nome = htmlspecialchars(strip_tags(trim($input['pesquisar-nome'])));

// Inicializa modelo
$expositorModel = new Boleto();

try {
    $resultado = $expositorModel->PesquisarExpositor($nome);

    if ($resultado && count($resultado) > 0) {
        $expositor = $resultado[0];

        echo json_encode([
            "status" => "ok",
            "expositor" => [
                "id"   => (int)$expositor['id_expositor'],
                "nome" => htmlspecialchars($expositor['nome']),
                "cpf"  => htmlspecialchars($expositor['cpf'])
            ]
        ]);
    } else {
        echo json_encode([
            "status" => "erro",
            "mensagem" => "Expositor não encontrado."
        ]);
    }

} catch (Exception $e) {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Erro ao buscar expositor."
    ]);
}
?>
