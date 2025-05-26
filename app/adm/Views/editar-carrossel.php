<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- link com style padrao da pagina adm -->
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-editar-carrossel.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>

<body>
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>

    <!-- inicio da parte principal da pagina -->
    <main class="principal">
        <!-- box principal -->
        <div class="box">
            <form action="" method="post" class="formulario" id="form-carrossel" enctype='multipart/form-data'>
                <h1 class="titulo">editar carrosel</h1>
            
                <!-- local de uploads de imgs para o carrossel -->
                <section class="conteiner-imagens">

                    <div class="content-imagem">
                        <h2 class="num">Imagem 1</h2>
                        <span class="tamanho_img">Tamanho permitido: 1920 x 1080 pixels</span>
                        <label class="uploads" id="label">
                            <input type="file" name="img1" id="imagens-input" class="input" id="input1">
                
                            <img src="" alt="" id="img1" class="imagem">
                
                            <i class="fa-solid fa-pen editar"></i>
                        </label>
                    </div>
                
                    <div class="content-imagem">
                        <h2 class="num">Imagem 2</h2>
                        <span class="tamanho_img">Tamanho permitido: 1920 x 1080 pixels</span>
                        <label class="uploads" id="label">
                            <input type="file" name="img2" id="imagens-input2" class="input" id="input2">
                
                            <img src="" alt="" id="img2" class="imagem">
                
                            <i class="fa-solid fa-pen editar"></i>
                        </label>
                    </div>
                
                    <div class="content-imagem">
                        <h2 class="num">Imagem 3</h2>
                        <span class="tamanho_img">Tamanho permitido: 1920 x 1080 pixels</span>
                        <label class="uploads" id="label">
                            <input type="file" name="img3" id="imagens-input3" class="input" id="input3">
                
                            <img src="" alt="" id="img3" class="imagem">
                
                            <i class="fa-solid fa-pen editar"></i>

                        </label>
                    </div>
                </section>

                <!-- botoes parte de baixo -->
                <div class="btns">
                    <a href="Area-Adm.php" class="voltar">
                        <img src="../../../Public/imgs/img-cadastro-carrosel/btn-voltar.png" alt="" class="btn-voltar">
                    </a>
                    <div class="btn-cancelar-salvar">
                            <button type="reset" class="btn btn-cancelar">
                                cancelar
                            </button>
                            
                            <button type="submit" name="editar" id="editar" class="btn btn-salvar">
                                salvar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <!-- bolas de fundo -->
    <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="" class="bola-verde1">
    <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="" class="bola-verde2">
    <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="" class="bola-rosa">


    <!-- link do JavaScript -->
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/js-editar-carrossel.js"></script>
</body>

</html>
