<?php
require_once __DIR__ . '../../../app/Models/Database.php';
require_once __DIR__ . '../../../app/Controller/Boleto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $boleto = new Boleto();

    // Captura e valida os dados enviados pelo form
    $boleto->mes_referencia = $_POST['referencia'] ?? null;
    $boleto->valor = $_POST['valor-cb'] ?? null;
    $boleto->vencimento = $_POST['val-cb'] ?? null;
    $boleto->id_expositor = isset($_POST['id_expositor']) ? (int) $_POST['id_expositor'] : null;

    if ($boleto->CadastrarBoletos()) {
        header('Location: ../../app/Views/Adm/cadastro-boleto.php');
        exit;
    } else {
        echo "Erro ao cadastrar boleto.";
    }
}
