<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../../../app/helpers/auth.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-utilidades.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">

</head>

<body>
    <?php include "../../../Public/include/menu-adm.html" ?>


    <main class="principal">
        <div class="box">
            <h2>CADASTRO DE UTILIDADES PÚBLICAS</h2>
            <div class="form-container">
                <div class="form-box">
                    <form id="form_cadastrar_utilidade" method="POST">
                        <div class="input-group">
                            <label>Título:</label>
                            <input required type="text" name="titulo" id="titulo"
                                placeholder="Escreva o título da utilidade pública">
                                <span id="titleErro" class="erro"></span>
                        </div>
                        <div class="input-group">
                            <label>Descrição:</label>
                            <textarea name="descricao" id="descricao" placeholder="Digite uma breve descrição da utilidade" cols="30" rows="5" style="resize: none"></textarea>
                        </div>
                        <div class="data">
                            <div class="input-group">
                                <label>Data início</label>
                                <input name="data_inicio" type="date" id="data-inicio" required>
                            </div>
                            <div class="input-group">
                                <label>Data fim</label>
                                <input name="data_fim" type="date" id="data-fim" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Imagem:</label>
                            <input type="file" name="imagem" id="imagem" required>
                        </div>
                        <?php include "../../../Public/include/Butons-forms.html" ?>
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

    <script src="../../../Public/js/js-adm/js-btns-padrao.js"></script>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/js-cadastrar-utilidade.js"></script>
</body>

</html>