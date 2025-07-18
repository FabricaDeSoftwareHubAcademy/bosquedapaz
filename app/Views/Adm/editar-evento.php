<?php require_once __DIR__ . '/../../../app/helpers/auth.php';?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-editar-evento.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">

</head>

<body>
    <?php include "../../../Public/include/menu-adm.html" ?>


    <main class="principal">
        <div class="box">
            <h1>EDITAR EVENTO</h1>
                <div class="form-box">
                    <form id="form-editar-evento" method="POST" enctype="multipart/form-data">
                        
                        <div id="form1">
                            <input type="hidden" name="id_evento" id="id_evento">

                            <div class="data-imagem">
                                <div class="input-group">
                                    <label>Nome:</label>
                                    <input type="text" name="nomedoevento" id="nomedoevento" required>
                                </div>

                                <div class="input-group">
                                    <label>Subtítulo:</label>
                                    <input type="text" name="subtitulo" id="subtitulo" placeholder="Digite o nome do evento"
                                        required>
                                </div>

                            </div>

                            <div class="input-group">
                                <label>Descrição:</label>
                                <textarea name="descricaodoevento" id="descricaodoevento" placeholder="Digite uma breve descrição do evento (500 caracteres)" rows="5" cols="30" maxlength="250" style="resize: none">></textarea>
                                <small id="contador-caracteres">500 caracteres restantes</small>
                            </div>

                            <div class="data-imagem">
                                <div class="input-group">
                                    <label>Data:</label>
                                    <input type="date" name="dataevento" id="dataevento" required>
                                </div>

                                <div class="input-group">
                                    <label>Hora Início:</label>
                                    <input type="time" name="hora_inicio" id="hora_inicio"
                                        required>
                                </div>

                                <div class="input-group">
                                    <label>Hora Fim:</label>
                                    <input type="time" name="hora_fim" id="hora_fim"
                                        required>
                                </div>

                                <select name="status" id="status">
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>

                            </div>

                            <div class="data-imagem">
                                <div class="input-group">
                                    <label for="select-endereco">Endereço do evento:</label>
                                    <div style="display: flex; gap: 8px;">
                                        <select id="select-endereco" name="endereco" required>
                                        <!-- Opções serão carregadas dinamicamente -->
                                        </select>
                                        <button type="button" id="btn-novo-endereco" title="Adicionar novo endereço">+</button>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label>Imagem:</label>
                                    <input type="file" name="banner" id="file"
                                        >
                                </div>
                            </div>
                            
                            <img class="preview" src="" alt="" id="preview-image">
                        </div>


                        <?php include '../../../Public/include/Butons-forms.html';?>

                    </form>

                    <?php include "../../../Public/include/modais/modal-cadastrar-endereco.html"; ?>
                    <div class="overlay" id="overlay"></div>
                    <?php include "../../../Public/include/modais/modal-Confirmar.html"; ?>
                    <?php include "../../../Public/include/modais/modal-sucesso.html"; ?>
                    <?php include "../../../Public/include/modais/modal-error.html"; ?>
                </div>

                
            </div>
        </div>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/assets/img-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/assets/img-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/assets/img-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/preview-img.js" defer></script>
    <script src="../../../Public/js/js-adm/js-editar-evento.js" defer></script>
    <script src="../../../Public/js/js-adm/js-cadastrar-endereco-evento.js" defer></script>
    <script src="../../../Public/js/js-adm/js-listar-enderecos.js" defer></script>
</body>

</html>