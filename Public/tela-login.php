<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/style-tela-login.css">
    <link rel="shortcut icon" href="./assets/icons/folha.ico">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/icons/folha.ico">
    <script src="./js/js-login/login.js" defer></script>

</head>
<body class="body-login">
    <main>
    <?php include './include/modais/login-incorreto.html'; ?>

        <!-- Section Pricipal da Tela -->
        <section class="section-principal-login">
 
            <!-- Imagens -->
            <div class="img-superior-direita">
                <img class="imgg-superior-direita" src="../Public/assets/img-bolas/imagem-superior-direito.svg" alt="">
            </div>
            <div class="img-superior-esquerda">
                <img class="imgg-superior-esquerda" src="../Public/assets/img-bolas/imagem-superior-esquerdo.svg" alt="">
            </div>
            <div class="img-inferior-direita">
                <img class="imgg-inferior-direita" src="../Public/assets/img-bolas/imagem-inferior-direito.svg" alt="">
            </div>
            <div class="img-inferior-esquerda">
                <img class="imgg-inferior-esquerda" src="../Public/assets/img-bolas/imagem-inferior-esquerdo.svg" alt="">
            </div>
            
            <!-- Box Principal -->
            <div class="box-login">
                <div id="linha-login"></div>
                
                <!-- Area Form -->
                <div class="area-form-login">

                    <h1 class="area-img-login-h1-tiago">Login</h1>
                    
                    <form action="./validar_login.php" class="forms-login" method="POST">
 
                        <label>E-mail</label>
                        <div class="area-input-login">
                            <i class="bi bi-envelope"></i>
                            <input class="input-login" type="email" name="email" id="email" placeholder="Digite seu email" required>
                        </div>
 
                        <label>Senha</label>
                        <div class="area-input-login">
                            <i class="bi bi-lock"></i>
                            <input class="input-login" type="password" name="password" id="password" placeholder="Digite sua senha" required>
                        </div>
                    
                        <div class="div-esqueceu-senha-login">
                            <a class="esqueceu-a-senha-p" href="tela-esqueceu-a-senha.php">Esqueceu a senha?</a>
                            <div class="linha-embaixo-recsenha-tiago"></div>
                        </div>
                        
                        <button id="botao-login" data-modal="modal-login" class="botao-login open-modal" type="submit">Login</button>
                    </form>
                   
                </div>
<!-- 
                <?php if (isset($_GET['erro']) && $_GET['erro'] == 1):
                    echo "<script>openModalError();</script>";
                    endif;
                ?> -->


                <a href="../index.php" class="botao-voltar">
                    <img src="assets/icons/voltar.svg" alt="">
                </a>
 
                <!-- Area da Imagem -->
                <img class="img-dog" src="../Public/assets/dog-walking-79-12053-1.svg" alt="">
            </div>
        </section>
    </main>
    
    
    <script src="./js/js-modais/js-modal-deletar.js"></script>
    </body>
</html>