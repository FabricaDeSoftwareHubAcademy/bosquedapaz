<?php
namespace app\Controller;

// ini_set('display_startup_errors', 1);
// ini_set('display_errors', 1);
// error_reporting(-1);

require '../vendor/autoload.php';

use PDO;
use app\Models\Env;
use app\Models\Database;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

Env::load();

class Login {
    public function logar($email, $senha){
        try {
            $db = new Database('pessoa_user');
            $user = $db->select('email = "'.$email.'"')->fetch(PDO::FETCH_ASSOC);
            if ($user){
                if(password_verify($senha, $user['senha'])){

                    if($user['status_pes'] !== 'ativo'){
                        return [
                            'sucess' => FALSE,
                            'msg' => 'Login inválido',
                            $user
                        ];
                    }else {
                        $payload = [
                            'iss' => 'bosquedapaz',
                            'sub' => $user['id_login'],
                            'exp' => time() + (60 * 30),
                            'iat' => time(),
                            'perfil' => $user['perfil'],
                            'status_pes' => $user['status_pes'],
                            'primeiro_acesso' => $user['primeiro_acesso'],
                            'email' => $user['email'],
                        ];
        
                        $createJWT = $this->encodejwt($payload);
    
                        if(!$createJWT){
                            return [
                                'sucess' => FALSE,
                                'msg' => 'Login inválido'
                            ];
                        }else{
                            return [
                                'sucess' => TRUE,
                                'perfil' => $user['perfil'],
                                'status_pes' => $user['status_pes'],
                                'primeiro_acesso' => $user['primeiro_acesso'],
                                $createJWT
                            ];
                        }
                    }
    
                }else{
                    return [
                        'sucess' => FALSE,
                        'msg' => 'Senha incorreta'
                    ];
                }
            }else{
                return [
                    'sucess' => FALSE,
                    'msg' => 'E-mail incorreto'
                ];
            }
        } catch (\Throwable $th) {
            return [
                'sucess' => FALSE,
                'msg' => 'Login inválido '. $th
            ];
        }
    }

    public function encodejwt($payload){
        try {
            $jwt = JWT::encode($payload, $_ENV['PASS_SECRET_MOST_SECRET'], 'HS256');
    
            if(!isset($_SESSION)){
                session_start();
            }
    
            if(isset($_SESSION['tolkenLogin'])){
                unset($_SESSION['tolkenLogin']);
            }
    
            $_SESSION["tolkenLogin"] = $jwt;
            return $_SESSION["tolkenLogin"];
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public static function decodejwt(){
        try {
            if(!isset($_SESSION)){
                session_start();
            }
            if(!isset($_SESSION['tolkenLogin'])){
                return [
                    'sucess' => FALSE,
                    'msg' => 'Usuário não logado',
                ];
            }
            else {
                $jwt = JWT::decode($_SESSION['tolkenLogin'], new Key($_ENV['PASS_SECRET_MOST_SECRET'], 'HS256'));
                return [
                    'sucess' => TRUE,
                    'jwt' => $jwt
                ];
            }
        } catch (\Throwable $th) {
            return [
                'sucess' => FALSE,
                'msg' => 'Tolken inválido'
            ];
        }
    }

    public static function validaLogin($acesso){
        $dadosJwt = self::decodejwt();
        if($dadosJwt['sucess']){
            if($acesso == $dadosJwt['jwt']->perfil){
                return TRUE;
            }else {
                return FALSE;
            }
        }else {
            return FALSE;
        }
    }
}


