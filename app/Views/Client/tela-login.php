<?php 
include '../../helpers/csrf.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/style-tela-login.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../../../Public/js/js-home/login.js" defer></script>
</head>
<body class="body-login">
    <!-- <main> -->

        <!-- Section Pricipal da Tela -->
        <!-- <section class="section-principal-login"> -->

            <!-- Imagens -->
            
            <img class="img-superior-direita" src="../../../Public/assets/img-bolas/imagem-superior-direito.svg" alt="">
                    
            <img class="img-superior-esquerda" src="../../../Public/assets/img-bolas/imagem-superior-esquerdo.svg" alt="">
                    
            <img class="img-inferior-direita" src="../../../Public/assets/img-bolas/imagem-inferior-direito.svg" alt="">
                    
            <img class="img-inferior-esquerda" src="../../../Public/assets/img-bolas/imagem-inferior-esquerdo.svg" alt="">
                    
            <!-- Box Principal -->
            <div class="box-login">
                
                <!-- Area Form -->
                <div class="area-form-login">

                    <h1 class="area-img-login-h1-tiago">Login</h1>
                    
                    <form action="" class="forms-login" id="formLogin" method="POST">

                        <label>E-mail</label>
                        <div class="area-input-login">
                            <i class="bi bi-envelope"></i>
                            <input class="input-login" type="email" name="email" id="email" placeholder="Digite seu email" required>
                        </div>

                        <label>Senha</label>
                        <div class="area-input-login">
                            <i class="bi bi-lock"></i>
                            <input class="input-login" type="password" name="senha" id="password" placeholder="Digite sua senha" required>
                            <i class="fa-solid fa-eye" id="togglePassword"></i>
                        </div>
                    
                        <div class="div-esqueceu-senha-login">
                            <a class="esqueceu-a-senha-p" href="../../../Public/tela-esqueceu-a-senha.php">Esqueceu a senha?</a>
                            <div class="linha-embaixo-recsenha-tiago"></div>
                        </div>

                        <?php echo getTolkenCsrf(); ?>
                        
                        <button id="botao-login" data-modal="modal-login" class="botao-login open-modal" type="submit">Login</button>
                    </form>

                    <a href="./index.php" class="botao-voltar">
                        <img src="../../../Public/assets/icons/voltar.svg" alt="">
                    </a>
                
                </div>
                <div id="linha-login"></div>

                <!-- Area da Imagem -->
                <img class="img-dog" src="../../../Public/assets/dog-walking-79-12053-1.svg" alt="">
            </div>

            <?php include "../../../Public/include/modais/modal-error.html"; ?>
        <!-- </section> -->
    <!-- </main> -->
    </body>
</html>