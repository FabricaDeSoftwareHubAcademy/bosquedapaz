<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['botao-continuar'])) {
    
    if (isset($_POST['termos'])) {

        $_SESSION['aceitou_termos'] = 'Sim';

        $destino = $_POST['destino'];
        // var_dump($_SESSION);
        header("Location: $destino");
        exit();

    } else {
        $_SESSION['erro_termo'] = "Você deve aceitar os termos antes de continuar.";

        $origem = $_POST['origem'];
        header("Location: $origem");
        exit();
    }
}