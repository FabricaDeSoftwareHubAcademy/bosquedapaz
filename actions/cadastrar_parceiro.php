<?php

    require "../Controller/Parceiro.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $parceiro = new Parceiro();

        $parceiro->nome_parceiro = $_POST["nome_parceiro"];
        $parceiro->telefone = $_POST["telefone"];
        $parceiro->email = $_POST["email"];
        $parceiro->nome_contato = $_POST["nome_contato"];
        $parceiro->tipo = $_POST["tipo"];
        $parceiro->cpf_cnpj = $_POST["cpf_cnpj"];
        $parceiro->logo = $_POST["logo"];
        $parceiro->cep = $_POST["cep"];
        $parceiro->logradouro = $_POST["logradouro"];
        $parceiro->num_residencia = $_POST["num_residencia"];
        $parceiro->bairro = $_POST["bairro"];
        $parceiro->cidade = $_POST["cidade"];
        $parceiro->complemento = $_POST["complemento"];


        $parceiro->cadastrar();
    }
?>