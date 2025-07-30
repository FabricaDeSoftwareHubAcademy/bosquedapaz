<?php
require_once('../vendor/autoload.php');
use app\Controller\Parceiro;
use app\suport\Csrf;

if (isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf']) && isset($_POST['id'], $_POST['status'])) {
    
    $id = intval($_POST['id']);
    $status = ($_POST['status']);
    
    if (!in_array($status, ['Ativo', 'Inativo'])) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Status inválido.']);
        exit;
    }

    $parceiro = new Parceiro();
    $resultado = $parceiro->AlterarStatusParceiro($status, $id);

    if ($resultado) {
        echo json_encode(['sucesso' => true]);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Falha ao atualizar o status.']);
    }

} else {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Parâmetros faltando.']);
}
?>
