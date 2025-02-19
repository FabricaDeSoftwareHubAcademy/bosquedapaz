<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Expositor</title>
    <link rel="stylesheet" href="../../../Public/css/css-home/cadastro-expositor.css">
</head>
<body>
    <?php include "../../../Public/assets/home/menu-home.html"; ?>

    <!-- inicio da parte principal da pagina -->
    <main class="principal">
        
        <!-- box principal -->
        <div class="box">
            
            <h1 class="titulo">Cadastro Expositor Kids</h1>

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
                                <label for="" class="label-input">Nome da Marca:</label>
                                <input type="text" name="nome_marca" id="nome_marca" class="input-dados">
                            </div>

                            <div class="area-input">
                                <label for="" class="label-input">dimenções:</label>
                                <input type="text" name="dimensoes" id="dimensoes" class="input-dados">
                            </div>

                            <div class="area-input">
                                <label for="" class="label-input">Numero da Barraca:</label>
                                <input type="number" name="num_barraca" id="num_barraca" class="input-dados">
                            </div>
                            <div class="area-input">
                                <label for="" class="label-input">Necessita de Energia:</label>
                                <input type="checkbox" name="energia" id="energia " class="input-dados input-ener">
                            </div>
                        </div>
                        <div class="inputs-pessoa inputs-pessoa-mudular">

                            <div class="area-input">
                                <label for="" class="label-input">Outro Contato:</label>
                                <input type="text" name="contato2" id="contato2" class="input-dados">
                            </div>

                            <div class="area-input">
                                <label for="" class="label-input">Descrição:</label>
                                <textarea id="descricao" name="descricao" rows="4" cols="50" class="input-dados descricao">
                                </textarea>
                            </div>

                            <div class="area-input">
                                <label for="" class="label-input">Metodos de Pagamento:</label>
                                <input type="text" name="metodos_pgto" id="metodos_pgto" class="input-dados">
                            </div>
                        </div>
                        <div class="inputs-pessoa">

                            <div class="area-input">
                                <label for="" class="label-input">Data de nascimento:</label>
                                <input type="date" name="contato2" id="contato2" class="input-dados">
                            </div>

                            <div class="area-input">
                                <label for="" class="label-input">Responsavel:</label>
                                <input type="text" name="descricao" id="descricao" class="input-dados">
                            </div>

                        </div>
                    </div>
                    </div>




                    <div class="btns-salve-reset">
                        <button type="reset" class="btn-form btn-cancel">
                        <a href="escolher-cadastro.php" class="link-cas-expositor">Cancelar</a>
                        </button>
                        <button type="submit"class="btn-form btn-save">
                        <a href="../../../index.php" class="link-cas-expositor">Cadastra-se</a>
                        </button>
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