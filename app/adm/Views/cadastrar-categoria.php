<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-categorias.css">
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">

</head>

<body>
    <?php
    include "../../../Public/assets/adm/menu-adm.html";
    ?>
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
                    <img src="../../../Public/imgs/cadastro-categorias/roleta.svg" alt="Tabela Cores" class="roleta">
                    <h3>RGB:</h3>
                    <input class="botao-cor" name="cor_sala" type="color">
                </div>
                <div class="separacao">
                    <h3>Icone:</h3>
                    <label for="file" class="custum-file-upload">
                        <div class="icon">
                            <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" fill=""></path>
                                </g>
                            </svg>
                        </div>
                        <div class="text">
                            <span>Selecione a Imagem</span>
                        </div>
                        <input id="file" type="file">
                    </label>
                </div>
                <a href="gerenciar-categorias.php" class="voltar-link">
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
        <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>



    <script src="../../../Public/js/js-menu/js-menu.js" defer></script>
</body>

</html>