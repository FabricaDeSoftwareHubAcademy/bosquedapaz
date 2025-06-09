<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../app/Controller/Pessoa.php';
use app\Controller\Pessoa;

$email = $_SESSION['email_recuperacao'];

if(isset($_POST['enviar'])){
    $nvSenha = $_POST['nvSenha'];

    if(empty($email)){
        echo "O campo de e-mail não pode estar vazio.";
    }else{
        $pessoa = new Pessoa();
        $pessoa->setEmail($email);
        $pessoa->setNovaSenha($nvSenha);
        $pessoa->novaSenha();
        
        if($pessoa){
            header('Location: ./tela-login.php');
        }else{
            echo "Erro ao atualizar a senha.";
        } 
    }

}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir de senha</title>
    <link rel="stylesheet" href="../Public/css/css-recuperar-senha/style-tela-esqueceu-a-senha-nova-senha.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/icons/folha.ico">
    <script src="js/js-recuperar-senha/recuperar-senha-codigo.js" defer></script>
</head>
<body class="body-recsenha">
    <main>
        <section class="section-recsenha">

            <img class="imgg-superior-direita-recsenha" src="../Public/imgs/imagens-bolas/imagem-superior-direito.svg" alt="">
        
            <img class="imgg-superior-esquerda-recsenha" src="../Public/imgs/imagens-bolas/imagem-superior-esquerdo.svg" alt="">
            
            <img class="imgg-inferior-direita-recsenha" src="../Public/imgs/imagens-bolas/imagem-inferior-direito.svg" alt="">
            
            <img class="imgg-inferior-esquerda-recsenha" src="../Public/imgs/imagens-bolas/imagem-inferior-esquerdo.svg" alt="">
            
            <div class="box-recsenha">
                
                <!-- <a href="tela-login.php" class="volte"><img class="img-voltar" src="../Public/imgs/img-login/arrow-circle-left.svg" alt=""></a> -->
                
                <!-- Form -->
                <div class="form-recsenha">
                    <h1 class="title-recsenha">Redefinição De Senha</h1>
                    
                    <form action="#" method="POST" class="forms-recsenha">
                        <p class="text">Digite o codigo</p>

                        <div class="containerNovaSenha">
                            <label for="" class="lblRecuperar">Insira a nova senha</label>
                            <input id="novaSenha" name="nvSenha"type="password" class="inpRecuperar" placeholder="Nova Senha">
                            <i class="fas fa-eye" id="togglePasswordNv"></i>
                        </div>
                            
                        <div class="containerConfNovaSenha">    
                            <label for="" class="lblRecuperar">Confirme a nova senha</label>
                            <input id="confirmSenha" type="password" class="inpRecuperar" placeholder="Confirme">
                            <i class="fas fa-eye" id="togglePassword"></i>
                        </div>

                        <div class="botoes">
                            <a href="tela-login.php" class="botao-cancelar">Cancelar</a>
                            <button type="submit" name="enviar" id="abrir-modal recsenha-modal" class="botao-redefinir open-modal" data-modal="recsenha-modal">Redefinir</button>
                        </div>
                    </form>

                    
                    

                    <!-- <dialog id="recsenha-modal" class="recsenha-modal">
                        <div class="modal-recsenha">
                            <div class="modal-recpass">
                                <h1 class="modal-title">Enviado!</h1>
                                <p class="modal-text">Verifique sua caixa de entrada para redefinir sua senha</p>
                                <button id="fechar-modal" class="close-modal" data-modal="recsenha-modal">Fechar</button>
                                 <a href="./tela-esqueceu-a-senha-nova-senha.php" id="fechar-modal" class="close-modal" data-modal="recsenha-modal">Fechar</a>
                            </div>
                        </div>
                    </dialog> -->
                    
                </div>

                <div id="linha-bet-recsenha"></div>

                <img src="imgs/img-login/message-sent.svg" alt="" class="img-letter">
            </div>
        </section>
    </main>

    <script src="./js/js-modais/js-abrir-modal.js"></script>
</body>
</html>