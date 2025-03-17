

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-atracao.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >

</head>

<body>
<?php include "../../../Public/assets/adm/menu-adm.html"?>

    <main class="principal">
        <div class="box">
            <h2>EDITAR ATRAÇÃO</h2>
            <div class="form-box">
                <form action="#" method = "POST">
                    <div id="form1">

                        <div class="input-group">
                            <label>Nome:</label>
                            <input type="text" name="nomedoevento" id="nomedoevento" placeholder="Digite o nome do evento"
                                required>
                        </div>
                        
                        <div class="input-group">
                            <label>Descrição:</label>
                            <input type="text" name="descricaodoevento" id="descricaodoevento"
                                placeholder="Digite uma breve descrição do evento" required>
                        </div>
                                               
                        <div class="input-group">
                            <label>Imagem:</label>
                            <input type="file" name="file" id="file" required>
                        </div>

                        <div class ="preview-img">
                            <img class = "preview" src="" alt="" id="preview-image">
                        </div>

                    </div>
                    
                </form>
                
            </div>
            <div class="btns">
                <a href="gerenciar-eventos.php" class="voltar">
                    <img src="../../../Public/imgs/img-area-contate/seta-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>

                <div class="btn-cancelar-salvar">
                    <button class="btn btn-cancelar">
                        <a href="./Area-Adm.php">Cancelar</a>
                    </button>

                    <button class="btn btn-salvar">
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

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/preview-img.js" defer></script>
</body>

</html>