<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosque da paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-expositor.css">v


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="../Public/js/js-adm/js-cadastro-expositor.js"></script>

    <title>Bosque da Paz</title>
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
</head>

<body>
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>

    <main class="principal">

        <div class="box">

            <div class="title">
                <h1 class="title-text">CADASTRO DE EXPOSITOR KIDS</h1>
            </div>

            <div class="formularios">

                <div class="form-pessoa">
                    <div class="input">
                        <label>Nome completo:</label>
                        <input type="text" name="" id="" placeholder="Digite seu nome completo" required>
                    </div>
                    <div class="input">
                        <label>Idade:</label>
                        <input type="text" name="" id="" placeholder="Idade:" required>
                    </div>

                    <div class="input">
                        <label>Nome do responsavel:</label>
                        <input type="text" name="" id="" placeholder="Nome do responsavel:" required>
                    </div>
                    <div class="input">
                        <label>Cidade:</label>
                        <input type="text" name="" id="" placeholder="Digite sua cidade" required>
                    </div>

                </div>

                <div class="form-loja">
                    <div class="input">
                        <label>Produto:</label>
                        <input type="text" name="" id="" placeholder="Digite seu produto" required>
                    </div>

                    <div class="input">
                        <label>Marca:</label>
                        <input type="text" name="" id="" placeholder="Digite a marca " required>
                    </div>

                    <div class="input">
                        <label for="optionInput3">Categorias</label>
                        <!-- <input list="options3" id="optionInput3" name="option3" placeholder="Selecione"> -->

                        <select name="todas_categorias" id="todas_categorias" class="select">

                            <option value="">selecione</option>
                            <option value="artesanato">artesanato</option>
                            <option value="gastronia">gastronia</option>
                            <option value="antiguidade">antiguidade</option>

                        </select>

                    </div>

                    <div class="input">
                        <label>Link:</label>
                        <input type="text" name="" id="" placeholder="link instagram" required>
                    </div>



                </div>








            </div>

            <div class="form-finalizar">

                <!-- <div class="edital-feira">
                    <button><a href="#">Edital da Feira</a></button>
                </div> -->


                <!-- <div class="botoes-cancelar">
                    <button onclick="" class="btn-cancelar">Cancelar</button>
                </div>

                <div class="botoes-salvar">
                    <button class="salvar" for="modal-checkbox" id="salvar-btn">Salvar</button>
                </div> -->

                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p>Deseja realmente salvar as alterações?</p>
                        <div class="modal-botoes">
                            <button class="btn-confirmar">Confirmar</button>
                            <button class="btn-cancelar-modal">Cancelar</button>
                        </div>
                    </div>
                </div>


            </div>


            <div class="botoes">
                <!-- <div class="botoes-cancelar">
                    <button onclick="" class="btn-cancelar">Cancelar</button>
                </div> -->

                <div class="salvar-resp">
                    <div class="botoes-salvar">
                        <button class="salvar" for="modal-checkbox" id="salvar-btn">Salvar</button>
                    </div>




                </div>


            </div>
            <div class="btns">
                <a href="Area-Adm.php" class="voltar">
                    <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>
                <div class="btn-cancelar-salvar">
                    <button type="button" class="btn btn-cancelar">
                        <a href="./Area-Adm.php">Cancelar</a>
                    </button>

                    <button type="submit" class="btn btn-salvar">
                        <a href="">Salvar</a>
                </div>
            </div>
            </div>

        </div>
    </main>

    <div class="bolas-fundo">

        <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-modais/modal-cadastro-expositor"></script>


</body>

</html>