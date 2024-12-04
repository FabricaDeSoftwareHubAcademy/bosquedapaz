<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carrossel</title>
    <!-- link com style padrao da pagina adm -->
    <link rel="stylesheet" href="../../css/css-adm/editar-carrossel.css">
</head>
<body>
    <?php include "../../assets/adm/menu-adm.html"?>

    <!-- inicio da parte principal da pagina -->
    <main class="principal">

        <!-- box principal -->
        <div class="box">
            
            <h1 class="titulo">EDITAR CARROSSEL</h1>

            <!-- local de uploads de imgs para o carrossel -->
            <section class="up-imgs">

                <div class="uploads">

                    <div class="up">
                        <img src="../../imgs/img-cadastro-carrosel/img-carrosel-1.png" alt="Imagem do carrossel 1" class="up-img">
                    </div>

                    <button class="btn-editar">
                        <img src="../../imgs/img-cadastro-carrosel/img-pe.png" alt="imagem de laipiz" class="editar">
                    </button>
                </div>

                <div class="uploads">

                    <div class="up">
                        <img src="../../imgs/img-cadastro-carrosel/img-carrossel-2.png" alt="Imagem do carrossel 2" class="up-img">
                    </div>

                    <button class="btn-editar">
                        <img src="../../imgs/img-cadastro-carrosel/img-pe.png" alt="imagem de laipiz" class="editar">
                    </button>
                </div>

                <div class="uploads">

                    <div class="up">
                        <img src="../../imgs/img-cadastro-carrosel/img-carrossel-3.png" alt="Imagem do carrossel 3" class="up-img">
                    </div>

                    <button class="btn-editar">
                        <img src="../../imgs/img-cadastro-carrosel/img-pe.png" alt="imagem de laipiz" class="editar">
                    </button>
                </div>
            </section>

            <!-- botoes parte de baixo -->
            <div class="btns">
                <a href="" class="voltar">
                    <img src="../../imgs/img-cadastro-carrosel/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>

                <div class="btn-cancelar-salvar">
                        <button class="btn btn-cancelar">
                            <a href="">Cancelar</a>
                        </button>
                    
                        <button class="btn btn-salvar">
                            <a href="">Salvar</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- bolas de fundo -->
    <div class="bolas-fundo">
        <img src="../../imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <!-- link do JavaScript -->
    <script src="../../js/js-menu/js-menu.js"></script>
</body>
</html>