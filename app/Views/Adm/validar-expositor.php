<?php require_once __DIR__ . '/../../../app/helpers/auth.php';?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bloco principal -->
    <title>Adm - Bosque da Paz</title>
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
            </div>
            <div class="area-inferior-produtos" id="areaFotos">
                    
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
                            <input type="text" name="" id="nome" class="formulario-campo-informacao" readonly>

                            <label for="">Email</label>
                            <input type="text" name="" id="email" class="formulario-campo-informacao" readonly>

                            <label for="">Whatsapp</label>
                            <input type="text" name="" id="whats" class="formulario-campo-informacao" readonly>

                            <label for="">Produto</label>
                            <input type="text" name="" id="produto" class="formulario-campo-informacao" readonly>

                            <label for="">Cidade</label>
                            <input type="text" name="" id="cidade" class="formulario-campo-informacao" readonly>

                        </div>
                        
                        <!-- Campos inferior -->
                        <div class="campos-formulario">
                            
                            <label for="">Tipo de exposição</label>
                            <input type="text" name="" id="exposicao" class="formulario-campo-informacao" readonly>
                            
                            <label for="">Energia</label>
                            <input type="text" name="" id="energia" class="formulario-campo-informacao" readonly>
                            
                            <label for="">Voltagem</label>
                            <input type="text" name="" id="voltagem" class="formulario-campo-informacao" readonly>
                            
                            <label for="">Instagram</label>
                            <a class="formulario-campo-informacao campo-link" target="_blank" id="intagram"> </a>
                            
                            <label for="">Categoria</label>
                            <select name="categoria" id="categoria" class="formulario-campo-informacao"></select>
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
    
    <?php include "../../../Public/include/modais/modal-confirmar.html"; ?>
    <?php include "../../../Public/include/modais/modal_carregando.html"; ?>
    <?php include "../../../Public/include/modais/modal-sucesso.html"; ?>
    <?php include "../../../Public/include/modais/modal-error.html"; ?>

    <dialog id="recusarExpositor" class="modal-recusar">
        <div class="conteiner-modal">
            <label class="title-recusar">Digite o motivo: </label>
            <textarea name="mensagem" id="MotivoRecusa" class="textModal" placeholder="Digite aqui"></textarea>
            <div class="content-btns">  
                <button type="button" class="btn-modal-confirmar btn-validar-cancelar" id="btn-recusar-cancelar">Cancelar</button>
                <button class="btn-modal-confirmar btn-validar-salvar" id="btn-recusar-salvar">Salvar</button>
            </div>
        </div>
    </dialog>

    <dialog id="BarracaRua" class="modal-recusar">
        <div class="conteiner-modal">
            <label class="title-recusar">Numero da barraca: </label>
            <input type="number" name="num_barraca" class="input" id="numBarraca">
            <label class="title-recusar">Cor da rua: </label>
            <select name="cor_rua" class="input" id="corRua">
                <option value="verde">verde</option>
                <option value="azul">azul</option>
                <option value="amarelo">amarelo</option>
                <option value="laranja">laranja</option>
                <option value="rosa">rosa</option>
            </select>
            <div class="content-btns">  
                <button type="button" class="btn-modal-confirmar btn-validar-cancelar" id="btn-BarracaRua-cancelar">Cancelar</button>
                <button class="btn-modal-confirmar btn-validar-salvar" id="btn-BarracaRua-salvar">Salvar</button>
            </div>
        </div>
    </dialog>

    <div class="decoracoes">
        <img class="decoracao decoracao1" src="../../../Public/assets/img-bolas/bola-azul1.png" alt="">
        <img class="decoracao decoracao2" src="../../../Public/assets/img-bolas/bola-azul2.png" alt="">
        <img class="decoracao decoracao3" src="../../../Public/assets/img-bolas/bola-azul.png" alt="">
    </div>

    <script src="../../../Public/js/js-adm/js-validar-expositor.js" deffer></script>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
</body>

</html>