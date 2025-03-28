<!-- <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prévia Tela Esqueceu a Senha</title>
    <link rel="stylesheet" href="../Public/css/style-esqueceu-a-senha-recsenha.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="body-recsenha">
    <main>
        <section class="section-recsenha">

            <div class="img-superior-direita-recsenha">
                <img class="imgg-superior-direita-recsenha" src="../Public/imgs/imagens-bolas/imagem-superior-direito.svg" alt="">
            </div>
            <div class="img-superior-esquerda-recsenha">
                <img class="imgg-superior-esquerda-recsenha" src="../Public/imgs/imagens-bolas/imagem-superior-esquerdo.svg" alt="">
            </div>
            <div class="img-inferior-direita-recsenha">
                <img class="imgg-inferior-direita-recsenha" src="../Public/imgs/imagens-bolas/imagem-inferior-direito.svg" alt="">
            </div>
            <div class="img-inferior-esquerda-recsenha">
                <img class="imgg-inferior-esquerda-recsenha" src="../Public/imgs/imagens-bolas/imagem-inferior-esquerdo.svg" alt="">
            </div>
 
            <div class="box-recsenha">
                <div id="linha-bet-recsenha"></div>
                 
                <div class="botao-voltar">
                    <a href="tela-login.php" class="volte">
                        <img src="../Public/imgs/img-login/arrow-circle-left.svg" alt="">
                    </a>
                </div>

                <div class="area-recsenha">
                    <div class="center-recsenha">
                        <div class="div-redefinicao">
                            <p>REDEFINIÇÃO DE SENHA</p>
                        </div>
                        <div class="div-text-recsenha">
                            <P>Digite seu email abaixo para redefinir sua senha</P>
                        </div>
                        <form action="#" class="form-recsenha">
                            <label class="text-endereco-email">Endereço de e-mail:</label>
                            <div class="area-input-recsenha">
                                <i class="bi bi-envelope"></i>
                                <input class="input-recsenha" type="email" name="email" id="email" placeholder="Digite seu email" required>
                            </div>
                        </form>
                    </div>
                    <div class="div-botoes-recsenha">
                        <div class="div-botao-cancelar-recsenha">
                            <a class="botao-cancelar-recsenha" href="tela-login.php">Cancelar</a>
                        </div>
                        <div class="div-botao-enviar-recsenha">
                            <button class="botao-enviar-recsenha open-modal" data-modal="modal-recsenha">Enviar</button>
                        </div>
                    </div>
                </div>
                <div class="area-img-recsenha">
                    <h1 class="text-h1-recsenha">REDEFINIÇÃO DE SENHA</h1>
 
                    <div class="img-recsenha">
                        <img class="img-recsenha-svg-recsenha" src="../Public/imgs/img-login/message-sent.svg" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html> -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de senha</title>
    <link rel="stylesheet" href="../Public/css/style-esqueceu-a-senha-recsenha.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
                    
                    <form action="#" class="forms-recsenha">
                        <p class="text">Digite seu email abaixo para redefinir sua senha</p>
                        <label class="label-email">Email</label>
                        <div class="area-input-recsenha">
                            <i class="bi bi-envelope"></i>
                            <input class="input-recsenha" type="email" name="email" id="email" placeholder="Digite seu email" required>
                        </div>
                    </form>

                    
                    
                    <div class="botoes">
                        <a href="tela-login.php" class="botao-cancelar">Cancelar</a>
                        <button id="abrir-modal recsenha-modal"  class="botao-redefinir open-modal" data-modal="recsenha-modal">Redefinir</button>
                    </div>

                    <dialog id="recsenha-modal" class="recsenha-modal">
                        <div class="modal-recsenha">
                            <div class="modal-recpass">
                                <h1 class="modal-title">Enviado!</h1>
                                <p class="modal-text">Verifique sua caixa de entrada para redefinir sua senha</p>
                                <button id="fechar-modal" class="close-modal" data-modal="recsenha-modal">Fechar</button>
                            </div>
                        </div>
                    </dialog>
                    
                </div>

                <div id="linha-bet-recsenha"></div>

                <img src="imgs/img-login/message-sent.svg" alt="" class="img-letter">
            </div>
        </section>
    </main>

    <script src="./js/js-modais/js-abrir-modal.js"></script>
</body>
</html>