<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

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
                            <input type="text" name="titulo" id="titulo"
                                placeholder="Escreva o título da utilidade pública">
                        </div>
                        <div class="input-group">
                            <label>Descrição:</label>
                            <textarea name="descricao" id="descricaodoevento" placeholder="Digite uma breve descrição da utilidade" required cols="30" rows="5" style="resize: none"></textarea>
                        </div>
                        <div class="data">
                            <div class="input-group">
                                <label>Data início</label>
                                <input name="data_inicio" type="date" id="data-inicio">
                            </div>
                            <div class="input-group">
                                <label>Data fim</label>
                                <input name="data_fim" type="date" id="data-fim">
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Imagem:</label>
                            <input type="file" name="imagem" id="imagem" required>
                        </div>
                    </form>
                </div>
            </div>
            <div class="btns">
                <a href="Area-Adm.php" class="voltar">
                    <img src="../../../Public/imgs/img-area-contate/seta-voltar.png" class="btn-voltar">
                </a>

                <div class="btn-cancelar-salvar">
                    <button class="btn btn-cancelar">
                        <a href="">Cancelar</a>
                    </button>

                    <button id="botao_cadastrar_utilidade" name="REQUEST_METHOD" class="btn btn-salvar">
                        <a href="">Salvar</a>
                </div>
            </div>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/js-cadastrar-utilidade.js"></script>
</body>

</html>