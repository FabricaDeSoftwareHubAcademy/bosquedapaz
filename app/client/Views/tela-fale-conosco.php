<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- --> <!-- --> <!-- -->
    <title>Suporte e Contato</title>
    <link rel="stylesheet" href="../../../Public/css/css-home/style-fale-conosco.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <!--  --> <!-- --> <!-- -->
</head>

<body class="body__faleconosco">
    <?php include "../../../Public/assets/home/menu-home.html"; ?>
    <div class="container__faleconosco">
        <!-- Lado direito -->
        <div class="section__suporte">
            <h1 class="suporte__titulo">Fale Conosco</h1>
            <h1 class="suporte__subtitulo">Contate nossa equipe em casos de sugestões, duvidas, reclamações ou problemas.</h1>
            <div class="suporte__box__formulario">
                <form method="" action="" class="suporte__content__formulario">
                    <div class="suporte__input__group">
                        <label>Nome</label>
                        <input type="text" name="campo-nome" id="campo_nome" class="campo__nome" placeholder="Digite seu nome">
                    </div>
                    <div class="suporte__input__group">
                        <label>Email</label>
                        <input type="email" name="campo-email" id="campo_email" class="campo__email" placeholder="exemplo@hotmail.com">
                    </div>
                    <div class="suporte__textarea__group">
                        <label>Mensagem</label>
                        <textarea name="campo-mensagem" id="campo_mensagem" class="campo__mensagem" placeholder="Escreva sua mensagem"></textarea>
                    </div>
                    <button type="submit" name="botao-enviar" id="botao_enviar" class="botao__enviar">Enviar</button>
                </form>
            </div>
        </div>
        <!-- Lado direito -->
        <!-- Separação -->
        <div class="section__divisao">
            <div class="linha"></div>
            <img src="../../../Public/imgs/imgs-fale-conosco/img-boneco.png" alt="" class="imagem-boneco">
            <div class="linha"></div>
        </div>
        <!-- Separação -->
        <!-- Lado esquerdo -->
        <div class="section__contatos">
            <h1 class="contatos__titulo">Você também pode entrar em contato conosco através<br>de nossos outros meios de comunicação.</h1>
            <div class="section__box__contatos">
                <div class="contato__email">
                    <img src="../../../Public/imgs/imgs-fale-conosco/img-email.png" alt="">
                    <h1><a href="mailto:contato@feirabosque.com.br">contato@feirabosque.com.br</a></h1>
                </div>
                <div class="contato__telefone">
                    <img src="../../../Public/imgs/imgs-fale-conosco/img-telefone.png" alt="">
                    <h1>(67)4002-9822</h1>
                </div>
                <div class="contato__localizacao">
                    <img src="../../../Public/imgs/imgs-fale-conosco/img-localizacao.png" alt="">
                    <h1><a href="https://www.google.com/maps/place/R.+Kame+Takaiassu,+500+-+Carand%C3%A1+Bosque,+Campo+Grande+-+MS,+79032-290/@-20.4414258,-54.5750927,17z/data=!4m6!3m5!1s0x9486e8fa46b35bf1:0x4692d06d51800aa7!8m2!3d-20.4420265!4d-54.5745459!16s%2Fg%2F11bw3hvfwk?entry=ttu&g_ep=EgoyMDI1MDQyMy4wIKXMDSoASAFQAw%3D%3D">R. Kame Takaiassu, 500 - Carandá Bosque, Campo Grande - MS</a></h1>
                </div>
            </div>
        </div>
        <!-- Lado esquerdo -->
    </div>

    <div class="faleconosco__botao__voltar">
        <a href="../../../index.php"><img src="../../../Public/imgs/imgs-fale-conosco/faleconosco-voltar.png" alt=""></a>
    </div>

    <div class="faleconosco__decoracao">
        <img src="../../../Public/imgs/imgs-fale-conosco/faleconosco-decoracao1.png" alt="" class="faleconosco__bola1">
        <img src="../../../Public/imgs/imgs-fale-conosco/faleconosco-decoracao2.png" alt="" class="faleconosco__bola2">
        <img src="../../../Public/imgs/imgs-fale-conosco/faleconosco-decoracao3.png" alt="" class="faleconosco__bola3">
    </div>

    <script src="../../../Public/js/js-home/main.js"></script>
</body>
</html>