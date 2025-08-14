<?php 

require '../Public/sendEmail.php';
require '../vendor/autoload.php';

use app\controler\Login;
use app\suport\Csrf;

if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])){
    try {
        $emailService = new EmailService();

        $nome = htmlspecialchars(strip_tags($_POST["nome"]));
        $email = htmlspecialchars(strip_tags($_POST["email"]));
        $mensagem = htmlspecialchars(strip_tags($_POST["mensagem"]));

        $corpoEmail = '
            <!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title></title>
                <style>
                    div {
                        padding: .5rem;
                        width: 40rem;
                    }

                    span {
                        font-weight: 600;
                    }
                    .mensagen {
                        text-align: justify;
                    }
                </style>
            </head>
            <body>
                <div>
                    <p><span>Nome:</span> '.$nome.'</p>
                    <p><span>Email:</span> '.$email.'</p>
                    <p class="mensagen"><span>Mensagem:</span> '.$mensagem.'</p>
                </div>
            </body>
            </html>
        ';

        $enviarEmail = $emailService->enviarEmail('contatofeirabosquedapaz@gmail.com', $corpoEmail, 'Fale conosco');

        $response = array("msg" => 'E-mail enviardo com sucesso.', "status" => 200);
        echo json_encode($response);
    } catch (\Throwable $th) {
        $response = array("msg" => 'Não foi possivel enviar o E-mail.', "status" => 400);
        echo json_encode($response);
    }
}

?>