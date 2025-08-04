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
            'perfil' => $login->perfil,
            'id_login' => $login->id_login,
        ];

        if($_SESSION['login']['perfil'] == 1){
            header('Location: ../app/Views/Adm/');
            exit;
        }else{
            header('Location: ../app/Views/Expositor/');
            exit;
        }
        exit;
    } 
    else{
        header('Location: tela-login.php?erro=1');
        exit;
    }
}
