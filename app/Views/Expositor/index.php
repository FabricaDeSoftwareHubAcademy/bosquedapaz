<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expositor - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="stylesheet" href="../../../Public/css/css-adm/Area-Adm.css">
    <link rel="icon" href="../../imgs/img-home/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <!-- Menu -->
    <?php include "../../../Public/include/home/menu-expositor.html" ?>

    <!-- Área Principal da Página -->
    <main class="container__main">
        <!-- Box dos Componentes -->
        <div class="container__box">
            <!-- área do titulo -->
            <div class="container__title">
                <h1>Área Do Expositor</h1>
            </div>
            <!-- área dos botões -->
            <div class="container__action__tile">
                <a id="action__carrossel" href="./edicao-perfil-expositor.php">
                    <div class="action__title">
                        <div class="action__content">
                            <img src="../../../Public/assets/icons/Gerenciar ADM.png" alt="">
                            <p>Perfil</p>
                        </div>
                    </div>
                </a>

                <a id="action__carrossel" href="./listar-boletos.php">
                    <div class="action__title">
                        <div class="action__content">
                            <img src="../../../Public/assets/icons/Vector Relatorio.png" alt="">
                            <p>Meus Boletos</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>

    <!-- Imagens Decorativas  -->
    <div class="decorative__img1"><img src="../../../Public/assets/img-bolas/imagem-superior-esquerdo.svg" alt=""></div>
    <div class="decorative__img2"><img src="../../../Public/assets/img-bolas/imagem-superior-direito.svg" alt=""></div>
    <div class="decorative__img3"><img src="../../../Public/assets/img-bolas/imagem-inferior-direito.svg" alt=""></div>

    <!-- Scripts JS  -->
    <script src="../../../Public/js/js-menu/js-menu-expositor.js"></script>
    <script src="../../../Public/js/js-adm/varifica_login_expositor.js"></script>
</body>
</html>

<!-- Matheus Manja -->