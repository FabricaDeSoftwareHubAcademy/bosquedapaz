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
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-atracao.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>

<body>
    <?php include "../../../Public/include/menu-adm.html" ?>

    <main class="principal">
        <div class="box">
            <h1>CADASTRO DE ATRAÇÃO</h1>
                <div class="form-box">
                    <form method="POST" enctype="multipart/form-data" id="form-atracao">
                        <div id="form1">

                                <input type="hidden" name="id_evento" id="id_evento" value="<?php echo $_GET['id_evento'] ?? 0; ?>">

                                <input type="hidden" name="nome_evento" id="nome_evento" value="<?php echo $_GET['nome_evento'] ?? 0; ?>">

                                <div class="input-group">
                                    <label>Nome:</label>
                                    <input type="text" name="nome_atracao" id="nome_atracao" placeholder="Digite o nome da atração" required>
                                </div>

                                <div class="input-group">
                                    <label>Descrição:</label>
                                    <textarea name="descricao_atracao" id="descricao_atracao" placeholder="Digite uma breve descrição da atração (250 caracteres)" required cols="30" rows="5" maxlength="250" style="resize: none"></textarea>
                                    <small id="contador-caracteres">250 caracteres restantes</small>
                                </div>

                                <div class="data-imagem">
                                    <div class="input-group">
                                        <label>Imagem:</label>
                                        <input type="file" name="foto" id="file" required>
                                    </div>
                                </div>
                            
                            <img class="preview" src="" alt="" id="preview-image">

                        </div>
                        <?php echo $tolken; ?>

                        <?php include '../../../Public/include/Butons-forms.html';?>
                        
                    </form>
                    <div class="overlay" id="overlay"></div>
                    <?php include "../../../Public/include/modais/modal-confirmar.html"; ?>
                    <?php include "../../../Public/include/modais/modal-sucesso.html"; ?>
                    <?php include "../../../Public/include/modais/modal-error.html"; ?>
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
    <script src="../../../public/js/js-adm/js-cadastrar-atracao.js" defer></script>
    <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
</body>

</html>