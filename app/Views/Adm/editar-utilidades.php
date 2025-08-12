
<?php 
include_once('../../helpers/csrf.php');
$tolken = getTolkenCsrf();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-utilidades.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-editar-utilidades.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>

<body>
    <?php include "../../../Public/include/menu-adm.html" ?>


    <main class="principal">
        <div class="box">
            <h2>EDITAR UTILIDADE PÚBLICA</h2>
            <div class="form-container">
                <div class="form-box">
                    <form id="form_editar_utilidade" method='POST'>
                        <div class="input-group">
                            <label>Título:</label>
                            <input type="text" name="titulo" id="titulo"
                                placeholder="Escreva o título da utilidade pública">
                        </div>
                        <div class="input-group">
                            <label>Descrição:</label>
                            <textarea name="descricao" id="descricao" placeholder="Digite uma breve descrição da utilidade" required cols="30" rows="5" style="resize: none"></textarea>
                        </div>
                        <div class="data">
                            <div class="input-group">
                                <label>Data início</label>
                                <input type="date" id="data_inicio" name="data_inicio" value="0000/00/00">
                            </div>
                            <div class="input-group">
                                <label>Data fim</label>
                                <input type="date" id="data_fim" name="data_fim" value="0000/00/00">
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Imagem:</label>
                            <input type="file" name="imagem" id="imagem" required>
                        </div>

                        <div class="img-preview">
                            <img class="preview" src='' alt="" id="preview-image" name="preview-image">
                            <?php echo $tolken; ?>
                        </div>
                        

                        <div class="btns">
                            <?php include "../../../Public/include/Butons-forms.html" ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/assets/img-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/assets/img-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/assets/img-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <?php include '../../../Public/include/modais/modal-confirmar.html'; ?>
    <?php include '../../../Public/include/modais/modal-sucesso.html'; ?>
    <?php include '../../../Public/include/modais/modal-error.html'; ?>
    <script src="../../../Public/js/js-modais/js-modal-confirmar.js" defer></script>
    <script src="../../../Public/js/js-modais/js-modal-sucesso.js"></script>
    <script src="../../../Public/js/js-modais/js-modal-deletar.js"></script>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/js-btns-padrao.js"></script>
    <script src="../../../Public/js/js-adm/js-editar-utilidade.js"></script>
    <script src="../../../Public/js/js-adm/preview-img.js" defer></script>
    <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
</body>

</html>