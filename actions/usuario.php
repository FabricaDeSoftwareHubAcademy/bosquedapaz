<?php

require '../app/Models/Database.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Usuario{
    private $db;

    public function logar($email, $senha){
        $db = new Database('pessoa');
        $res = $db->login($email, $senha);

        if($res){
            return true;
        }else{
            return false;
        }

    }
}