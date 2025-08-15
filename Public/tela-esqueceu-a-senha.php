
<?php


session_start();
require './sendEmail.php';
require_once '../app/Controller/Pessoa.php';
use app\Controller\Pessoa;

if (isset($_POST['enviar'])) {
    $email = htmlspecialchars(strip_tags($_POST['email']));
    

if (empty($email)) {
    echo "<script>alert('O campo de e-mail não pode estar vazio.'); window.history.back();</script>";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('E-mail inválido.'); window.history.back();</script>";
    exit;
}


$verificarEmail = new Pessoa();
$verificarEmail->setEmail($email);
$emailExiste = $verificarEmail->verificar_email();

if (!$emailExiste) {
    echo "<script>
        alert('Email não encontrado.');
        window.location.href = './tela-esqueceu-a-senha.php';
    </script>";
    exit;
} else {
    $codigo = rand(10000, 99999);
    $_SESSION['codigo_recuperacao'] = $codigo;
    $_SESSION['email_recuperacao'] = $email;

    $emailService = new EmailService();
    $mensagem = $emailService->recoverSenha($email, $codigo);

    header('Location: ./tela-esqueceu-a-senha-codigo.php');
    exit; 
}

}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir de senha</title>
    <link rel="stylesheet" href="../Public/css/style-esqueceu-a-senha-recsenha.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/icons/folha.ico">
    <script src="./js/js-recuperar-senha/recuperar-senha-email.js" defer></script>

</head>
<body class="body-recsenha">
<?php include './include/modais/modal_carregando.html'; ?>

    <main>
        <section class="section-recsenha">

        <img class="imgg-superior-direita-recsenha" src="../Public/assets/img-bolas/imagem-superior-direito.svg" alt="">
        
        <img class="imgg-superior-esquerda-recsenha" src="../Public/assets/img-bolas/imagem-superior-esquerdo.svg" alt="">
        
        <img class="imgg-inferior-direita-recsenha" src="../Public/assets/img-bolas/imagem-inferior-direito.svg" alt="">
        
        <img class="imgg-inferior-esquerda-recsenha" src="../Public/assets/img-bolas/imagem-inferior-esquerdo.svg" alt="">
            
            <div class="box-recsenha">
                
                <!-- <a href="tela-login.php" class="volte"><img class="img-voltar" src="../Public/imgs/img-login/arrow-circle-left.svg" alt=""></a> -->
                
                <!-- Form -->
                <div class="form-recsenha">
                    <h1 class="title-recsenha">Redefinição De Senha</h1>
                    
                    <form action="#" method="POST" class="forms-recsenha">
                        <p class="text">Digite seu email abaixo para redefinir sua senha</p>
                        <div class="containerLabel">
                            <label class="label-email">Email</label>
                        </div>
                        <div class="area-input-recsenha">
                            <i class="bi bi-envelope"></i>
                            <input class="input-recsenha" type="email" name="email" id="email" placeholder="Digite seu email" required>
                        </div>

                        <div class="botoes">
                            <a href="../app/Views/Client/tela-login.php" class="botao-cancelar">Cancelar</a>
                            <button type="submit" name="enviar" id="abrir-modal recsenha-modal" class="botao-redefinir open-modal" data-modal="recsenha-modal">Redefinir</button>
                        </div>

                    </form>

                    
                    

                    <!-- <dialog id="recsenha-modal" class="recsenha-modal">
                        <div class="modal-recsenha">
                            <div class="modal-recpass">
                                <h1 class="modal-title">Enviado!</h1>
                                <p class="modal-text">Verifique sua caixa de entrada para redefinir sua senha</p>
                                <button id="fechar-modal" class="close-modal" data-modal="recsenha-modal">Fechar</button>
                                 <a href="./tela-esqueceu-a-senha-codigo.php" id="fechar-modal" class="close-modal" data-modal="recsenha-modal">Fechar</a>
                            </div>
                        </div>
                    </dialog> -->
                    
                </div>

                <div id="linha-bet-recsenha"></div>

                <img src="assets/message-sent.svg" alt="" class="img-letter">
            </div>
        </section>
    </main>

    <!-- <script src="./js/js-modais/js-abrir-modal.js"></script> -->
    <script src="./js/js-modais/js-modal-carregar.js"></script>
</body>
</html>