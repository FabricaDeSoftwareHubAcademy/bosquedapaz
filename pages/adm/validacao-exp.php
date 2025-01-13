<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Expositores</title>
    <link rel="stylesheet" href="../../css/css-adm/style-validacao-exp.css">
</head>
<body>

<?php include "../../assets/adm/menu-adm.html"?>

    <div class="box-ajust-guilherme">
        <div class="box-guilherme">
            <div class="box-content-guilherme">
                <h1>Validação de Expositor</h1>
            </div>
            <div class="foto-expositor-guilherme">
                <h1>Foto do Expositor</h1>
                <img src="../images/fotoexpositor.png" alt="" class="fotoexp-guilherme">
            </div>
            <div class="imagens-content-guilherme">
                <div class="marca-txt-guilherme">
                    <h1>Imagens da Marca</h1>
                </div>
                <div class="foto-marca1-guilherme">
                    <img src="../images/fotomarca.png" alt="">
                    <img src="../images/fotomarca2.png" alt="">
                    <img src="../images/fotomarca3.png" alt="">
                </div>
                <div class="foto-marca2-guilherme">
                    <img src="../images/fotomarca4.png" alt="">
                    <img src="../images/fotomarca5.png" alt="">
                    <img src="../images/fotomarca6.png" alt="">
                </div>
                <div class="voltar-guilherme">
                    <img src="../images/voltar.svg" alt="">
                </div>
            </div>
            <div class="caixa-formulario-guilherme">
                <div class="formulario-guilherme n1-guilherme">
                    <label>Nome Completo:</label>
                    <input type="text" name="" id="" disabled>
                </div>

                <div class="formulario-guilherme n2-guilherme">
                    <label>Categoria dos Produtos:</label>
                    <input type="text" name="" id="" disabled>
                </div>

                <div class="formulario-guilherme n3-guilherme">
                    <label>Cidade de Residência:</label>
                    <input type="text" name="" id="" disabled >
                </div>

                <div class="formulario-marca-guilherme">
                    <div class="formulario-guilherme n4-guilherme">
                        <label>Nome da Marca:</label>
                        <input type="text" name="" id="" disabled>
                    </div>
                    <img src="../images/logomarca.svg" alt="">
                </div>

                <div class="caixa-formulario2-guilherme">
                    <div class="formulario-guilherme n5-guilherme">
                        <label>WhatsApp para Contato:</label>
                        <input type="text" name="" id="" disabled>
                    </div>

                    <div class="formulario-guilherme n6-guilherme">
                        <label>Possui trailer, barraca ou foodtruck? Se sim, Informe a<br>medida exata dele.</label>
                        <input type="text" name="" id="" disabled>
                    </div>

                    <div class="formulario-guilherme n7-guilherme">
                        <label>Precisa de energia para suas vendas Se sim, qual<br>voltagem? (110) (220)</label>
                        <input type="number" name="" id="" disabled>
                    </div>
                </div>
                <div class="linha-guilherme"></div>

                <div class="botoes-guilherme">
                    <a href="#validar-guilherme" class="botao-validar-guilherme">Validar</a>
                    <a href="#rejeitar-guilherme" class="botao-rejeitar-guilherme">Rejeitar</a>
                </div>
                
                <!-- MODAL VALIDAÇÃOOOOOOOOOOOOO -->
                <div id="validar-guilherme" class="modal-guilherme">
                    <div class="modal-content-guilherme">
                        <h2>Deseja confirmar a validação?</h2>
                        <div class="modal-botoes-guilherme">
                            <a href="#validar-sucesso-guilherme" class="botao-confirmar-guilherme">Confirmar</a>
                            <a href="#" class="botao-voltar-guilherme">Voltar</a>
                        </div>
                    </div>
                </div>

                <div id="validar-sucesso-guilherme" class="modal-guilherme">
                    <div class="modal-content-guilherme">
                        <h2>Validação confirmada.</h2>
                        <a href="#" class="botao-fechar-guilherme">Fechar</a>
                    </div>
                </div>
                <!-- MODAL VALIDAÇÃOOOOOOOOOOOOO -->


                <!-- MODAL REIJEIÇÃOOOOOOOOOO -->
                <div id="rejeitar-guilherme" class="modal-guilherme">
                    <div class="modal-content-guilherme">
                        <h2>Deseja confirmar a rejeição?</h2>
                        <div class="modal-botoes-guilherme">
                            <a href="#rejeitar-sucesso-guilherme" class="botao-confirmar-guilherme">Confirmar</a>
                            <a href="#" class="botao-voltar-guilherme">Voltar</a>
                        </div>
                    </div>
                </div>

                <div id="rejeitar-sucesso-guilherme" class="modal-guilherme">
                    <div class="modal-content-guilherme">
                        <h2>Rejeição confirmada.</h2>
                        <a href="#" class="botao-fechar-guilherme">Fechar</a>
                    </div>
                </div>
                <!-- MODAL REIJEIÇÃOOOOOOOOOO -->

            </div>
        </div>
    </div>

    <script src="../js/main.js"></script>
</body>
</html>