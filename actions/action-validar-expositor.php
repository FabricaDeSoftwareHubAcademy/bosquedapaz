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
                <div style='font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif; padding: 25px; background: #ffffff; border: 1px solid #e0e0e0; border-radius: 8px; max-width: 480px; margin: auto; box-shadow: 0 4px 12px rgba(0,0,0,0.05); color: #333333;'>
    <h2 style='color: #FF4612; margin-bottom: 20px; font-weight: 700; font-size: 24px;'>Seu cadastro foi Aprovado!!</h2>
    <p style='font-size: 16px; margin-bottom: 12px;'>Olá, <strong>{$nome}</strong>!</p>
    <p style='font-size: 16px; margin-bottom: 20px;'><strong>Seu email para acesso:</strong> " . $email . "</p>
    <p style='font-size: 16px; margin-bottom: 20px;'><strong>Sua senha para acesso:</strong> " . $newSenha . "</p>
    <p style='font-size: 16px;'>Clique aqui para ser redirecionado para a sua área de acesso:</p>
    <p style='text-align: center; margin: 25px 0;'>
        <a href='https://feirabosquedapaz.com.br/app/Views/Client/tela-login.php' target='_blank' style='display: inline-block; padding: 14px 24px; background-color: #ef233c; color: white; font-size: 18px; font-weight: bold; text-decoration: none; border-radius: 6px;'>Clique Aqui!!</a>
        </p>
        <img src='cid:logoEmpresa' alt='Logo da Empresa' style='max-width: 100%; margin-top: 20px;'>
    <p style='font-size: 12px; color: #888888; text-align: center;'>Feira Bosque da Paz</p>
</div>";

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
                <div style='font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif; padding: 25px; background: #ffffff; border: 1px solid #e0e0e0; border-radius: 8px; max-width: 480px; margin: auto; box-shadow: 0 4px 12px rgba(0,0,0,0.05); color: #333333;'>
    <h2 style='color: #FF4612; margin-bottom: 20px; font-weight: 700; font-size: 24px;'>Seu cadastro foi Recusado!!</h2>
    <p style='font-size: 16px; margin-bottom: 12px;'>Olá, <strong>{$nome}</strong>!</p>
    <p style='font-size: 16px; margin-bottom: 20px;'>" . $mensagem . "</p>
        <img src='cid:logoEmpresa' alt='Logo da Empresa' style='max-width: 100%; margin-top: 20px;'>
    <p style='font-size: 12px; color: #888888; text-align: center;'>Feira Bosque da Paz</p>
</div>";


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