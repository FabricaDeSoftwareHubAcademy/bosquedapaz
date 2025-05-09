<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-escolher-cadastro.css">
    <title>Bosque da Paz</title>
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <?php include "../../../Public/assets/home/menu-home.html"; ?>
    <!-- inicio da parte principal da pagina -->
    <main class="principal">
        <!-- box principal -->
        <div class="box">
            <div class="seta-ec"><a href="edital-expositor.php"><img src="../../../Public/imgs/img-escolher-cadastro/seta-ec.png" alt=""></a></div>
            
            <div id="linha-vertical-ec"></div>
            <div class="area-infs-ec">
                <h1>Escolher Cadastro</h1>
                <a href="cadastro-expositor-client.php" class="area-total-button" id='button-ec-1'>
                    <div class="icon-input-ec">
                        <i id="icon-ec" class="bi bi-shop-window"></i>
                    </div>
                    <div class="text-input-ec">
                        <p>Cadastro de Expositor</p>
                    </div>
                </a>
                <a href="cadastro-expositor-kids.php" class="area-total-button" id='button-ec-2'>
                    <div class="icon-input-ec">
                        <i id="icon-ec" class="bi bi-person-plus"></i>
                    </div>
                    <div class="text-input-ec">
                        <p id="p-ed-kids">Cadastro de Expositor Kids</p>
                    </div>
                </a>
                <a href="cadastro-artista.php" class="area-total-button" id='button-ec-3'>
                    <div class="icon-input-ec">
                        <i id="icon-ec" class="bi bi-music-note-list"></i>
                    </div>
                    <div class="text-input-ec">
                        <p>Cadastro de Artistas</p>
                    </div>
                </a>
            </div>
            <div class="area-img-ec">
                <img src="../../../Public/imgs/img-escolher-cadastro/img-ec.svg" alt="">
            </div>
        </div>
    </main>
    <!-- bolas de fundo -->
    <div class="bolas-fundo">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>
    <!-- link do JavaScript -->
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-home/main.js" defer></script>
</body>
</html>