<?php

require_once('../Controller/Carrossel.php');

$car = new Carrossel();


// busca no banco
$res = $car->buscar_id(3);


// caminho das imgs padrao
$imagens = [
    'img1' => '../../../Public/imgs/uploads-carrosel/img-carrossel-1.jpg',
    'img2' => '../../../Public/imgs/uploads-carrosel/img-carrossel-2.jpg',
    'img3' => '../../../Public/imgs/uploads-carrosel/img-carrossel-3.jpg',
];

// verifica se aconsulta no db esta vazia
if(!empty($res)){
    //no caso de nao esta vem para aqui
    $img1 = $res->img1;
    $img2 = $res->img2;
    $img3 = $res->img3;
    
    // ifs para saber se esta faltando uma img 
    if(empty($res->img1)){
        $img1 = $imagens['img1'];
    }
    if(empty($res->img2)){
        $img2 = $imagens['img2'];
    }
    if(empty($res->img3)){
        $img3 = $imagens['img3'];
    }
}
 //no caso de estar vazio, vem para cá e carrega imgs padrao
 else{
    $img1 = $imagens['img1'];
    $img2 = $imagens['img2'];
    $img3 = $imagens['img3'];
 }


//verifica post para atualizar os dados do carrossel
if (isset($_POST['editar'])){
    //caminho padrao das imagens
    $pasta = '../../../Public/imgs/uploads-carrosel/';

    // verifica se o file esta vazio
    if (!empty($_FILES['img1']['name'])){
        // pegando o arquivo e gerando um novo nome e caminho
        $imagem1 = $_FILES['img1'];
        
        $nome_imagem1 = $imagem1['name'];
        $nova_imagem1 = 'img-carrossel-1';
        $extencao_imagem1 = strtolower(pathinfo($nome_imagem1, PATHINFO_EXTENSION));
        
        // verificando a extencao
        if($extencao_imagem1 != 'png' && $extencao_imagem1 != 'jpg') echo "<script>alert('Arquivo inválido')</script>";
        $caminho_img1 = $pasta . $nova_imagem1. '.'. $extencao_imagem1;
        $upload_img1 = move_uploaded_file($imagem1['tmp_name'], $caminho_img1);
        
        // cadastrando img no db
        $img1 = $caminho_img1;
        $car->img1 = $img1;
    }
    // no de caso de nao ter nenhuma img, ele cadrasta o mesmo caminho
    else {
        $car->img1 = $res->img1;
    }
    
    if (!empty($_FILES['img2']['name'])){
        // pegando o arquivo e gerando um novo nome e caminho
        $imagem2 = $_FILES['img2'];
        
        $nome_imagem2 = $imagem2['name'];
        $nova_imagem2 = 'img-carrossel-2';
        $extencao_imagem2 = strtolower(pathinfo($nome_imagem2, PATHINFO_EXTENSION));
        
        // verificando a extencao
        if($extencao_imagem2 != 'png' && $extencao_imagem2 != 'jpg') echo "<script>alert('Arquivo inválido')</script>";
        $caminho_img2 = $pasta . $nova_imagem2. '.'. $extencao_imagem2;
        $upload_img2 = move_uploaded_file($imagem2['tmp_name'], $caminho_img2);
        
        // cadastrando img no db
        $img2 = $caminho_img2;
        $car->img2 = $img2;
    }else {
        $car->img2 = $res->img2;
    }
    
    if (!empty($_FILES['img3']['name'])){
        // pegando o arquivo e gerando um novo nome e caminho
        $imagem3 = $_FILES['img3'];
    
        $pasta = '../../../Public/imgs/uploads-carrosel/';
        $nome_imagem3 = $imagem3['name'];
        $nova_imagem3 = 'img-carrossel-3';
        $extencao_imagem3 = strtolower(pathinfo($nome_imagem3, PATHINFO_EXTENSION));

        // verificando a extencao
        if($extencao_imagem3 != 'png' && $extencao_imagem3 != 'jpg') echo "<script>alert('Arquivo inválido')</script>";
        $caminho_img3 = $pasta . $nova_imagem3. '.'. $extencao_imagem3;
        $upload_img3 = move_uploaded_file($imagem3['tmp_name'], $caminho_img3);

        // cadastrando img no db
        $img3 = $caminho_img3;
        $car->img3 = $img3;
    }else {
        $car->img3 = $res->img3;
    }

    
    if($car->atualizar()){
        echo "<script>alert('Atualizado com sucesso')</script>";
    }
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
                            <input type="file" name="img2" id="imagens-input" class="input" id="input2">
                
                            <img <?php echo "src='".$img2."'"; ?> alt="Imagem do carrossel 3" id="img2" class="up-img">
                
                            <button class="btn-editar open-modal">
                                <i class="fa-solid fa-pen editar"></i>
                            </button>
                        </label>
                    </div>
                
                    <div class="div-nome">
                        <h1 class="num">Imagem 3</h1>
                        <label class="uploads">
                            <input type="file" name="img3" id="imagens-input" class="input" id="input3">
                
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
