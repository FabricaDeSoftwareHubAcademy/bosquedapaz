<?php include "../../../Public/assets/adm/menu-adm.html"?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Validação de Expositor</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-validacao-expositor.css">

</head>
<body>
    <div class="box-guilherme">

        <section class="secao-imagens-guilherme">
            <div class="imagem-expositor-guilherme">
                <h1>Foto do Expositor</h1>
                <img src="../../../Public/imgs/img-validacao-expositor/fotoexpositor.png" alt="fotodoexpositor">
            </div>

            <div class="imagens-marca-guilherme">
                <h1>Imagens da Marca</h1>
                <div class="imagens-guilherme">
                    <img src="../../../Public/imgs/img-validacao-expositor/fotomarca.png" alt="fotomarca1" id="i1-guilherme">
                    <img src="../../../Public/imgs/img-validacao-expositor/fotomarca2.png" alt="fotomarca2" id="i2-guilherme">
                    <img src="../../../Public/imgs/img-validacao-expositor/fotomarca3.png" alt="fotomarca3" id="i3-guilherme">
                    <img src="../../../Public/imgs/img-validacao-expositor/fotomarca4.png" alt="fotomarca4" id="i4-guilherme">
                    <img src="../../../Public/imgs/img-validacao-expositor/fotomarca5.png" alt="fotomarca5" id="i5-guilherme">
                    <img src="../../../Public/imgs/img-validacao-expositor/fotomarca6.png" alt="fotomarca6" id="i6-guilherme">
                </div>
            </div>
        </section>

        <section class="secao-informacoes-guilherme">
            <div class="informacoes-expositor-guilherme">
                <div class="informacoes-titulo-guilherme">
                    <h1>Validação de Expositor</h1>
                </div>
                <form class="formulario-informacoes-guilherme">
                    <div>
                        <label>Nome completo do expositor</label>
                        <input type="text" name="campo1" id="campo-1" disabled>

                        <label>Categoria dos produtos</label>
                        <input type="text" name="campo2" id="campo-2" disabled>
                        
                        <label>Precisa de energia? Caso afirmativo, voltagem 110 ou 220? Caso negativo, deixe em branco.</label>
                        <input type="text" name="campo6" id="campo-6" disabled>
                    </div>
                    
                    <div>
                        <label>WhatsApp para contato</label>
                        <input type="text" name="campo4" id="campo-4" disabled>

                        <label>Cidade de residência</label>
                        <input type="text" name="campo3" id="campo-3" disabled>

                        <label>Possui trailer, barraca ou foodtruck? Se sim, informe as medidas. Caso negativo, deixe em branco.</label>
                        <input type="text" name="campo5" id="campo-5" disabled>
                    </div>
                </form>
            </div>

            <div class="informacoes-marca-guilherme">
                <div class="logo-marca-guilherme">
                    <img src="../../../Public/imgs/img-validacao-expositor/logomarca.svg" alt="logomarca" id="logomarca-guilherme">
                </div>
                <form class="formulario-marca-guilherme">
                    <label>Nome da marca</label>
                    <input type="text" name="campo7" id="campo-7" disabled>
                </form>
            </div>

            <div class="botoes-guilherme">
                <a href="#modal-recusar-guilherme"><button class="botao-recusar-guilherme" id="btnRecusar-guilherme">Recusar</button></a>
                <a href="#modal-validar-guilherme"><button class="botao-validar-guilherme" id="BtnValidar-guilherme">Validar</button></a>
            </div>
        </section>

    </div>

    <div class="decoracoes-guilherme">
        <a href="gerenciar-relatorios.php">
        <img src="../../../Public/imgs/img-validacao-expositor/voltar.svg" alt="setaVoltar" class="btnVoltar-guilherme">
        </a>
        <img src="../../../Public/imgs/img-validacao-expositor/detalhe1.svg" alt="" class="detalhe1">
        <img src="../../../Public/imgs/img-validacao-expositor/detalhe2.svg" alt="" class="detalhe2">
        <img src="../../../Public/imgs/img-validacao-expositor/detalhe3.svg" alt="" class="detalhe3">
    </div>

    <div class="modal-validar-guilherme" id="modal-validar-guilherme">
        <div class="modal-content-guilherme">
            <h1>Deseja validar o expositor?</h1>
            <div class="modal-botoes-guilherme">
                <a href="#modal-validar-sucesso-guilherme"><button class="btn-modal-guilherme btn-validar-guilherme">Validar</button></a>
                <a href="#"><button class="btn-modal-guilherme btn-voltar-guilherme">Voltar</button></a>
            </div>
        </div>
    </div>

    <div class="modal-recusar-guilherme" id="modal-recusar-guilherme">
        <div class="modal-content-guilherme">
            <h1>Deseja recusar o expositor?</h1>
            <div class="modal-botoes-guilherme">
                <a href="#modal-recusar-sucesso-guilherme"><button class="btn-modal-guilherme btn-recusar-guilherme">Recusar</button></a>
                <a href="#"><button class="btn-modal-guilherme btn-voltar-guilherme">Voltar</button></a>
            </div>
        </div>
    </div>

    <div class="modal-validar-sucesso-guilherme" id="modal-validar-sucesso-guilherme">
        <div class="modal-content-guilherme">
            <h1>Validado com sucesso!</h1>
            <div class="modal-botoes-guilherme">
                <a href="#"><button class="btn-modal-guilherme btn-ok-guilherme">Ok</button></a>
            </div>
        </div>
    </div>

    <div class="modal-recusar-sucesso-guilherme" id="modal-recusar-sucesso-guilherme">
        <div class="modal-content-guilherme">
            <h1>Recusado com sucesso!</h1>
            <div class="modal-botoes-guilherme">
                <a href="#"><button class="btn-modal-guilherme btn-ok-guilherme">Ok</button></a>
            </div>
        </div>
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
</body>
</html>