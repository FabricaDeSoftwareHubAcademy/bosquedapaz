<?php
require_once('../vendor/autoload.php');
use app\Controller\Parceiro;

try {
    $nome = $_POST['nome'] ?? ''; 

    $parceiro = new Parceiro();
    $dados = $parceiro->ListarParceiros($nome);

    header('Content-Type: application/json');
    echo json_encode($dados);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>
