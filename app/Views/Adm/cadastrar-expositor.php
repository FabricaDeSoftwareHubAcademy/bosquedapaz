<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-expositor.css">
    <!-- <link rel="stylesheet" href="../../../Public/css/css-adm/teste.css"> -->
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
</head>

<body onload="getCategorias()">
    <?php include "../../../Public/include/menu-adm.html" ?>

    <main class="principal">

        <div class="box">
            <div class="title">
                <h1 class="title-text">CADASTRO DE EXPOSITORES</h1>
            </div>

            <form id="fomulario_cad_expositor" method="POST">
                <div class="formularios">
                    <div class="form-pessoa">
                        <div class="input">
                            <label>Nome completo:</label>
                            <input type="text" name="nome" id="" placeholder="Digite seu nome completo" required>
                        </div>
                        <div class="input">
                            <label>Whatsapp:</label>
                            <input type="tel" name="whatsapp" placeholder="Número de whatsapp"
                                pattern="[0-9]{10,11}" required
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        </div>
                        <div class="input">
                            <label>E-mail:</label>
                            <input type="text" name="email" id="" placeholder="Digite seu e-mail" required>
                        </div>
                        <div class="input">
                            <label>Qual Cidade Reside:</label>
                            <input type="text" name="cidade" id="" placeholder="Digite sua cidade">
                        </div>
                    </div>

                    <div class="form-loja">
                        <div class="input">
                            <label>Produto:</label>
                            <input type="text" name="produto" id="" placeholder="Digite seu produto" required>
                        </div>

                        <div class="input">
                            <label>Marca:</label>
                            <input type="text" name="marca" id="" placeholder="Digite a marca " required>
                        </div>

                        <div class="input">
                            <label for="optionInput3">Categorias</label>
                            <select name="id_categoria" id="categorias" class="" require>
                                <!-- OPTIONS GERADOS PELO JS -->
                            </select>
                        </div>

                        <div class="input">
                            <label>Link instagram:</label>

                            <input type="text" name="" id="" placeholder="link instagram" required>
                        </div>
                    </div>

                    <div class="form-expo">
                        <div id="tipo_expo" class="form-group">
                            <label id="expo_label" for="tipo-expo">Tipo de exposição:</label>
                            <select name="" id="tipo_expo" class="select">
                                <option value="">Selecione</option>
                                <option value="trailer">Trailer</option>
                                <option value="food-truck">Food truck</option>
                                <option value="barraca">Barraca</option>
                            </select>
                        </div>

                        <div class="form-group-energia">
                            <label id="energia_label" for="energia">Precisa de energia?</label>
                            <select name="energia" id="energia" class="select">
                                <option value="">Selecione</option>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label id="volt_label" for="equipamentos">Voltagens dos equipamentos</label>
                            <select name="voltagem" id="voltagem" class="select">
                                <option value="">selecione</option>
                                <option value="110v">110v</option>
                                <option value="220v">220v</option>
                            </select>
                        </div>

                        <div class="form-files">
                            <label>Escolher Imagens:</label>
                            <input type="file" name="files[]" id="files" multiple="multiple">
                        </div>
                    </div>


                    <div class="btn-conf">
                        <div class="btn-finalizar">
                            <button id="btn_salvar" name="salvar" class="btn btn-salvar">salvar</button>
                            <button class="btn btn-cancelar">cancelar</button>
                        </div>
                    </div>

                </div>

                <div class="btns">
                    <a href="Area-Adm.php" class="voltar">
                        <img class="img-voltar" src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                    </a>
                </div>
            </form>

        </div>

        <div id="modal_salvar" class="oculta">
            <div class="modal_conteudo">
                <p class="text_modal">Cadastro salvo com sucesso!</p>
                <form method="dialog" class="fecha_modal">
                    <button id="fechar_modal">Fechar</button>
                </form>
            </div>
        </div>

        </div>
    </main>

    <div class="bolas-fundo">

        <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>




    <script src="../../../Public/js/js-menu/js-menu.js" defer></script>
    <script src="../../../Public/js/js-adm/js-cadastrar-expositor.js" defer></script>

</body>

</html>