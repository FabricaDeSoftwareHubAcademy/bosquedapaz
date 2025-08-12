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
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-fotos-evento.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">    
</head>

<body>
    <?php include "../../../Public/include/menu-adm.html" ?>

    <main class="principal">
        <div class="box">
            <h1>CADASTRAR FOTOS DO EVENTO</h1>
                <div class="form-box">



                        <form id="form-upload-fotos" method="POST" enctype="multipart/form-data">
                            <div id="upload-fotos">
                                <input type="hidden" name="id_evento" id="id_evento" value="<?php echo $_GET['id']; ?>">

                                <div class="input-group">
                                    <label for="fotos">Selecione as fotos (JPG, PNG, JPEG):</label>
                                    <input type="file" id="fotos" name="fotos[]" multiple >
                                </div>

                                <div class="preview-galeria" id="preview-galeria"></div>

                                <?php echo $tolken; ?>


                            </div>
                            <?php include '../../../Public/include/Butons-forms.html';?>
                        </form>

                </div>

                    

        </div>
        
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/assets/img-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/assets/img-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/assets/img-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <!-- <script src="../../../Public/js/js-adm/preview-img.js" defer></script> -->
    <script src="../../../Public/js/js-adm/js-upload-fotos.js" defer></script>
    <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
</body>

</html>