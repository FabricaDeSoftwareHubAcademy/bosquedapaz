<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

class EmailService {
    public function recoverSenha($email, $codigo) {
        
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
            $mail->Body    = "
                            <div style='margin: auto; width: 500px; text-align: center; padding: 1rem; border-radius: .5rem;'>
                                <h2>Código de recuperação</h2>
                                <p>Abaixo está o código para recuperar a sua senha</p>
                                <h1 style='padding: .5rem; background-color: blue; color: white; margin: 2rem'>SEU CÓDIGO: $codigo</h1>
                                <span>No caso desse e-mail ser ignorado a senha não vai ser resetada.</span>
                            </div>
                            ";
            $mail->AltBody = "O seu código para redefinir a sua senha é: ". $codigo;
            
            if($mail->send()){
                return "mensagem foi enviada com sucesso";
            }else {
                return "erro ao enivar a mensagem";
            }
            
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function enviarEmail($email, $corpoEmail, $subject = 'Feira bosque da paz'){
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
            $mail->Subject = $subject;
            $mail->Body    = $corpoEmail;
            $mail->AltBody = $corpoEmail;
            
            if($mail->send()){
                return "mensagem foi enviada com sucesso";
            }else {
                return "erro ao enivar a mensagem";
            }
            
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
