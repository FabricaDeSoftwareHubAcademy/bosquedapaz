<?php

header('Content-Type: application/json');
require_once('../app/helpers/login.php');

require_once('../vendor/autoload.php');
require '../Public/sendEmail.php';

use app\Controller\Expositor;
use app\suport\Csrf;

function gerarSenha($cpf, $nome){
    return substr($cpf, 0, 6)."@".strtolower(explode(' ',$nome)[0]);
}

if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])){
    try {
        if(!confirmaLogin(1)){
            echo json_encode([
                'msg' => 'Login Inválido',
            ]);
            http_response_code(400);
            exit;
        }
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
            $newSenha = gerarSenha($getExpositor[0]['cpf'], $getExpositor[0]['nome']);
            

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
                    <title></title>
                    <style>
                        body {
                            margin: auto;
                            max-width: 30rem;
                            text-align: center;
                        }
                        h1 {
                            font-size: 1.2rem;
                            font-weight: 600;
                        }
                        p {
                            font-size: 1.1rem;
                            font-weight: 500;
                        }
                        h2{
                            font-size: 1.1rem;
                            font-weight: 600;
                        }
                        div {
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            padding: .5rem;
                        }
                        a{
                            display: block;
                            background-color: #007E70;
                            width: 6rem;
                            padding: .5rem;
                            border-radius: .5rem;
                            color: white;
                            text-decoration: none;
                            font-weight: 500;
                        }
                    </style>
                </head>

                <body>
                    <h1>Olá $nome, o seu cadastro na feria bosque da paz foi aprovado, abaixo estão as seus informações para acessar o
                        seu perfil.</h1>
                    <p>O E-mail para acesso é: $email</p>
                    <p>A sua senha para acesso é: $newSenha</p>
                    <h2>Clique no botão abaixo para acessar o seu login</h2>
                    <div><a href='https://feirabosquedapaz.com.br/app/Views/Client/tela-login.php'>Clique Aqui!!</a></div>
                    <span>Atenciosamente Feira Bosque Da Paz!!</span>
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
                        body {
                            margin: auto;
                            max-width: 30rem;
                            text-align: justify;
                        }
                        h1 {
                            font-size: 1.2rem;
                            font-weight: 600;
                        }
                        p {
                            font-size: 1.1rem;
                            font-weight: 500;
                            text-align: justify;
                        }
                        h2{
                            font-size: 1.1rem;
                            font-weight: 600;
                        }
                        div {
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            padding: .5rem;
                        }
                        a{
                            display: block;
                            background-color: #007E70;
                            width: 6rem;
                            padding: .5rem;
                            border-radius: .5rem;
                            color: white;
                            text-decoration: none;
                            font-weight: 500;
                        }
                    </style>
                </head>

                <body>
                    <h1>Olá $nome, o seu cadastro na feria bosque da paz foi recusado, abaixo está o motivo.</h1>
                    <p>Motivo: $mensagem</p>
                    <span>Atenciosamente Feira Bosque Da Paz!!</span>
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
            'msg' => 'Falha no servidor.'.$th
        ]);
    }
}