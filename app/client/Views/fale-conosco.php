
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/faleconosco.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >

</head>
<body>
    <?php include "../../../Public/assets/home/menu-home.html"?>
    <div class="box-guilherme">
        <section class="secao-formulario-guilherme">
            <h1 class="titulo-formulario-guilherme">Fale Conosco!</h1>

            <div class="area-formulario-guilherme">
                <form class="formulario-guilherme">
                    <label>Nome completo</label>
                    <input type="text" name="campo1" id="campo-1" placeholder="Digite seu nome completo" required>

                    <label>E-mail</label>
                    <input type="email" name="campo2" id="campo-2" placeholder="exemplo@gmail.com" required>

                    <label>Mensagem</label>
                    <textarea name="campo3" class="campo-3-guilherme" placeholder="Digite aqui sua mensagem." required></textarea>
                    
                    <button class="botao-enviar-guilherme">Enviar</button>
                </form>
            </div>
        </section>

        <section class="secao-informacoes-guilherme">
            <div class="informacao-introducao-guilherme">
                <div class="fundo-guilherme">
                    <img src="../../../Public/imgs/img-area-contate/boneco-contate.png" alt="boneco" class="imagem-boneco-guilherme">
                </div>
                <h1 class="msg-guilherme">Possui dúvidas, reclamações, sugestões ou problemas? Entre em contato com nossa equipe preenchendo o formulário</h1>
            </div>

            <div class="informacao-contatos-guilherme">
                <div class="informacao-titulo-guilherme">
                    <h1>OUTROS MEIOS DE CONTATO</h1>
                </div>
                <div class="contatos-guilherme">
                    <h1 class="contato-guilherme telefone"><strong>TELEFONE: </strong>(67) 4002-9822.</h1>
                    <h1 class="contato-guilherme email"><strong>E-MAIL: </strong><a href="https://outlook.live.com">contato@feirabosque.com.br</a></h1>
                    <h1 class="contato-guilherme localizacao"><strong>LOCALIZAÇÃO: </strong> R. Kame Takaiassu, Carandá Bosque, MS.</h1>
                </div>
            </div>
        </section>
    </div>

    <div class="decoracoes-guilherme">
        <a href="../../../index.php"><img src="../../../Public/imgs/img-area-contate/seta-voltar.png" alt="btnVoltar" class="botao-voltar-guilherme"></a>
        <img src="../../../Public/imgs/imagens-bolas/azul-sem-fundo1.png" alt="deco1" class="decoracao1-guilherme">
        <img src="../../../Public/imgs/imagens-bolas/azul-sem-fundo2.png" alt="deco2" class="decoracao2-guilherme">
        <img src="../../../Public/imgs/imagens-bolas/azul-sem-fundo3.png" alt="deco3" class="decoracao3-guilherme">
    </div>

    <script src="../../../Public/js/js-home/main.js"></script>
</body>
</html>