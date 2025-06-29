<?php
require_once "../../app/Controller/Boleto.php";

if (isset($_POST['botao-cadastrar'])) {
    $boleto = new Boleto();
    // Preenche os atributos (ajuste conforme os nomes certos na sua classe)
    $boleto->pdf = 'teste.pdf'; // Só um valor fictício para testes, já que o PDF ainda é varchar
    $boleto->mes_referencia = $_POST['referencia'];
    $boleto->valor = $_POST['valor-cb'];
    $boleto->vencimento = $_POST['val-cb'];
    $boleto->id_expositor = $_POST['id_expositor']; // Esse campo já está no input hidden

    // Chama a função para cadastrar
    if ($boleto->CadastrarBoletos()) {
        echo "<script>alert('Boleto cadastrado com sucesso!')";
    } else {
        echo "<script>alert('Erro ao cadastrar boleto!')</script>";
    }

} else {
    echo "<script>alert('Falha no Cadastro.')</script>";
    exit;
}