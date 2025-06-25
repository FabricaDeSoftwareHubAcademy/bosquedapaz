<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: ../../../index.php');
    exit;
}


$perfilUsuario = $_SESSION['login']['perfil'];
$idUsuario = $_SESSION['login']['id_pessoa'];
echo $idUsuario;