<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adm - Bosque da Paz</title>
        <link rel="stylesheet" href="../../../Public/css/css-adm/style-visualizar-categoria.css" >
        <link rel="stylesheet" href="../Public/assets/adm/menu-adm.html">
        <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
    </head>

    
    
    <body>
   <?php
   include "../../../Public/assets/adm/menu-adm.html";
   ?>
    
    <img class="imagem-enzo-fundo" src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="">
    <img class="imagem-enzo-fundo2" src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="">
    <img class="imagem-enzo-fundo3" src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="">
    <main class="box">
        <h1 class="title">TODAS AS CATEGORIAS</h1>
        <div class="box-item">
            <div class="item">
                <div class="bolota" id="b1">
                    <img src="../../../Public/assets/icons/icones-categorias/Pincel.png" alt="" class="icon-item">
                </div>
                <p>Artesanato</p>
            </div>
            <div class="item">
                <div class="bolota" id="b2">
                    <img src="../../../Public/assets/icons/icones-categorias/Papiro.png" alt="" class="icon-item">
                </div>
                <p>Antiguidade</p>
            </div>
            <div class="item">
                <div class="bolota" id="b3">
                    <img src="../../../Public/assets/icons/icones-categorias/Quadrados.png" alt="" class="icon-item">
                </div>
                <p>Colecionismo</p>
            </div>
            <div class="item">
                <div class="bolota" id="b4">
                    <img src="../../../Public/assets/icons/icones-categorias/Frasco.png" alt="" class="icon-item">
                </div>
                <p>Cosmetologia</p>
            </div>
            <div class="item">
                <div class="bolota" id="b5">
                    <img src="../../../Public/assets/icons/icones-categorias/Frasco.png" alt="" class="icon-item">
                </div>
                <p>Gastronomia</p>
            </div>
            <div class="item">
                <div class="bolota" id="b6">
                    <img src="../../../Public/assets/icons/icones-categorias/Livros.png" alt="" class="icon-item">
                </div>
                <p>Literatura</p>
            </div>
            <div class="item">
                <div class="bolota" id="b7">
                    <img src="../../../Public/assets/icons/icones-categorias/Tesoura.png" alt="" class="icon-item">
                </div>
                <p>Moda Autoral</p>
            </div>
            <div class="item">
                <div class="bolota" id="b8">
                    <img src="../../../Public/assets/icons/icones-categorias/Planta.png" alt="" class="icon-item">
                </div>
                <p>Plantas</p>
            </div>
            <div class="item">
                <div class="bolota" id="b9">
                    <img src="../../../Public/assets/icons/icones-categorias/Reciclar.png" alt="" class="icon-item">
                </div>
                <p>Sustentabilidade</p>
            </div>
                <a href="cadastrar-categoria.php" class="item">
        <div class="bolota" id="b10">
            <img src="../../../Public/assets/icons/icones-categorias/Circulo-mais.png" alt="" class="icon-item">
        </div>
        <p>Nova Categoria</p>
    </a>

    <div class="btns">
            <a href="gerenciar-categorias.php" class="voltar">
            <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
            </a>
        </div> 
    </main>
    <script src="../../js/js-menu/js-menu.js"></script>
</body>

</html>