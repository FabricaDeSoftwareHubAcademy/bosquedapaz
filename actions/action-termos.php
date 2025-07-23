<?php
session_start();

// Confere se veio pelo botão "Continuar"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['botao-continuar'])) {
    
    // Confere se o checkbox foi marcado
    if (isset($_POST['aceito'])) {

        // Marca na sessão que o termo foi aceito
        $_SESSION['aceitou_termos_expositor'] = true;

        // Recupera o caminho da próxima página
        $destino = $_POST['destino'];

        // Redireciona para a página de cadastro
        header("Location: $destino");
        exit();

    } else {
        // Se alguém burlou o JS e enviou sem aceitar
        $_SESSION['erro_termo'] = "Você deve aceitar os termos antes de continuar.";

        // Retorna para a página de termos
        $origem = $_POST['origem'];
        header("Location: $origem");
        exit();
    }
}