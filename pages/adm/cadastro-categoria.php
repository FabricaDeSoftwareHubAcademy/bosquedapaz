<?php 
    include "../../assets/adm/menu-adm.html"; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Categorias</title>
    <link rel="stylesheet" href="../../css/css-adm/styles-cadastro-categorias.css">
    <link rel="stylesheet" href="../../css/menu-adm.css">
</head>
<body>
    <main class="principal">
        <div class="box">
            <h1 class="titulo">Cadastro de Categorias</h1>
            <div class="form-box">
                    <div class="tabela">
                        <div class="input-group">
                        </div>
                        <h3>Nome:</h3>
                        <input type="text" name="nome" id="nome" placeholder="Digite o nome da categoria">
                        <h3>Cor da Categoria:</h3>
                        <img src="../../imgs/cadastro-categorias/roleta.svg" alt="Tabela Cores"class="roleta">
                        <h3>Fill:</h3>
                        <input type="text" name="corcat" id="corcat" placeholder="000000">
                    </div>
                <div class="separacao">
                        <h3>Icone:</h3>
                        <div class="fotos">
                            <img src="../../imgs/cadastro-categorias/upload-regular-96.png" alt="Upload" class="upload">
                        </div>
                </div>
                <div class="botoes">
                    <button class="cancelar">Cancelar</button>
                    <button class="salvar">Salvar</button>
                </div>
            </div>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    

    <script src="../../js/js-menu/js-menu.js" defer></script>
</body>
</html>