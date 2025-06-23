<?php
namespace actions;

require_once('../vendor/autoload.php');

use app\Models\Database;

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Login{
    private $db;

    public function autenticar($email, $senha){
        $db = new Database('pessoa');
        $pessoa = $db->select("email = '$email'")->fetchObject();

        // Validação simples, sem hash
        if ($pessoa && password_verify($pessoa->senha) === $senha) {
            return $pessoa;
        } else {
            return null;
        }
    }


    // public function autenticar($email, $senha){
    // $db = new Database('usuario');

    // $login = $db->selectWhere("email = ?", [$email])->fetchObject();

    //     if($login && password_verify($senha, $login->senha)){
    //         return $login;
    //     } else {
    //         return null;
    //     }
    // }
}
