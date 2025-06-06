<?php
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
}
