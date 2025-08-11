<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

header('Content-Type: application/json');

require_once('../vendor/autoload.php');
require '../Public/sendEmail.php';

use app\Controller\Expositor;
use app\suport\Csrf;

function gerar_senha($telefone, $nome){

    // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
    return $telefone[2].''.$telefone[3].''.$telefone[4].''.$telefone[5].'@'.$nome[0].''.$nome[1].''.$nome[2].''.$nome[3];
}

if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])){
    try {
        $expositor = new Expositor();
        //////////// PARA APROVAR UM EXPOSITOR \\\\\\\\\\\\\\\\\\\\\\\
        if (isset($_POST['aprovado'])){
            $email = htmlspecialchars(strip_tags($_POST['email']));
            $num_barraca = htmlspecialchars(strip_tags($_POST['num_barraca']));
            $cor_rua = htmlspecialchars(strip_tags($_POST['cor_rua']));

            ///// captura expositor pelo email
            $getExpositor = $expositor->listar('email = "'. $email. '"');
            $nome = $getExpositor[0]['nome'];
            
            $idExpositor = $getExpositor[0]['id_expositor'];
            
            
            ///// verifica se trocou a categoria
            $categoria = isset($_POST['categoria']) ? htmlspecialchars(strip_tags($_POST['categoria'])) : $getExpositor[0]['id_categoria'];

            //// gerar senha
            $newSenha = gerar_senha($getExpositor[0]['telefone'], $getExpositor[0]['nome']);
            
            

            $res = $expositor->validarExpositor($idExpositor, 'validado', $categoria, password_hash($newSenha, PASSWORD_DEFAULT), $num_barraca, $cor_rua, $getExpositor[0]['id_login']);
            
            if ($res){
                ///// enviando a senha no email
                $emailService = new EmailService();

                $corpoEmail = "
                <!DOCTYPE html>
                <html lang='pt-br'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <style>
                        div {
                            margin: auto;
                            padding: .5rem;
                            width: 30rem;
                            text-align: center;
                        }
                
                        h1 {
                            background-color: blue;
                            color: white;
                        }
                    </style>
                </head>
                <body>
                    <div>
                        <h2>Olá $nome, o seu cadastro de expositor na feira bosque da paz foi aprovado</h2>
                        <p>Abaixo está a senha para acessar a sua área de expositor e, poder editar seu perfil</p>
                        <h1>SUA SENHA: $newSenha</h1>
                        <span>No caso desse e-mail ser ignorado a senha não vai ser resetada.</span>
                    </div>
                </body>
                </html>
                ";

                $enviarEmail = $emailService->enviarEmail($email, $corpoEmail);

                $response = array("msg" => 'Expositor aprovado com sucesso', "status" => 200);
                echo json_encode($response);

            }else {
                $response = array("msg" => 'Ocorreu um erro ao aprovar o expositor', "status" => 400);
                echo json_encode($response);
            }

        //////////// PARA RECUSAR UM EXPOSITOR \\\\\\\\\\\\\\\\\\\\\\\
        }else if (isset($_POST['recusado'])) {
            $email = htmlspecialchars(strip_tags($_POST['email']));
            $mensagem = htmlspecialchars(strip_tags($_POST['mensagem']));

            $getExpositor = $expositor->listar('email = "'. $email. '"');

            $idExpositor = $getExpositor[0]['id_expositor'];
            $nome = $getExpositor[0]['nome'];

            $res = $expositor->validarExpositor($idExpositor, 'recusado');
            if ($res){
                ///// enviando a senha no email
                $emailService = new EmailService();

                $corpoEmail = "
                <!DOCTYPE html>
                <html lang='pt-br'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title></title>
                    <style>
                        div {
                            margin: auto;
                            padding: .5rem;
                            width: 30rem;
                            text-align: center;
                        }
                
                        p {
                            text-align: justify;
                        }
                    </style>
                </head>
                <body>
                    <div>
                        <h2>Olá $nome, o seu cadastro de expositor na feira bosque da paz foi recusado</h2>
                        <p>Motivo: $mensagem</p>
                        <span>Atenciosamente: Feira bosque da paz</span>
                    </div>
                </body>
                </html>
                ";

                $enviarEmail = $emailService->enviarEmail($email, $corpoEmail);

                $response = array("msg" => 'Expositor recusado com sucesso', "status" => 200);
                echo json_encode($response);
            }else {
                $response = array("msg" => 'Ocorreu um erro ao recusar o expositor', "status" => 400);
                echo json_encode($response);
            }
        }
    } catch (\Throwable $th) {
        //// no caso de erro
        echo json_encode([
            'status' => 500, 
            'msg' => 'Falha no servidor.'
        ]);
    }
}