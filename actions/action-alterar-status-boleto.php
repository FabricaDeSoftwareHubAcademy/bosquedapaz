<?php
require_once('../vendor/autoload.php');
use app\Controller\Boleto;
use app\suport\Csrf;

if (isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf']) && isset($_POST['id'], $_POST['status'])) {
    try {
        
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
        
    } catch (\Throwable $th) {
        // Log do erro real para debugging
        error_log("Erro no cadastro de evento: " . $e->getMessage());
        
        // Resposta genérica para o usuário
        echo json_encode(["status" => "erro", "mensagem" => "Erro interno do sistema."]);
    }
    


} else {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Parâmetros faltando.']);
}
?>
