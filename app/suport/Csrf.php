<?php

namespace app\suport;
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

session_start();

class Csrf{
    public static function genereteCsrf(){
        
        if(isset($_SESSION['tolkenCsrf'])){
            unset($_SESSION['tolkenCsrf']);
        }

        $_SESSION['tolkenCsrf'] = md5(uniqid(32));

        return '<input type="hidden" name="tolkenCsrf" value="'.$_SESSION['tolkenCsrf'].'">';
    }

    public static function validateTolkenCsrf($tolken){
        if(!isset($_SESSION['tolkenCsrf'])){
            return "tolken invalido";
        }

        if($_SESSION['tolkenCsrf'] !== $tolken){
            return 'tolken invalido';
        }

        unset($_SESSION['tolkenCsrf']);

        return TRUE;
    }
}