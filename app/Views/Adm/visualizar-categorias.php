<?php require_once __DIR__ . '/../../../app/helpers/auth.php';?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-categorias.css">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-visualizar-categoria.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <script src="../../../Public/js/js-adm/js-cadastro-categoria.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class="corpo">
    <?php include "../../../Public/include/menu-adm.html" ?>

    <img class="imagem-enzo-fundo" src="../../../Public/assets/img-bolas/bola-verde1.png" alt="B1">
    <img class="imagem-enzo-fundo2" src="../../../Public/assets/img-bolas/bola-rosa.png" alt="B2">
    <img class="imagem-enzo-fundo3" src="../../../Public/assets/img-bolas/bola-verde2.png" alt="B3">
    <main class="principal">
        <div class="box">
            <h1 class="title">TODAS AS CATEGORIAS</h1>
            <div class="box-item">
                <div id="lista-categoria">
                </div>

                <!-- <div class="item open-modal" data-modal="cadastro-categoria">
                    <div class="bolota" id="b10">
                        <img src="../../../Public/assets/icons/icones-categorias/Circulo-mais.png" alt="Adicionar nova categoria" class="icon-item">
                    </div>
                    <p class="nome-cat">Nova Categoria</p>
                </div> -->

                <dialog class="dialog-categoria" id="cadastro-categoria">
                    <div class="dialog-categoria-content">
                        <span class="dialog-close close-modal" data-modal="cadastro-categoria">&times;</span>
                        <h1 class="dialog-titulo">Cadastrar Categoria</h1>
                        <form id="form_categoria" action="../../../actionsADM/cadastro-categoria.php" method="post" enctype="multipart/form-data">
                            <div class="dialog-form-box">
                                <h3>Nome:</h3>
                                <input class="nome-cat" type="text" name="descricao" id="nome" placeholder="Digite o nome da categoria">
                                <h3>Cor:</h3>
                                <div class="custom-select">
                                    <div class="select-selected" id="openModal">
                                        <div class="color-preview" id="selectedColor"></div>
                                        <span id="selectedText">Selecione uma cor</span>
                                    </div>
                                    <div id="seletor-cor" class="select-items">
                                        <div data-value="rgba(13, 72, 161, 0.30)">
                                            <div class="color-preview" style="background-color: rgba(13, 72, 161, 0.30);"></div> Cor 1
                                        </div>
                                        <div data-value="rgba(255, 183, 0, 0.30)">
                                            <div class="color-preview" style="background-color: rgba(255, 183, 0, 0.30);"></div> Cor 2
                                        </div>
                                        <div data-value="rgba(113, 9, 183, 0.30)">
                                            <div class="color-preview" style="background-color: rgba(113, 9, 183, 0.30);"></div> Cor 3
                                        </div>
                                        <div data-value="rgba(217, 3, 103, 0.30)">
                                            <div class="color-preview" style="background-color: rgba(217, 3, 103, 0.30);"></div> Cor 4
                                        </div>
                                        <div data-value="rgba(23, 128, 118, 0.30)">
                                            <div class="color-preview" style="background-color: rgba(23, 128, 118, 0.30);"></div> Cor 5
                                        </div>
                                        <div data-value="rgba(251, 84, 7, 0.30)">
                                            <div class="color-preview" style="background-color: rgba(251, 84, 7, 0.30);"></div> Cor 6
                                        </div>
                                        <div data-value="rgba(25, 169, 78, 0.3)">
                                            <div class="color-preview" style="background-color: rgba(25, 169, 78, 0.3);"></div> Cor 7
                                        </div>
                                        <div data-value="rgba(108, 88, 76, 0.30)">
                                            <div class="color-preview" style="background-color: rgba(108, 88, 76, 0.30);"></div> Cor 8
                                        </div>
                                        <div data-value="rgba(17, 112, 96, 0.3)">
                                            <div class="color-preview" style="background-color: rgba(17, 112, 96, 0.3);"></div> Cor 9
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="cor" id="corInput" required>
                                <h3 class="titulo-modal">Ícone:</h3>
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
                                        <span style="color:grey">Selecione a Imagem</span>
                                    </div>
                                    <input id="file" type="file" name="icone" style="display: none;">
                                </label>
                                <div class="dialog-botoes">
                                    <button type="button" class="dialog-cancelar" onclick="document.getElementById('cadastro-categoria').close()">Cancelar</button>
                                    <button type="submit" id="btn_cadastrar_cat" class="dialog-salvar">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </dialog>
            </div>
            <div class="btns">
                <a href="./" class="voltar">
                    <img src="../../../Public/assets/icons/voltar.svg" alt="Botão de voltar" class="btn-voltar">
                </a>
            </div>
        </div>
    </main>
    <script src="../../../Public/js/js-modais/js-abrir-modal.js"></script>
    <script src="../js/main.js"></script>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/js-visualizar-categoria.js" defer></script>
    <script src="../../../Public/js/js-modais/js-modal-confirmar.js" defer></script>
    <script src="../../../Public/js/js-modais/js-modal-sucesso.js"></script>
    <script src="../../../Public/js/js-modais/js-modal-deletar.js"></script>
    <?php include '../../../Public/include/modais/modal-confirmar.html'; ?>
    <?php include '../../../Public/include/modais/modal-sucesso.html'; ?>
    <?php include '../../../Public/include/modais/modal-error.html'; ?>
</body>

</html>