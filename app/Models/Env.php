<?php 

namespace app\Models;

// echo "<pre>";
// var_dump(getenv());
// echo "</pre>";

class Env {

    public static function load(string $dotEnv = __DIR__ . "/../../.env"):void
    {
        if(file_exists($dotEnv)){
            $env = parse_ini_file($dotEnv);


             foreach ($env as $chave => $valor){
                putenv($chave. "=". $valor);
                $_ENV[$chave] = $valor;
             }
            
        }else{
            throw new \RuntimeException("Arquivo .env nao encontrado em ". $dotEnv);
        }
    }

}