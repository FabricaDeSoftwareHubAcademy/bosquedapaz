<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categorias</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-editar-categorias.css">
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >

</head>
<body>
<?php 
    include "../../../Public/assets/adm/menu-adm.html"; 
?>

    <main class="principal">
        <div class="box">
            <h1 class="titulo">EDIÇÃO DE CATEGORIAS</h1>
            <div class="form-box">
                    <div class="tabela">
                        <!-- <div class="input-group">
                        </div> -->
                        <h3>Nome:</h3>
                        <input type="text" name="nome" id="nome" placeholder="Digite o nome da categoria">
                        <h3>Cor da Categoria:</h3>
                        <img src="../../../Public/imgs/editar-categorias/roleta.svg" alt="Tabela Cores"class="roleta">
                        <h3>Fill:</h3>
                        <input type="text" name="corcat" id="corcat" placeholder="000000">
                    </div>
                <div class="separacao">
                        <h3>Icone:</h3>
                        <div class="fotos">
                            <img src="../../../Public/imgs/editar-categorias/upload-regular-96.png" alt="Upload" class="upload">
                        </div>
                </div>
                <div class="img-boneco">
                    <img src="../../../Public/imgs/editar-categorias/Instagram 1.svg" alt="">
                </div>
                <a href="listar-categorias.php" class="voltar-link">
                    <div class="b-voltar">
                    <button class="voltar">
                            <img src="../../../Public/imgs/img-area-contate/seta-voltar.png" class="btn-voltar">
                        </button>
                    </div>
                </a>
                <div class="botoes">
                    <button class="cancelar">Cancelar</button>
                    <button class="salvar">Salvar</button>
                </div>
            </div>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/imgs/imagens-bolas/bola azul1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola azul2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    

    <script src="../../../Public/js/js-menu/js-menu.js" defer></script>
</body>
</html>