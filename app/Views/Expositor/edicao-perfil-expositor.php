<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-edicao-perfil-expositor.css">
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <title>Expositor - Bosque da Paz</title>
</head>
<body>
    <!-- Include Menu de Navegação -->
    <?php include "../../../Public/include/home/menu-expositor.html" ?>
    <!-- Corpo da Pagina -->
    <main class="container__main">
        <!-- Box Principal -->
        <div class="box__container">
            <!-- Linha Decorativa  -->
            <div class="linha__decorativa"></div>
            <!-- Form -->
            <form class="form" action="salvar_perfil.php" method="POST" enctype="multipart/form-data">
                <!-- Lado Esquerdo -->
                <div class="lado__esquerdo">
                    <!-- Upload da Logo -->
                    <div class="container__logo">
                        <label for="logo" class="uploads" id="logo_expositor">
                            
                        </label>
                    </div>
                    <!-- Area texto produto -->
                    <div class="text__produtos">
                        <h2>Produtos</h2>
                    </div>
                    <!-- Upload de Fotos dos Produtos -->
                    <div class="container__imgs">
                        <!-- Area das Imagens -->
                        <div class="galeria__imagens" id="content_imgs">
                            
                        </div>
                    </div>
                </div>
                <!-- Lado Direito: Informações do Expositor -->
                <div class="lado__direito">
                    <!-- Título -->
                    <div class="area__h1">
                        <h1>Perfil Expositor</h1>
                    </div>

                    <!-- Sobre o Expositor -->
                    <div class="area__text">
                        <h2 class="title" id="nome_marca">Play Artesanato</h2>
                        <label for="descricao" class="sobre">Sobre a Empresa</label>
                        <textarea name="descricao" id="descricao" class="input__text" placeholder="" disabled></textarea>
                    </div>

                    <!-- Informações da Barraca -->
                    <div class="area__cat__num">
                        <div class="cat">
                            <h3>Categoria</h3>
                            <p class="p__cat" id="categoria">Artesanato</p>
                        </div>
                        <div class="num">
                            <h3>Número</h3>
                            <p class="pp" id="num_rua">89</p>
                        </div>
                        <div class="area__cor">
                            <h3>Cor da Rua</h3>
                            <div class="cor__rua" id="area_cor_rua"><p id="cor_rua"></p></div>
                        </div>
                    </div>
                    <!-- Contatos -->
                    <div class="area__inf__corR">
                        <h3 class="h3__infs__pessoais">Informações de Contato</h3>
                        <div class="area__total__form">
                            <div class="area__inputs">
                                <label for="insta">Link Instagram:</label>
                                <div class="input__container">
                                    <i class="bi bi-instagram"></i>
                                    <input class="input" type="text" name="insta" id="insta" placeholder="" disabled>
                                </div>
                            </div>

                            <div class="area__inputs">
                                <label for="whatsapp">Link WhatsApp:</label>
                                <div class="input__container">
                                    <i class="bi bi-whatsapp"></i>
                                    <input class="input" type="text" name="whatsapp" id="whatsapp" placeholder="" disabled>
                                </div>
                            </div>

                            <div class="area__inputs">
                                <label for="facebook">Link Facebook:</label>
                                <div class="input__container">
                                    <i class="bi bi-facebook"></i>
                                    <input class="input" type="text" name="facebook" id="facebook" placeholder="" disabled>
                                </div>
                            </div>

                            <div class="area__inputs">
                                <label for="email">E-mail:</label>
                                <div class="input__container">
                                    <i class="bi bi-envelope"></i>
                                    <input class="input" type="email" name="email" id="email" placeholder="" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <?php include "../../../Public/include/modais/modal-error.html"; ?>

    <!-- Imagens Decorativas -->
    <div class="img__dec1"><img src="../../../Public/assets/img-bolas/imagem-superior-esquerdo.svg" alt=""></div>
    <div class="img__dec2"><img src="../../../Public/assets/img-bolas/imagem-superior-direito.svg" alt=""></div>
    <div class="img__dec3"><img src="../../../Public/assets/img-bolas/imagem-inferior-direito.svg" alt=""></div>

    <script src="../../../Public/js/js-adm/varifica_login_expositor.js"></script>
    <script src="../../../Public/js/js-adm/js_perfil_expositor.js"></script>
    <script src="../../../Public/js/js-menu/js-menu-expositor.js"></script>
</body>
</html>

<!-- Matheus Manja  -->
