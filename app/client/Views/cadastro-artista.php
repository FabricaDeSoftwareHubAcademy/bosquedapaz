<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de expositor</title>
    <link rel="stylesheet" href="../../../Public/css/css-home/cadastro-expositor.css">
</head>
<body>
    <?php include "../../../Public/assets/home/menu-home.html"; ?>

    <!-- inicio da parte principal da pagina -->
    <main class="principal">
        
        <!-- box principal -->
        <div class="box">
            
            <h1 class="titulo">Cadastro de Artistas</h1>

            <div class="all-content">
                <form action="" class="form-expositor" method="post">
                    <div class="div-dados-pessoa">
                        <div class="div-foto-per">
                            <input type="file" name="foto-per" id="foto-per" class="foto-per">
                            <label for="" class="label-foper">arraste sua foto aqui</label>
                        </div>
                        <div class="div-input-pessoa">
                            <div class="inputs-pessoa">
                                <div class="area-input">
                                    <label for="" class="label-input">Nome:</label>
                                    <input type="text" name="nome" id="nome" class="input-dados">
                                </div>
                                <div class="area-input">
                                    <label for="" class="label-input">Endereço:</label>
                                    <input type="text" name="endereco" id="endereco" class="input-dados">
                                </div>
                                <div class="area-input">
                                    <label for="" class="label-input">E-mail:</label>
                                    <input type="tel" name="email" id="email " class="input-dados">
                                </div>
                            </div>
                            <div class="inputs-pessoa">
                                <div class="area-input">
                                    <label for="" class="label-input">Telefone:</label>
                                    <input type="tel" name="telefone" id="telefone" class="input-dados">
                                </div>
                                <div class="area-input">
                                    <label for="" class="label-input">Link Instagram:</label>
                                    <input type="text" name="link_instagram " id="link_instagram " class="input-dados">
                                </div>
                                <div class="area-input">
                                    <label for="" class="label-input">Nome de usuário:</label>
                                    <input type="text" name="usuario" id="usuario" class="input-dados">
                                </div>
                                <div class="area-input">
                                    <label for="" class="label-input">Senha:</label>
                                    <input type="text" name="senha" id="senha" class="input-dados">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="dados-modular">
                        <div class="up-img">
                            <div class="arrasta-imgs">
                                <input type="file" name="imagem" id="imagem" class="imagens">
                                <label for="" class="up-imgs-expositor">Arraste aqui suas imagens</label>
                            </div>
                        </div>
                        <div class="mudular-expositor">

                        <div class="inputs-pessoa">
                            <div class="area-input">
                                <label for="" class="label-input">Tipo do Artista:</label>
                                <input type="text" name="tipo_artista" id="tipo_artista" class="input-dados">
                            </div>

                            <div class="area-input">
                                <label for="" class="label-input">Linguagem Artistica:</label>
                                <input type="text" name="linguagem_artistica" id="linguagem_artistica" class="input-dados">
                            </div>

                            <div class="area-input">
                                <label for="" class="label-input">Tempo de apresentação:</label>
                                <input type="time" name="tempo_apresentacao" id="tempo_apresentacao" class="input-dados">
                            </div>
                            <div class="area-input">
                                <label for="" class="label-input">Valor Cache:</label>
                                <input type="text" name="valor_cache" id="valor_cache" class="input-dados">
                            </div>
                        </div>
                    </div>
                    </div>


                    <div class="btns-salve-reset">
                        <button type="reset" class="btn-form btn-cancel">Cancelar</button>
                        <button type="submit"class="btn-form btn-save">Cadastra-se</button>
                    </div>
                </form>
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

</body>
</html>