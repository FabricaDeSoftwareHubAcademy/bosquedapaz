<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-edicao-perfil-expositor.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Edição de Perfil | Play Artesanato</title>
</head>
<body>
    <!-- Include Menu de Navegação -->
    <?php include "../../../Public/assets/home/menu-home.html"; ?>
    <!-- Corpo da Pagina -->
    <section class="container__main">
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
                        <label for="logo" class="uploads">
                            <input type="file" name="logo" id="logo" class="img__input">
                            <img src="../../../Public/imgs/imgs-edicao-perfil-expo/logo-marca.png" alt="Logo atual do expositor">
                        </label>
                        <p>Clique na logo para alterar</p>
                    </div>
                    <!-- Area texto produto -->
                    <div class="text__produtos">
                        <h2>Produtos</h2>
                    </div>
                    <!-- Upload de Fotos dos Produtos -->
                    <div class="container__imgs">
                        <!-- Area das Imagens -->
                        <div class="galeria__imagens">
                            <label for="produto1" class="label__img__prod">
                                <input type="file" name="produto1" id="produto1" class="input__img">
                                <img src="../../../Public/imgs/imgs-edicao-perfil-expo/foto-produto-1.jpeg" alt="Produto 1">
                            </label>

                            <label for="produto2" class="label__img__prod">
                                <input type="file" name="produto2" id="produto2" class="input__img">
                                <img src="../../../Public/imgs/imgs-edicao-perfil-expo/foto-produto-2.jpeg" alt="Produto 2">
                            </label>

                            <label for="produto3" class="label__img__prod">
                                <input type="file" name="produto3" id="produto3" class="input__img">
                                <img src="../../../Public/imgs/imgs-edicao-perfil-expo/foto-produto-3.jpeg" alt="Produto 3">
                            </label>

                            <label for="produto4" class="label__img__prod">
                                <input type="file" name="produto4" id="produto4" class="input__img">
                                <img src="../../../Public/imgs/imgs-edicao-perfil-expo/foto-produto-4.jpeg" alt="Produto 4">
                            </label>

                            <label for="produto5" class="label__img__prod">
                                <input type="file" name="produto5" id="produto5" class="input__img">
                                <img src="../../../Public/imgs/imgs-edicao-perfil-expo/foto-produto-5.jpeg" alt="Produto 5">
                            </label>

                            <label for="produto6" class="label__img__prod">
                                <input type="file" name="produto6" id="produto6" class="input__img">
                                <img src="../../../Public/imgs/imgs-edicao-perfil-expo/foto-produto-6.jpeg" alt="Produto 6">
                            </label>
                            <p>Clique na imagem para alterar</p>
                        </div>
                    </div>
                </div>
                <!-- Lado Direito: Informações do Expositor -->
                <div class="lado__direito">
                    <!-- Título -->
                    <div class="area__h1">
                        <h1>Edição Perfil Expositor</h1>
                    </div>

                    <!-- Sobre o Expositor -->
                    <div class="area__text">
                        <h2 class="title">Play Artesanato</h2>
                        <label for="descricao" class="sobre">Sobre a Empresa</label>
                        <textarea name="descricao" id="descricao" class="input__text" placeholder="Edite o texto aqui..."></textarea>
                    </div>

                    <!-- Informações da Barraca -->
                    <div class="area__cat__num">
                        <div class="cat">
                            <h3>Categoria</h3>
                            <p class="p__cat">Artesanato</p>
                        </div>
                        <div class="num">
                            <h3>Número</h3>
                            <p class="pp">89</p>
                        </div>
                        <div class="area__cor">
                            <h3>Cor da Rua</h3>
                            <div class="cor__rua"><p>Verde</p></div>
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
                                    <input class="input" type="text" name="insta" id="insta" placeholder="Digite o link do Instagram" required>
                                </div>
                            </div>

                            <div class="area__inputs">
                                <label for="whatsapp">Link WhatsApp:</label>
                                <div class="input__container">
                                    <i class="bi bi-whatsapp"></i>
                                    <input class="input" type="text" name="whatsapp" id="whatsapp" placeholder="Digite o link do WhatsApp" required>
                                </div>
                            </div>

                            <div class="area__inputs">
                                <label for="facebook">Link Facebook:</label>
                                <div class="input__container">
                                    <i class="bi bi-facebook"></i>
                                    <input class="input" type="text" name="facebook" id="facebook" placeholder="Digite o link do Facebook" required>
                                </div>
                            </div>

                            <div class="area__inputs">
                                <label for="email">E-mail:</label>
                                <div class="input__container">
                                    <i class="bi bi-envelope"></i>
                                    <input class="input" type="email" name="email" id="email" placeholder="Digite o e-mail" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Botões -->
                    <div class="area__buttons">
                        <button type="button" class="buttons" id="button__cancelar">Cancelar</button>
                        <button type="submit" class="buttons" id="button__salvar">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Imagens Decorativas -->
    <div class="img__dec1"><img src="../../../Public/imgs/imgs-edicao-perfil-expo/img1.png" alt=""></div>
    <div class="img__dec2"><img src="../../../Public/imgs/imgs-edicao-perfil-expo/img2.png" alt=""></div>
    <div class="img__dec3"><img src="../../../Public/imgs/imgs-edicao-perfil-expo/img3.png" alt=""></div>
</body>
</html>
