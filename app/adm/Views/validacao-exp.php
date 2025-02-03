<?php include "../../../Public/assets/home/menu-home.html"?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <link rel="stylesheet" href="validacaoExp.css">

</head>
<body>
    <div class="box">

        <section class="secao-imagens">
            <div class="imagem-expositor">
                <h1>Foto do Expositor</h1>
                <img src="../../../Public/imgs/img-validacao-expositor/fotoexpositor.png" alt="fotodoexpositor">
            </div>

            <div class="imagens-marca">
                <h1>Imagens da Marca</h1>
                <div class="imagens">
                    <img src="../../../Public/imgs/img-validacao-expositor/fotomarca.png" alt="fotomarca1" id="i1">
                    <img src="../../../Public/imgs/img-validacao-expositor/fotomarca2.png" alt="fotomarca2" id="i2">
                    <img src="../../../Public/imgs/img-validacao-expositor/fotomarca3.png" alt="fotomarca3" id="i3">
                    <img src="../../../Public/imgs/img-validacao-expositor/fotomarca4.png" alt="fotomarca4" id="i4">
                    <img src="../../../Public/imgs/img-validacao-expositor/fotomarca5.png" alt="fotomarca5" id="i5">
                    <img src="../../../Public/imgs/img-validacao-expositor/fotomarca6.png" alt="fotomarca6" id="i6">
                </div>
            </div>
        </section>

        <section class="secao-informacoes">
            <div class="informacoes-expositor">
                <div class="informacoes-titulo">
                    <h1>Validação de Expositor</h1>
                </div>
                <form class="formulario-informacoes">
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

            <div class="informacoes-marca">
                <div class="logo-marca">
                    <img src="../../../Public/imgs/img-validacao-expositor/logomarca.svg" alt="logomarca" id="logomarca">
                </div>
                <form class="formulario-marca">
                    <label>Nome da marca</label>
                    <input type="text" name="campo7" id="campo-7" disabled>
                </form>
            </div>

            <div class="botoes">
                <a href="#modal-validar"><button class="botao-validar" id="BtnValidar">Validar</button></a>
                <a href="#modal-recusar"><button class="botao-recusar" id="btnRecusar">Recusar</button></a>
            </div>
        </section>

    </div>

    <div class="decoracoes">
        <img src="../../../Public/imgs/img-validacao-expositor/voltar.svg" alt="setaVoltar" class="btnVoltar">
        <img src="../../../Public/imgs/img-validacao-expositor/detalhe1.svg" alt="" class="detalhe1">
        <img src="../../../Public/imgs/img-validacao-expositor/detalhe2.svg" alt="" class="detalhe2">
        <img src="../../../Public/imgs/img-validacao-expositor/detalhe3.svg" alt="" class="detalhe3">
    </div>

    <div class="modal-validar" id="modal-validar">
        <div class="modal-content">
            <h1>Deseja validar o expositor?</h1>
            <div class="modal-botoes">
                <a href="#modal-validar-sucesso"><button class="btn-modal btn-validar">Validar</button></a>
                <a href="#"><button class="btn-modal btn-voltar">Voltar</button></a>
            </div>
        </div>
    </div>

    <div class="modal-recusar" id="modal-recusar">
        <div class="modal-content">
            <h1>Deseja recusar o expositor?</h1>
            <div class="modal-botoes">
                <a href="#modal-recusar-sucesso"><button class="btn-modal btn-recusar">Recusar</button></a>
                <a href="#"><button class="btn-modal btn-voltar">Voltar</button></a>
            </div>
        </div>
    </div>

    <div class="modal-validar-sucesso" id="modal-validar-sucesso">
        <div class="modal-content">
            <h1>Validado com sucesso!</h1>
            <div class="modal-botoes">
                <a href="#"><button class="btn-modal btn-ok">Ok</button></a>
            </div>
        </div>
    </div>

    <div class="modal-recusar-sucesso" id="modal-recusar-sucesso">
        <div class="modal-content">
            <h1>Recusado com sucesso!</h1>
            <div class="modal-botoes">
                <a href="#"><button class="btn-modal btn-ok">Ok</button></a>
            </div>
        </div>
    </div>
</body>
</html>