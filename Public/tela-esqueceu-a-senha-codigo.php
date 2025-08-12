
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_POST['validar'])) {
    $codigo_informado = $_POST['codigo1'] . $_POST['codigo2'] . $_POST['codigo3'] . $_POST['codigo4'] . $_POST['codigo5'];
    // echo($_SESSION['codigo_recuperacao']);

    if (empty($codigo_informado)) {
        echo "Por favor, insira o código.";
    } elseif ($codigo_informado == $_SESSION['codigo_recuperacao']) {
        // Código correto, direciona para a página de recuperação de senha
        header('Location: ./tela-esqueceu-a-senha-nova-senha.php');
        exit();
    } else {
        echo "Código inválido. Tente novamente.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir de senha</title>
    <link rel="stylesheet" href="../Public/css/css-recuperar-senha/style-esquceu-a-senha-codigo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/icons/folha.ico">
    <script src="./js/js-recuperar-senha/recuperar-senha-codigo.js" defer></script>
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
                <div class="container_input">
                    <input type="text" class="input_codigo" name="codigo1" id="input_1" maxlength="1" required onkeyup="mudaFoco(this, 1, input_2)">
                    <input type="text" class="input_codigo" name="codigo2" id="input_2" maxlength="1" required onkeyup="mudaFoco(this, 1, input_3)">
                    <input type="text" class="input_codigo" name="codigo3" id="input_3" maxlength="1" required onkeyup="mudaFoco(this, 1, input_4)">
                    <input type="text" class="input_codigo" name="codigo4" id="input_4" maxlength="1" required onkeyup="mudaFoco(this, 1, input_5)">
                    <input type="text" class="input_codigo" name="codigo5" id="input_5" maxlength="1" required onkeyup="mudaFoco(this, 1, null)">
                </div>

                <div class="botoes">
                    <a href="../app/Views/Client/tela-login.php" class="botao-cancelar">Cancelar</a>
                    <button type="submit" name="validar" id="abrir-modal recsenha-modal"  class="botao-redefinir open-modal" data-modal="recsenha-modal">Redefinir</button>
                </div>
                    </form>

                    
                    

                    <!-- <dialog id="recsenha-modal" class="recsenha-modal">
                        <div class="modal-recsenha">
                            <div class="modal-recpass">
                                <h1 class="modal-title">Enviado!</h1>
                                <p class="modal-text">Verifique sua caixa de entrada para redefinir sua senha</p>
                                <button id="fechar-modal" class="close-modal" data-modal="recsenha-modal">Fechar</button>
                                 <a href="./tela-esqueceu-a-senha-nova-senha.html" id="fechar-modal" class="close-modal" data-modal="recsenha-modal">Fechar</a>
                            </div>
                        </div>
                    </dialog> -->
                    
                </div>

                <div id="linha-bet-recsenha"></div>

                <img src="assets/message-sent.svg" alt="" class="img-letter">
            </div>
        </section>
    </main>

    <script src="./js/js-modais/js-abrir-modal.js"></script>
</body>
</html>