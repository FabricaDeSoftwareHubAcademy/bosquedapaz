<?php
require_once('../vendor/autoload.php');
use app\Controller\Boleto;

if (isset($_POST['id'], $_POST['status'])) {
    
    $id = intval($_POST['id']);
    $status = ($_POST['status']);

    if (!in_array($status, ['Pago', 'Pendente'])) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Status inválido.']);
        exit;
    }

    $boleto = new Boleto();
    $resultado = $boleto->AlterarStatus($status, $id);

    if ($resultado) {
        echo json_encode(['sucesso' => true]);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Falha ao atualizar o status.']);
    }

} else {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Parâmetros faltando.']);
}
?>
