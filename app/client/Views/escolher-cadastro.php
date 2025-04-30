<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
    <link rel="stylesheet" href="../../../Public/css/css-home/style-escolher-cadastro.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<!-- Corpo da Tela -->
<body class="body_main">
    <?php include "../../../Public/assets/home/menu-home.html"; ?>

    <!-- Box Principal dos Elementos -->
    <div class="container__box">
        <!-- Lado Esquerdo: Botões -->
        <div class="conteiner__buttons">
            <h1>Escolher Cadastro</h1>
            <!-- Div dos Buttons -->
            <div class="button_group">
            <!-- Botões: -->
                <a href="cadastro-expositor-kids.php" class="button" id="button1">
                    <i class="bi bi-person-plus"></i>
                    <span>Cadstro de Expositor Kids</span>
                </a>

                <a href="cadastro-expositor-client.php" class="button" id="button2">
                    <i class="bi bi-shop-window"></i>
                    <span>Cadastro de Expositor</span>
                </a>

                <a href="cadastro-artista.php" class="button" id="button3">
                    <i class="bi bi-music-note-list"></i>
                    <span>Cadastro de Artista</span>
                </a>
            </div>
            <!-- Seta Voltar -->
            <div class="div__seta_voltar"> <a href="edital-expositor.php"><img src="../../../Public/imgs/img-escolher-cadastro/seta-ec.png" alt=""></div></a>
        </div>

        <!-- Lado Direito: Imagem -->
        <div class="conteiner__img">
            <img src="../../../Public/imgs/img-escolher-cadastro/img-decoracao-principal.svg" alt="">
        </div>
    </div>

    <!-- Imagens Decorativas -->
    <div class="imgs__decorative1"><img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt=""></div>
    <div class="imgs__decorative2"><img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt=""></div>
    <div class="imgs__decorative3"><img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt=""></div>
   
    <script src="../../../Public/js/js-menu/js-menu.js"></script>          
</body>
</html>