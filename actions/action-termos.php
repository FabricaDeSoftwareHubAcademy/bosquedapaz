<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $destino = $_POST['destino']; // fallback
    // $origem = $_POST['origem']; // fallback

    if (isset($_POST['aceito'])) {
        $_SESSION['aceitou_termos'] = true;
        header("Location: $destino");
        exit;
    }
}
