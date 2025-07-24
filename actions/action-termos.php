<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['botao-continuar'])) {
    
    if (isset($_POST['aceito'])) {

        $_SESSION['aceitou_termos_expositor'] = true;

        $destino = $_POST['destino'];

        header("Location: $destino");
        exit();

    } else {
        $_SESSION['erro_termo'] = "Você deve aceitar os termos antes de continuar.";

        $origem = $_POST['origem'];
        header("Location: $origem");
        exit();
    }
}