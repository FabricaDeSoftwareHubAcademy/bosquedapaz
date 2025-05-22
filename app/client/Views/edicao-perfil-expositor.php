<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-edicao-perfil-expositor.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>

    <section class="principal">
        <div class="img1"><img src="../../../Public/imgs/imgs-edicao-perfil-expo/img1.png" alt=""></div>
        <div class="img2"><img src="../../../Public/imgs/imgs-edicao-perfil-expo/img2.png" alt=""></div>
        <div class="img3"><img src="../../../Public/imgs/imgs-edicao-perfil-expo/img3.png" alt=""></div>

        <div class="box-principal">
            <div class="area-infs">
                <div class="linha"></div>
                <form action="#" method="POST" id="formCarrossel" enctype="multipart/form-data">
                    <!-- Lado esquerdo - Upload de imagem (LOGO) -->
                    <div class="lado-esquerdo">
                        <div class="area-logo">
                            <label for="imagem" class="uploads">
                                <input type="file" name="imagem" id="imagem" class="img-input" multiple>
                                <img src="../../../Public/imgs/imgs-edicao-perfil-expo/logo-marca.png"
                                    alt="Imagem do perfil">
                            </label>
                            <p>Clique na logo para alterar</p>
                        </div>
                        <div class="text-produtos">
                            <h1>Produtos</h1>
                        </div>

                        <!-- Lado esquerdo - Upload de imagens -->
                        <div class="area-imgs">
                            <label for="imagem" class="imgs-produtos">
                                <input type="file" name="imagem" id="imagem" class="img-produto-input" multiple>
                                <img src="../../../Public/imgs/imgs-edicao-perfil-expo/foto-produto-1.jpeg"
                                    alt="Imagem do perfil">
                            </label>

                            <label for="imagem" class="imgs-produtos">
                                <input type="file" name="imagem" id="imagem" class="img-produto-input" multiple>
                                <img src="../../../Public/imgs/imgs-edicao-perfil-expo/foto-produto-2.jpeg"
                                    alt="Imagem do perfil">
                            </label>

                            <label for="imagem" class="imgs-produtos">
                                <input type="file" name="imagem" id="imagem" class="img-produto-input" multiple>
                                <img src="../../../Public/imgs/imgs-edicao-perfil-expo/foto-produto-3.jpeg"
                                    alt="Imagem do perfil">
                            </label>

                            <label for="imagem" class="imgs-produtos">
                                <input type="file" name="imagem" id="imagem" class="img-produto-input" multiple>
                                <img src="../../../Public/imgs/imgs-edicao-perfil-expo/foto-produto-4.jpeg"
                                    alt="Imagem do perfil">
                            </label>

                            <label for="imagem" class="imgs-produtos">
                                <input type="file" name="imagem" id="imagem" class="img-produto-input" multiple>
                                <img src="../../../Public/imgs/imgs-edicao-perfil-expo/foto-produto-5.jpeg"
                                    alt="Imagem do perfil">
                            </label>

                            <label for="imagem" class="imgs-produtos">
                                <input type="file" name="imagem" id="imagem" class="img-produto-input" multiple>
                                <img src="../../../Public/imgs/imgs-edicao-perfil-expo/foto-produto-6.jpeg"
                                    alt="Imagem do perfil">
                            </label>
                            <p>Clique na imagem para alterar</p>
                        </div>
                    </div>

                    <!-- Lado direito - Informações -->
                    <div class="lado-direito">
                        <div class="area-h1">
                            <h1>Edição Perfil Expositor</h1>
                        </div>
                        <div class="area-text">
                            <h1 class="title">Play Artesanato</h1>
                            <p class="sobre">Sobre a Empresa</p>
                            <textarea name="descricao" class="input-texto"
                                placeholder="Edite o texto aqui..."></textarea>
                        </div>

                        <div class="area-cat-num">
                            <div class="cat">
                                <h3>Categoria</h3>
                                <p class="p-cat">Artesanato</p>
                            </div>
                            <div class="num">
                                <h3>Numero</h3>
                                <p class="pp">89</p>
                            </div>

                            <div class="area-corR">
                                <h3>Cor da Rua</h3>
                                <div class="cor-rua">
                                    <p>Verde</p>
                                </div>
                            </div>
                        </div>

                        <div class="area-inf-corR">
                            <div class="area-total-form">
                                <h3 class="h3-infs-pessoais">Informações Pessoais</h3>
                                <div class="area-inputs">
                                    <label>Link Instagram:</label>
                                    <div class="input-container">
                                        <i class="bi bi-instagram"></i>
                                        <input class="input" type="text" name="insta"
                                            placeholder="Digite o Link do Instagram" required>
                                    </div>
                                </div>

                                <div class="area-inputs">
                                    <label>Link Whatsapp:</label>
                                    <div class="input-container">
                                        <i class="bi bi-whatsapp"></i>
                                        <input class="input" type="text" name="whatsapp"
                                            placeholder="Digite o Link do WhatsApp" required>
                                    </div>
                                </div>

                                <div class="area-inputs">
                                    <label>Link Facebook:</label>
                                    <div class="input-container">
                                        <i class="bi bi-facebook"></i>
                                        <input class="input" type="text" name="facebook"
                                            placeholder="Digite o Link do Facebook" required>
                                    </div>
                                </div>

                                <div class="area-inputs">
                                    <label>Link E-mail:</label>
                                    <div class="input-container">
                                        <i class="bi bi-envelope"></i>
                                        <input class="input" type="email" name="email"
                                            placeholder="Digite o Link do E-mail" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="area-buttons">
                            <button class="buttons" id="button-cancelar">Cancelar</button>
                            <button class="buttons" id="button-salvar">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="../../../Public/js/js-home/main.js" defer></script>
</body>
</html>