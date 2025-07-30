<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-atracao.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>

<body>
   <?php include "../../../Public/include/menu-adm.html" ?>

    <main class="principal">
        <div class="box">
            <h2>EDITAR ATRAÇÃO</h2>
            <div class="form-box">
                <form id="form-editar-atracao" method="POST" enctype="multipart/form-data">

                    <div id="form1">
                        <input type="hidden" name="id_evento" id="id_evento">
                        <input type="hidden" name="id_atracao" id="id_atracao">
                        <div class="input-group">
                            <label>Nome:</label>
                            <input type="text" name="nome_atracao" id="nome_atracao" placeholder="Digite o nome do evento"
                                required>
                        </div>

                        <div class="input-group">
                            <label>Descrição:</label>
                            <textarea name="descricao_atracao" id="descricao_atracao" placeholder="Digite uma breve descrição do evento (250 caracteres)" rows="5" cols="30" maxlength="250" style="resize: none"></textarea>
                            <small id="contador-caracteres">250 caracteres restantes</small>
                        </div>

                        <div class="input-group">
                            <label>Status:</label>
                            <select name="status" id="status" required>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <label>Imagem:</label>
                            <input type="file" name="banner_atracao" id="file">
                        </div>

                        <div class="preview-img">
                            <img class="preview" src="" alt="" id="preview-image">
                        </div>
                    </div>


                    <?php include '../../../Public/include/Butons-forms.html';?>

                </form>
                <div class="overlay" id="overlay"></div>
                <?php include "../../../Public/include/modais/modal-Confirmar.html"; ?>
                <?php include "../../../Public/include/modais/modal-sucesso.html"; ?>
                <?php include "../../../Public/include/modais/modal-error.html"; ?>

            </div>

        </div>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/assets/img-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/assets/img-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/assets/img-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/preview-img.js" defer></script>
    <script src="../../../Public/js/js-adm/js-editar-atracao.js" defer></script>
    <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
</body>

</html>