<?php 
require_once('../vendor/autoload.php');
use app\Controller\UtilidadePublica;

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    // echo json_encode({"nome": "guiguiteste"});
    $id_utilidade_publica = $_POST['id_utilidade_publica'] ?? null;
    $status = $_POST['status_utilidade'] ?? '';

    $utilidadePublica = new UtilidadePublica();
    $utilidadePublica->id_utilidade_publica = $id_utilidade_publica;
    $utilidadePublica->status_utilidade = $status;

    if ($utilidadePublica->editar_status()) {
        http_response_code(200);
        echo json_encode(['status' => 'success', 'message' => 'Editado com sucesso!!']);
    } else {
        http_response_code(500);
        echo json_encode(['status' => 'success', 'message' => 'Erro ao Editar!']);
    }
}
?>
    