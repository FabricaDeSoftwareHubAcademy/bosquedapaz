<?php
require_once('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('../vendor/phpmailer/phpmailer/src/SMTP.php');
require_once('../vendor/phpmailer/phpmailer/src/Exception.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(!isset($_POST['enviar'])){
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'gui.m.neves.teste@gmail.com';
        $mail->Password = 'elpb yivy xjhx qmgm'; 
        $mail->Port = 587;

        $mail->setFrom('gui.m.neves.teste@gmail.com');
        $mail->addAddress('halysondasilvadosreis@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'FALE CONOSCO';
        $mail->Body = '<strong>Nome: '.$_POST['nome']. '</strong> <br>E-mail: '.$_POST['email']. '<br><br>'. $_POST['mensagem'];
        $mail->AltBody = $_POST['nome']. 'Enviou uma mensagem'. $_POST['mensagem'];

        if ($mail->send()){
            $response = [
                'mensage' => 'E-mail enviado com sucesso.',
                'status' => 200
            ];
            echo json_encode($response);
        }else{
            $response = [
                'mensage' => 'Erro ao enviar o E-mail.',
                'status' => 200
            ];
            echo json_encode($response);
        }

        
    } catch (Exception $e) {
        $response = [
            'mensage' => 'Não foi possivel enviar seu E-mail.',
            'status' => 500
        ];

        echo json_encode($response);
    }
}

?>