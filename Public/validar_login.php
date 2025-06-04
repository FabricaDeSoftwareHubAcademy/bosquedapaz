<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
require __DIR__ . '/../actions/Login.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $loginObj = new Login();
    $login = $loginObj->autenticar($email, $senha);

    if($login){
        $_SESSION['login'] = [
            'nome' => $login->nome,
            'adm' => $login->adm,
        ];

        // print_r($_SESSION['login']['adm']);

        if($_SESSION['login']['adm'] == 1){
            header('Location: ../app/adm/Views/Area-Adm.php');
        }else{
            header('Location: ../app/client/Views/area-expo.php');
        }
        exit;
    } else{
        header('Location: tela-login.php?erro=1');
        exit;
    }
}