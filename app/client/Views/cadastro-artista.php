<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-home/style-menu.css">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-cadastrar-artistas.css">
    <script src="../Public/js/js-adm/js-cadastro-expositor.js"></script>

</head>

<body>
    <?php include "../../../Public/assets/home/menu-home.html" ?>


    <main class="principal">

        <div class="box">

            <div class="title">
                <h1 class="title-text">CADASTRO DE ARTISTAS</h1>
            </div>

            <form class="formularios" method="POST">

                <div class="form-pessoa">
                    <div class="input">
                        <label>Nome completo:</label>
                        <input type="text" name="nome" id="" placeholder="Digite seu nome completo" required>
                    </div>

                    <div class="input">
                        <label>Idade:</label>
                        <input type="text" name="idade" id="" placeholder="Idade:" required>
                    </div>

                    <div class="input">
                        <label>Nome do responsavel:</label>
                        <input type="text" name="responsavel" id="" placeholder="Nome do responsavel:" required>
                    </div>

                    <div class="input">
                        <label for="optionInput3">Grau de parentesco</label>
                        <select name="id_grauParentesco" id="grauParentesco" class="select" require>
                            <option value="">Selecione</option>
                            <option value="mae">Mãe</option>
                            <option value="pai">Pai</option>
                            <option value="responsavel">Responsavel</option>
                        </select>
                    </div>

                    <div class="input">
                        <label>Telefone:</label>
                        <input type="text" name="telefone" id="" placeholder="Telefone para contato" required>
                    </div>
                </div>

                <div class="form-loja">
                    <div class="input">
                        <label for="optionInput3">Categorias</label>
                        <select name="id_categoria" id="categorias" class="select" require>

                            <option value="">Selecione</option>
                            <option value="<?= $categorias['$id_categoria'] ?>"></option>

                        </select>
                    </div>

                    <div class="input">
                        <label>Produto:</label>
                        <input type="text" name="produto" id="" placeholder="Digite seu produto" required>
                    </div>

                    <div class="input">
                        <label>Marca:</label>
                        <input type="text" name="marca" id="" placeholder="Digite a marca " required>
                    </div>

                    <div class="input-group">
                        <label>Escolher Imagens:</label>
                        <input type="file" name="file[]" id="file" multiple="multiple">
                    </div>
                    <div class="input">
                        <label>Link Instagram:</label>
                        <input type="text" name="instagram" id="" placeholder="Link instagram" required>
                    </div>
                </div>

                <div class="btn-finalizar">
                    <button name="REQUEST_METHOD" class="btn btn-salvar">salvar</button>
                    <button class="btn btn-cancelar"><a href="cadastrar-expositor-kids-adm.php">cancelar</a></button>
                </div>
            </form>


            </div>
            <div class="btns">
                <a href="escolher-cadastro.php" class="voltar">
                    <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>
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