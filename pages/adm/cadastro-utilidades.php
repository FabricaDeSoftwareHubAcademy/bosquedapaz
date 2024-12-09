<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Utilidade Públicas</title>
    <link rel="stylesheet" href="../../css/css-adm/style-cadastroutilidades.css">
</head>

<body>
<?php include "../../assets/adm/menu-adm.html"?>


    <main class="principal">
        <div class="box">
            <h2>CADASTRO DE UTILIDADES PÚBLICAS</h2>
            <div class="form-box">
                <form action="#">
                    <div class="input-group">
                        <label>Título da utilidade pública:</label>
                        <input type="text" name="titulo" id="titulo"
                            placeholder="Escreva o título da utilidade pública">
                    </div>
                    <div class="input-group">
                        <label>Descrição da utilidade pública:</label>
                        <input type="text" name="descricao" id="descricao"
                            placeholder="Escreva a descrição da utilidade pública">
                    </div>
                    <div class="input-group">
                        <label>Data início</label>
                        <input type="date" id="data-inicio" name="data-inicio" value="0000/00/00">
                    </div>
                    <div class="input-group">
                        <label>Data fim</label>
                        <input type="date" id="data-fim" name="data-fim" value="0000/00/00">
                    </div>
                    <div class="input-group">
                        <label>Imagem da atração:</label>
                        <input type="file" name="file" id="file"
                            required>
                    </div>
                </form>
                
                <div class="vetor">
                    <img src="../../imgs/img-cadastro-eventos/img-vetor.png" alt="">
                </div>
                <div class="box-img">
                    <img src="../../imgs/img-cadastro-eventos/img-edicao-utilidade.png" alt="">
                </div>
            </div>
            <div class="form-box2"></div>
            

            <div class="btns">
                <a href="" class="voltar">
                    <img src="../../imgs/img-area-contate/seta-voltar.png" class="btn-voltar">
                </a>

                <div class="btn-cancelar-salvar">
                    <button class="btn btn-cancelar">
                        <a href="">Cancelar</a>
                    </button>

                    <button class="btn btn-salvar">
                        <a href="">Salvar</a>
                </div>
            </div>
        </div>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../js/js-menu/js-menu.js"></script>
</body>

</html>