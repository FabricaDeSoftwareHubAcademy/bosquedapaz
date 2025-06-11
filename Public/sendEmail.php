<?php
namespace app\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

class EmailService {
    public function enviarEmail($email, $codigo) {
        
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Username = 'gui.m.neves.teste@gmail.com';  // Seu e-mail do Gmail
            $mail->Password = 'elpb yivy xjhx qmgm';  // Senha de aplicativo (se a 2FA estiver habilitada)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Usando TLS
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
        
            $mail->setFrom('gui.m.neves.teste@gmail.com', 'Feira bosque da paz');
            $mail->addAddress($email);
            
            $mail->isHTML(true);
            $mail->Subject = 'REDEFINIR SENHA';
            $mail->Body    = "O seu código para redefinir a sua senha é: <b> $codigo</b>";
            $mail->AltBody = "O seu código para redefinir a sua senha é: ". $codigo;
            
            if($mail->send()){
                return "mensagem foi enviada com sucesso";
            }else {
                return "erroa ao enivar a mensagem";
            }
            
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function eviarMSM($nome, $email, $mensagem){
        $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'gui.m.neves.teste@gmail.com';
            $mail->Password = 'elpb yivy xjhx qmgm'; 
            $mail->Port = 587;
    
            $mail->setFrom('gui.m.neves.teste@gmail.com', 'Feira bosque da paz');
            $mail->addAddress($email);
    
            $mail->isHTML(true);
            $mail->Subject = 'FALE CONOSCO';
            $mail->Body = '<strong>Nome: '.$nome. '</strong> <br>E-mail: '.$email. '<br><br>'. $mensagem;
            $mail->AltBody = $nome. 'Enviou uma mensagem'. $mensagem;
    
            if ($mail->send()){
                $response = [
                    'mensage' => 'enviado',
                    'status' => 200
                ];
                return $response;
            }else{
                $response = [
                    'mensage' => 'erro',
                    'status' => 200
                ];
                return $response;
            }
    
            
        } catch (Exception $e) {
            $response = [
                'mensage' => 'erro',
                'status' => 500
            ];
    
            return $response;
        }
    }
    
}
