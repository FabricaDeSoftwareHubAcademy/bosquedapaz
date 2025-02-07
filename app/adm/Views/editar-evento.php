<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Eventos</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastro-evento.css">
</head>

<body>
<?php include "../../../Public/assets/adm/menu-adm.html"?>


    <main class="principal">
        <div class="box">
            <h2>EDITAR EVENTOS</h2>
            <div class="form-box">
                <form action="#">
                    <div id="form1">
                        <div class="input-group">
                            <label>Nome do evento:</label>
                            <input type="text" name="nomedoevento" id="nomedoevento" placeholder="Digite o nome do evento"
                                required>
                        </div>
                        <div class="input-group">
                            <label>Data do Evento</label>
                            <input type="date" id="data-inicio" name="data-inicio" value="0000/00/00">
                        </div>
                        <div class="input-group">
                            <label>Descrição do evento:</label>
                            <input type="text" name="descricaodoevento" id="descricaodoevento"
                                placeholder="Digite uma breve descrição do evento" required>
                        </div>
                        
                        
                        <div class="input-group">
                            <label>Imagem do evento:</label>
                            <input type="file" name="file" id="file"
                                required>
                        </div>
                        <img class = "preview" src="" alt="" id="preview-image">
                    </div>
                    <div id="form2">

                        <div class="input-group">
                            <label>Nome da atração:</label>
                            <input type="text" name="descricaodaatracao" id="descricaodaatracao"
                                placeholder="Digite o nome da atração">
                        </div>
                        <div class="input-group">
                            <label>Descrição da atração:</label>
                            <input type="text" name="descricaodaatracao" id="descricaodaatracao"
                                placeholder="Digite uma breve descrição da atração">
                        </div>
                        <div class="input-group">
                            <label>Imagem da atração:</label>
                            <input type="file" name="file" id="file"
                                required>
                        </div>
                        <div class="btn-add">
                            <button class="btn-atracao">
                                <a href="">Adicionar Atração</a>
                        </div>
                        <label id = "tabela">Atrações cadastradas:</label>
                        <table>
                            <tr>
                                <td>Nome da atração</td>
                                
                            </tr>

                        </table>

                        
                        
                        
                    </div>
                </form>
                <!-- <div class="bottoms-box">
                    <div class="bottoms-group">
                        <label>Banner do Evento:</label>
                        <button id="uploadevento"><img id="banner" src="../Images/Upload de imagens.png"
                                alt=""></button>
                        <button class="alterarimagem">ALTERAR IMAGEM</button>
                    </div>
                    <div class="bottoms-group">
                        <label>Banner Atrações:</label>
                        <button id="uploadatracao"><img id="banner" src="../Images/Upload de imagens.png"
                                alt=""></button>
                        <button class="alterarimagem">ALTERAR IMAGEM</button>
                    </div>
                    <div class="bottoms-group">
                        <div class="add-group">
                            <button id="add"> <img src="../Images/Group 442.png" alt=""></button>
                            <button id="add"> <img src="../Images/Group 442.png" alt=""></button>
                            <button id="add"> <img src="../Images/Group 442.png" alt=""></button>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="btns">
                <a href="manage-events.php" class="voltar">
                    <img src="../../../Public/imgs/img-area-contate/seta-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>

                <div class="btn-cancelar-salvar">
                    <button class="btn btn-cancelar">
                        <a href="./Area-Adm.php">Cancelar</a>
                    </button>

                    <button class="btn btn-salvar">
                        <a href="">Salvar</a>
                </div>
            </div>
        </div>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/preview-img.js" defer></script>
</body>

</html>