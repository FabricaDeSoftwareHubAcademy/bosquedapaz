<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/style-tela-login.css">
    <link rel="shortcut icon" href="./assets/icons/folha.ico">
    <title>Bosque da Paz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="body-login">
    <main>
        <!-- Section Pricipal da Tela -->
        <section class="section-principal-login">
 
            <!-- Imagens -->
            <div class="img-superior-direita">
                <img class="imgg-superior-direita" src="../Public/imgs/imagens-bolas/imagem-superior-direito.svg" alt="">
            </div>
            <div class="img-superior-esquerda">
                <img class="imgg-superior-esquerda" src="../Public/imgs/imagens-bolas/imagem-superior-esquerdo.svg" alt="">
            </div>
            <div class="img-inferior-direita">
                <img class="imgg-inferior-direita" src="../Public/imgs/imagens-bolas/imagem-inferior-direito.svg" alt="">
            </div>
            <div class="img-inferior-esquerda">
                <img class="imgg-inferior-esquerda" src="../Public/imgs/imagens-bolas/imagem-inferior-esquerdo.svg" alt="">
            </div>
            
            <!-- Box Principal -->
            <div class="box-login">
                <div id="linha-login"></div>
                
                <div class="botao-voltar">
                    <a href="../index.php" class="volte">
                        <img src="../Public/imgs/img-login/arrow-circle-left.svg" alt="">
                    </a>
                </div>
                
                <!-- Area Form -->
                <div class="area-form-login">

                    <h1 class="area-img-login-h1-tiago">Login</h1>
                    
                    <form action="#" class="forms-login">
 
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
                    </form>
 
                    <div class="div-esqueceu-senha-login">
                        <a class="esqueceu-a-senha-p" href="tela-esqueceu-a-senha.php">Esqueceu a senha?</a>
                        <div class="linha-embaixo-recsenha-tiago"></div>
                    </div>
                   
                    <a class="botao-login" href="../app/adm/Views/Area-Adm.php">Login</a>
                   
                </div>
               
 
                <!-- Area da Imagem -->
                <img class="img-dog" src="../Public/imgs/img-login/dog-walking-79-12053-1.svg" alt="">
            </div>
        </section>
    </main>
   
</body>
</html>