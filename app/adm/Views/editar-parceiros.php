<?php include "../../../Public/assets/adm/menu-adm.html"?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Página para gerenciar parceiros e suas informações.">
        <title>Editar Parceiros</title>
        <link rel="stylesheet" href="../../../Public/css/css-adm/editar-parceiros.css"> 
            <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    </head>

    <body>
        <main class="principal">
            <div class="box">
                <h1 class="tela-titulo">EDITAR PARCEIROS</h1>
                <div class="geral">
                    <div class="ec">
                        <div class="lado-esquerdo">                       
                            <img src="../../../Public/imgs/img-parceiros.css/pref-cg.png" alt="Card Um" class="img-pref">
                            <h3 class="descrição-palavra">Descrição:<span class="opcional-palavra">(opcional)</span></h3>
                            <input class="descrição" type="text">
                        </div>
                        
                        <div class="meio-centro">                      
                            <h3 class="logo-palavra">Logo:</h3>
                            <img src="../../../Public/imgs/img-parceiros.css/editar-imagem.png" alt="Editar Imagem" class="editar-imagem">                     
                        </div>
                    </div>
                </div>
                        
                <div class="imagens-esquerda">                     
                    <img src="../../../Public/imgs/img-parceiros.css/linha-central.png" alt="Linha Central" class="linha-central">      
                    <img src="../../../Public/imgs/img-parceiros.css/foto-parceiros.png" alt="Imagem Parceiros" class="imagem-parceiros">                      
                </div>
            
                <div class="botoes">
                    <button class="btn-default-cancelar">
                        CANCELAR
                    </button>
                    <button class="btn-default-salvar">
                        SALVAR
                    </button>                
                </div>
            </div>
        </main>

        <div class="bolas-fundo">
                <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="" class="bola-verde1">
                <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="" class="bola-verde2">
                <img src="../../../Public/imgs/imagens-bolas/Elemento3.ElipseRosa.png" alt="" class="bola-rosa">
        </div>

        <script src="../js/main.js"></script>

    </body>
</html>