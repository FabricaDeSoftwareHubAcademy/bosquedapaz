<?php require_once __DIR__ . '/../../../app/helpers/auth.php';?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-expositor.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body onload="getCategorias()">
    <?php include "../../../Public/include/menu-adm.html" ?>

    <main class="principal">

        <div class="box">
            <div class="title">
                <h1 class="title-text">CADASTRO DE EXPOSITORES</h1>
            </div>

            <form id="fomulario_cad_expositor" method="POST">
                <div class="formularios">
                    <div class="form-pessoa">
                        <div class="input">
                            <label>Nome completo:</label>
                            <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo" required>
                        </div>
                        <div class="input">
                            <label>Whatsapp:</label>
                            <input type="tel" name="whats" id="whats" placeholder="Número de whatsapp" oninput="formatWhatsAppNumber(this)">
                        </div>
                        <div class="input">
                            <label>E-mail:</label>
                            <input type="text" name="email" id="email" placeholder="Digite seu e-mail" required>
                        </div>
                        <div class="input">
                            <label>Qual Cidade Reside:</label>
                            <input type="text" name="cidade" id="cidade" placeholder="Digite sua cidade">
                        </div>
                    </div>

                    <div class="form-loja">
                        <div class="input">
                            <label>Produto:</label>
                            <input type="text" name="produto" id="produto" placeholder="Digite seu produto" required>
                        </div>

                        <div class="input">
                            <label>Marca:</label>
                            <input type="text" name="marca" id="marca" placeholder="Digite a marca " required>
                        </div>

                        <div class="input">
                            <label for="optionInput3">Categorias</label>
                            <select name="id_categoria" id="categorias" class="" require>
                                <!-- OPTIONS GERADOS PELO JS -->
                            </select>
                        </div>

                        <div class="input">
                            <label>Link instagram:</label>

                            <input type="text" name="link_instagram" id="link_instagram" placeholder="link instagram" required>
                        </div>
                    </div>

                    <div class="form-expo">
                        <div id="tipo_expo" class="form-group">
                            <label id="expo_label" for="tipo-expo">Tipo de exposição:</label>
                            <select name="tipo" id="tipo_expo" class="select">
                                <option value="">Selecione</option>
                                <option value="trailer">Trailer</option>
                                <option value="food-truck">Food truck</option>
                                <option value="barraca">Barraca</option>
                            </select>
                        </div>

                        <div class="form-group-energia">
                            <label id="energia_label" for="energia">Precisa de energia?</label>
                            <select name="energia" id="energia" class="select">
                                <option value="">Selecione</option>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label id="volt_label" for="equipamentos">Voltagens dos equipamentos</label>
                            <select name="voltagem" id="voltagem" class="select">
                                <option value="">selecione</option>
                                <option value="110v">110v</option>
                                <option value="220v">220v</option>
                            </select>
                        </div>

                        <div class="form-files">
                            <label>Escolha 6 fotos do seu produto para análise:</label>
                            <input type="file" name="imagens[]" id="imagens[]" multiple>
                        </div>
                    </div>

                </div>

                <?php include '../../../Public/include/Butons-forms.html'; ?>

            </form>

            <div class="overlay" id="overlay"></div>
            <?php include "../../../Public/include/modais/modal-confirmar.html"; ?>
            <?php include "../../../Public/include/modais/modal-sucesso.html"; ?>
            <?php include "../../../Public/include/modais/modal-error.html"; ?>

        </div>
    </main>

    <div class="bolas-fundo">

        <img src="../../../Public/assets/img-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/assets/img-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/assets/img-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">

    </div>




    <script src="../../../Public/js/js-menu/js-menu.js" defer></script>
    <script src="../../../Public/js/js-adm/js-cadastrar-expositor.js" defer></script>

</body>

</html>