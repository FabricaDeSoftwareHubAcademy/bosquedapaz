<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Carrossel</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- link com style padrao da pagina adm -->
    <link rel="stylesheet" href="../../css/css-adm/cadastro-carrossel.css">
    <!-- <link rel="stylesheet" href="../../css/menu-adm.css"> -->
</head>
<body>
    <?php include "../../assets/menu.html"?>

    <!-- inicio da parte principal da pagina -->
    <main class="principal">
        
        <!-- box principal -->
        <div class="box">
            
            <h1 class="titulo">CADASTRAR CARROSSEL</h1>

            <!-- local de uploads de imgs para o carrossel -->
            <section class="up-imgs">

                <div class="uploads">

                    <div class="up">
                        <i class="fa-solid fa-upload up-img"></i>
                    </div>

                    <button class="btn-editar">
                        <img src="../../imgs/img-cadastro-carrosel/img-pe.png" alt="imagem de laipiz" class="editar">
                    </button>
                </div>

                <div class="uploads">

                    <div class="up">
                        <i class="fa-solid fa-upload up-img"></i>
                    </div>

                    <button class="btn-editar">
                        <img src="../../imgs/img-cadastro-carrosel/img-pe.png" alt="imagem de laipiz" class="editar">
                    </button>
                </div>

                <div class="uploads">

                    <div class="up">
                        <i class="fa-solid fa-upload up-img"></i>
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