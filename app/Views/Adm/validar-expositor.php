<?php require_once __DIR__ . '/../../../app/helpers/auth.php';?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bloco principal -->
    <title>Gerenciar Expositor</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-validar-expositor.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bloco principal -->
</head>

<body class="body-validar-expositor">

    <!-- Menu -->
    <?php include "../../../Public/include/menu-adm.html" ?>

    <main class="main-box">
        <!-- Seção de dados da empresa -->
        <section class="secao-dados-empresa">
            <div class="area-superior">
                <h1 class="area-superior-texto" id="nomeEmpresa">Nome da Empresa</h1>
                <img class="area-superior-imagem" src="" id="logoEmapresa">
            </div>
            <div class="area-inferior">
                <h1 class="area-inferior-texto">Produtos</h1>
                <div class="area-inferior-produtos">
                    <!-- <div class="area-produtos">
                        <img class="produtos-imagens produto-imagem1" src="../../../Public/imgs/imgs-validar-expositor/produto1.jpeg" alt="">
                        <img class="produtos-imagens produto-imagem2" src="../../../Public/imgs/imgs-validar-expositor/produto2.jpeg" alt="">
                        <img class="produtos-imagens produto-imagem3" src="../../../Public/imgs/imgs-validar-expositor/produto3.jpeg" alt="">
                    </div>
                    <div class="area-produtos">
                        <img class="produtos-imagens produto-imagem1" src="../../../Public/imgs/imgs-validar-expositor/produto4.jpeg" alt="">
                        <img class="produtos-imagens produto-imagem2" src="../../../Public/imgs/imgs-validar-expositor/produto5.jpeg" alt="">
                        <img class="produtos-imagens produto-imagem3" src="../../../Public/imgs/imgs-validar-expositor/produto6.jpeg" alt="">
                    </div> -->
                </div>
            </div>
        </section>

        <!-- Seção divisão -->
        <section class="secao-divisao">
            <div class="linha-divisao"></div>
        </section>

        <!-- Seção de dados do expositor -->
        <section class="secao-dados-expositor">
            <div class="area-formulario">
                <h1 class="area-formulario-texto">Dados do Expositor</h1>
                <form action="" method="" class="container-formulario-dados" id="">
                    <div class="container-campos">
                        <!-- Campos superior -->
                        <div class="campos-formulario">
                            <label for="">Nome</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" readonly>

                            <label for="">Email</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" readonly>

                            <label for="">Whatsapp</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" readonly>

                            <label for="">Tipo de produto</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" readonly>

                            <label for="">Cidade</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" readonly>

                            <label for="">Instagram</label>
                            <a class="formulario-campo-informacao campo-link"> </a>
                        </div>

                        <!-- Campos inferior -->
                        <div class="campos-formulario">
                            <label for="">Marca</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" readonly>

                            <label for="">Tipo</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" readonly>

                            <label for="">Energia</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" readonly>

                            <label for="">Voltagem</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" readonly>

                            <label for="">Endereço</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" readonly>

                            <label for="">Categoria</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" readonly>
                            <a href="">Alterar Categoria</a>
                        </div>
                    </div>

                    <!-- Area dos botões -->
                    <div class="area-botoes-formulario">
                        <button type="button" class="botoes-formulario botao-recusar" id="botao_recusar">Recusar</button>
                        <button type="button" class="botoes-formulario botao-validar" id="botao_validar">Validar</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <div class="decoracoes">
        <img class="decoracao decoracao1" src="../../../Public/assets/img-bolas/bola-azul1.png" alt="">
        <img class="decoracao decoracao2" src="../../../Public/assets/img-bolas/bola-azul2.png" alt="">
        <img class="decoracao decoracao3" src="../../../Public/assets/img-bolas/bola-azul.png" alt="">
        <a href="../../../app/adm/Views/Area-Adm.php">
            <img class="decoracao botao-voltar" src="../../../Public/imgs/imgs-validar-expositor/botao-voltar-validar-expositor.svg" alt="">
        </a>
    </div>

    <script src="../../../Public/js/js-adm/modal-validar-expositor.js" deffer></script>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
</body>

</html>