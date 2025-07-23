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
        echo json_encode(['status' => 200, 'msg' => 'Editado com sucesso!!']);
    } else {
        echo json_encode(['status' => 400, 'msg' => 'Erro ao Editar!']);
    }
}
?>
    