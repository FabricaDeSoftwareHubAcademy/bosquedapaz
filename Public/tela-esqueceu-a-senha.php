<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prévia Tela Esqueceu a Senha</title>
    <link rel="stylesheet" href="../Public/css/esqueceu-a-senha-recsenha.css">
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

                <div id="linha-bet-recsenha"></div>
                <div class="area-recsenha">
                    <div class="center-recsenha">
                        <div class="div-text-recsenha">
                            <P class="text-rec">Digite seu email abaixo para redefinir sua senha</P>
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
                    <a href="tela-login.php" class="volte">
                        <img class="img-circle" src="../Public/imgs/img-login/arrow-circle-left.svg" alt="">
                    </a>
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

</html>