<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-editar-evento.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">

</head>

<body>
    <?php include "../../../Public/include/menu-adm.html" ?>


    <main class="principal">
        <div class="box">
            <h1>EDITAR EVENTO</h1>
                <div class="form-box">
                    <form id="form-editar-evento" method="POST" enctype="multipart/form-data">
                        
                        <div id="form1">
                            <input type="hidden" name="id_evento" id="id_evento">
                            <div class="input-group">
                                <label>Nome:</label>
                                <input type="text" name="nomedoevento" id="nomedoevento" required>
                            </div>

                            <div class="input-group">
                                <label>Descrição:</label>
                                <textarea name="descricao" id="descricao" rows="5" cols="40"></textarea>
                            </div>

                            <div class="data-imagem">
                                <div class="input-group">
                                    <label>Data:</label>
                                    <input type="date" name="dataevento" id="dataevento" required>
                                </div>

                                <select name="status" id="status">
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>

                                <div class="input-group">
                                    <label>Imagem:</label>
                                    <input type="file" name="banner" id="file">
                                </div>
                            </div>
                            <img class="preview" src="" alt="" id="preview-image">
                        </div>

                        <div class="btn-cancelar-salvar">
                            <a href="./Area-Adm.php" class="btn btn-cancelar">Cancelar</a>
                            <button type="submit" class="btn btn-salvar">Salvar</button>
                        </div>
                    </form>

                </div>
            <div class="btns">
                <a href="gerenciar-eventos.php" class="voltar">
                    <img src="../../../Public/imgs/img-area-contate/seta-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>

                
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
    <script src="../../../Public/js/js-adm/preview-img.js" defer></script>
    <script src="../../../Public/js/js-adm/js-editar-evento.js" defer></script>
</body>

</html>