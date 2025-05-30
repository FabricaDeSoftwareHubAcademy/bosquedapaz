
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-evento.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">

</head>

<body>
    <?php include "../../../Public/include/menu-adm.html" ?>

    <main class="principal">
        <div class="box">
            <h1>CADASTRO DE EVENTO</h1>
                <div class="form-box">
                    <form method="POST" enctype="multipart/form-data">
                        <div id="form1">

                            <div class="input-group">
                                <label>Nome:</label>
                                <input type="text" name="nomedoevento" id="nomedoevento" placeholder="Digite o nome do evento"
                                    required>
                            </div>

                            <div class="input-group">
                                <label>Descrição:</label>
                                <textarea name="descricaodoevento" id="descricaodoevento" placeholder="Digite uma breve descrição do evento" required cols="30" rows="5" style="resize: none"></textarea>
                            </div>
                            
                            <div class="data-imagem">
                                <div class="input-group">
                                    <label>Data:</label>
                                    <input type="date" id="dataevento" name="dataevento" required>
                                </div>
                                <div class="input-group">
                                    <label>Imagem:</label>
                                    <input type="file" name="file" id="file"
                                        required>
                                </div>
                            </div>
                            <img class="preview" src="" alt="" id="preview-image">
                        </div>

                        <div class="btn-cancelar-salvar">
                            <button class="btn btn-cancelar">
                                <a href="./Area-Adm.php">Cancelar</a>
                            </button>

                            <button type="submit" class="btn btn-salvar" id="salvar">Salvar</button>
                        </div>
                    </form>
                </div>

                    
                <div class="btns">
                    <a href="gerenciar-eventos.php" class="voltar">
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

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/preview-img.js" defer></script>
    <script src="../../../Public/js/js-adm/js-cadastrar-evento.js" defer></script>
</body>

</html>