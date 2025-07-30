<?php 

require '../Public/sendEmail.php';
require '../vendor/autoload.php';

use app\controler\Login;
use app\suport\Csrf;

if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])){
    try {
        $emailService = new EmailService();

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $mensagem = $_POST["mensagem"];

        $corpoEmail = "
            <div style='margin: auto; width: 500px; box-shadow: 0px 0px 10px rgba(0,0,0.5); padding: 1rem; border-radius: .5rem;'>
                <span>Nome: $nome</span>
                <br>
                <span>Email: $email</span>
                <br>
                <p>Mensagem: $mensagem</p>
            </div>
        ";

        $enviarEmail = $emailService->enviarEmail('gui.m.neves.teste@gmail.com', $corpoEmail, 'Fale conosco');

        $response = array("msg" => 'E-mail enviardo com sucesso.', "status" => 200);
        echo json_encode($response);
    } catch (\Throwable $th) {
        $response = array("msg" => 'Não foi possivel enviar o E-mail.', "status" => 400);
        echo json_encode($response);
    }
}

?>