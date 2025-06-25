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
        // if ($pessoa && $pessoa->senha === $senha) {
        //     return $pessoa;
        // } else {
        //     return null;
        // }

        // Validação com hash
        if($login && password_verify($senha, $login->senha)){
            return $login;
        } else {
            return null;
        }
    }

}