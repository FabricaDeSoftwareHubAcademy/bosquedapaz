<?php

$img1 = '../../../Public/imgs/uploads-carrosel/img-carrossel-1.jpg';
$img2 = '../../../Public/imgs/uploads-carrosel/img-carrossel-2.jpg';
$img3 = '../../../Public/imgs/uploads-carrosel/img-carrossel-3.jpg';

// getimagesize('../Public/uploads/uploads-carrosel/img-carrossel-1.jpg')

function update_carrossel($img,$num) {
    $caminho = '../../../Public/uploads/uploads-carrosel/';
    $new_img = $img['name'];
    $new_name = 'imgsel-'.$num;
    $extencao_imagem = strtolower(pathinfo($new_img, PATHINFO_EXTENSION));

    $size = getimagesize($img['tmp_name']);
    
    if ($extencao_imagem != 'png' && $extencao_imagem != 'jpg' && $extencao_imagem != 'jpeg'){
        return 'img invalida';
    }else{
        if ($size[0] > 1920 && $size > 1080){
            return 'img invalida';
        }else{
            $caminho_img = $caminho . $new_name. '.'. $extencao_imagem;
        
            $upload_img = move_uploaded_file($img['tmp_name'], $caminho_img);
        }
    }


}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_FILES['img1'])){
        // $ers = update_carrossel($_FILES['img1'], 2);
        // echo $ers;
    }

    // echo 'temmmmmmm';
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- link com style padrao da pagina adm -->
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-editar-carrossel.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">

</head>

<body>
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>

    <!-- inicio da parte principal da pagina -->
    <main class="principal">

        <!-- box principal -->
        <div class="box">


            
            <h1 class="titulo">editar carrosel</h1>


            
            <!-- local de uploads de imgs para o carrossel -->
            <form action="" method="post" class="formulario-ca" enctype='multipart/form-data'>
                <section class="up-imgs">
                    <div class="div-nome">
                        <h1 class="num">Imagem 1</h1>
                        <label class="uploads" id="label">
                            <input type="file" name="img1" id="imagens-input" class="input" id="input1">
                
                            <img <?php echo "src='".$img1."'"; ?> alt="Imagem do carrossel 3" id="img1" class="up-img">
                
                            <button class="btn-editar open-modal">
                                <i class="fa-solid fa-pen editar"></i>
                            </button>
                        </label>
                    </div>
                
                    <div class="div-nome">
                        <h1 class="num">Imagem 2</h1>
                        <label class="uploads" id="label">
                            <input type="file" name="img2" id="imagens-input2" class="input" id="input2">
                
                            <img <?php echo "src='".$img2."'"; ?> alt="Imagem do carrossel 3" id="img2" class="up-img">
                
                            <button class="btn-editar open-modal">
                                <i class="fa-solid fa-pen editar"></i>
                            </button>
                        </label>
                    </div>
                
                    <div class="div-nome">
                        <h1 class="num">Imagem 3</h1>
                        <label class="uploads" id="label">
                            <input type="file" name="img3" id="imagens-input3" class="input" id="input3">
                
                            <img <?php echo "src='".$img3."'"; ?> alt="Imagem do carrossel 3" id="img3" class="up-img">
                
                            <button class="btn-editar open-modal">
                                <i class="fa-solid fa-pen editar"></i>
                            </button>

                        </label>
                    </div>
                </section>
                <!-- botoes parte de baixo -->
                <div class="btns">
                    <a href="Area-Adm.php" class="voltar">
                        <img src="../../../Public/imgs/img-cadastro-carrosel/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                    </a>
                    <div class="btn-cancelar-salvar">
                            <button class="btn btn-cancelar">
                                <a href="">Cancelar</a>
                            </button>
                            
                            <button type="submit" name="editar" class="btn btn-salvar">
                                Salvar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </main>

    <!-- bolas de fundo -->
    <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
    <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
    <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">


    <!-- link do JavaScript -->
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/js-editar-carrossel.js"></script>
</body>

</html>
