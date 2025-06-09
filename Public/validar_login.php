<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
require_once('../vendor/autoload.php');
require_once('../actions/Login.php');

use actions\Login;


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $loginObj = new Login();
    $login = $loginObj->autenticar($email, $senha);

    if($login){
        $_SESSION['login'] = [
            'nome' => $login->nome,
            'perfil' => $login->perfil,
        ];

        // print_r($_SESSION['login']['adm']);

        if($_SESSION['login']['perfil'] == 1){
            header('Location: ../app/Views/Adm/Area-Adm.php');
        }else{
            header('Location: ../app/Views/Client/area-expo.php');
        }
        exit;
    } else{
        header('Location: tela-login.php?erro=1');
        exit;
    }
}