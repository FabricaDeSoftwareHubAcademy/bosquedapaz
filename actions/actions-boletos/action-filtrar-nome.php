<?php
require_once '../../app/Controller/Boleto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';

    $boletos = new Boleto();
    $dados = $boletos->ListarBoletos($nome);

    // Percorre os boletos e formata a data 'vencimento' para dd/mm/yyyy
    foreach ($dados as &$boleto) {
        if (!empty($boleto['vencimento'])) {
            $boleto['vencimento'] = date("d/m/Y", strtotime($boleto['vencimento']));
        }
    }
    unset($boleto); // quebra referência por segurança

    header('Content-Type: application/json');
    echo json_encode($dados);
    exit;
}
?>
