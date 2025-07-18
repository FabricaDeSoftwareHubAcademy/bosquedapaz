<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

header('Content-Type: application/json');

require_once('../vendor/autoload.php');
require '../Public/sendEmail.php';

use app\Controller\Expositor;

function gerar_senha($telefone, $nome){

    // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
    return $telefone[2].''.$telefone[3].''.$telefone[4].''.$telefone[5].'@'.$nome[0].''.$nome[1].''.$nome[2].''.$nome[3];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $expositor = new Expositor();
        //////////// PARA APROVAR UM EXPOSITOR \\\\\\\\\\\\\\\\\\\\\\\
        if (isset($_POST['aprovado'])){
            $email = filter_var($_POST['email'], FILTER_UNSAFE_RAW);
            $num_barraca = filter_var($_POST['num_barraca'], FILTER_UNSAFE_RAW);
            $cor_rua = filter_var($_POST['cor_rua'], FILTER_UNSAFE_RAW);

            ///// captura expositor pelo email
            $getExpositor = $expositor->listar('email = "'. $email. '"');
            $nome = $getExpositor[0]['nome'];
            
            $idExpositor = $getExpositor[0]['id_expositor'];
            
            
            ///// verifica se trocou a categoria
            $categoria = isset($_POST['categoria']) ? filter_var($_POST['categoria'], FILTER_UNSAFE_RAW) : $getExpositor[0]['id_categoria'];

            //// gerar senha
            $newSenha = gerar_senha($getExpositor[0]['telefone'], $getExpositor[0]['nome']);
            
            

            $res = $expositor->validarExpositor($idExpositor, 'validado', $categoria, password_hash($newSenha, PASSWORD_DEFAULT), $num_barraca, $cor_rua);
            
            if ($res){
                ///// enviando a senha no email
                $emailService = new EmailService();

                $corpoEmail = "
                    <div style='margin: auto; width: 500px; text-align: center; padding: 1rem; border-radius: .5rem;'>
                        <h2>Olá $nome, o seu cadastro de expositor na feira bosque da paz foi aprovado</h2>
                        <p>Abaixo está a senha para acessar a sua área de expositor e, poder editar seu perfil</p>
                        <h1 style='padding: .5rem; background-color: blue; color: white; margin: 2rem'>SUA SENHA: $newSenha</h1>
                        <span>No caso desse e-mail ser ignorado a senha não vai ser resetada.</span>
                    </div>
                ";

                $enviarEmail = $emailService->enviarEmail($email, $corpoEmail);

                $response = array("msg" => 'Expositor aprovado com sucesso', "status" => 200, $getExpositor);
                echo json_encode($response);

            }else {
                $response = array("msg" => 'Ocorreu um erro ao aprovar o expositor', "status" => 400);
                echo json_encode($response);
            }


        //////////// PARA RECUSAR UM EXPOSITOR \\\\\\\\\\\\\\\\\\\\\\\
        }else if (isset($_POST['recusado'])) {
            $email = filter_var($_POST['email'], FILTER_UNSAFE_RAW);
            $mensagem = filter_var($_POST['mensagem'], FILTER_UNSAFE_RAW);

            $getExpositor = $expositor->listar('email = "'. $email. '"');

            $idExpositor = $getExpositor[0]['id_expositor'];
            $nome = $getExpositor[0]['nome'];

            $res = $expositor->validarExpositor($idExpositor, 'recusado');
            if ($res){
                ///// enviando a senha no email
                $emailService = new EmailService();

                $corpoEmail = "
                    <div style='margin: auto; width: 500px; text-align: center; padding: 1rem; border-radius: .5rem;'>
                        <h2>Olá $nome, o seu cadastro de expositor na feira bosque da paz foi recusado</h2>
                        <p>Motivo: $mensagem</p>
                        <span>Atenciosamente: Feira bosque da paz</span>
                    </div>
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