<?php
session_start(); // IMPORTANTÍSSIMO para usar sessão
require_once __DIR__ . '../../../app/Models/Database.php';
require_once __DIR__ . '../../../app/Controller/Boleto.php';

// Verifica se a requisição é POST e se o nome foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'])) {
    $boleto = new Boleto();
    $nome = trim($_POST['nome']);

    $resultados = $boleto->PesquisarExpositor($nome);

    // Se encontrou expositor, pega o primeiro resultado completo
    if (!empty($resultados)) {
        // Salva na sessão o expositor inteiro (nome, cpf, id_expositor etc)
        $_SESSION['expositor'] = $resultados[0];
    } else {
        // Caso não tenha encontrado expositor, salva valores vazios
        $_SESSION['expositor'] = [
            'id_expositor' => null,
            'nome' => '',
            'cpf' => ''
        ];
    }

    header('Location: ../../app/Views/Adm/cadastro-boleto.php');
    exit;
}
