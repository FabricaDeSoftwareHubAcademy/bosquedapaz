<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Página para gerenciar parceiros e suas informações.">
        <title>Cadastrar Parceiros</title>
        <link rel="stylesheet" href="../../../Public/css/css-adm/cadastrar-parceiros.css"> 
            <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    </head>

    <body>
    <?php include "../../../Public/assets/adm/menu-adm.html"?>
    <main class="principal">
        <div class="box">
            <h2>CADASTRAR PARCEIROS</h2>
            <div class="form-box">
                <form action="#">
                    <div class="input-group">
                        <label>Nome do Parceiro:</label>
                        <input type="text" name="descricao" id="descricao"
                            placeholder="Escreva a descrição da utilidade pública">
                    </div>
                    <div class="input-group">
                        <label>Descrição do Parceiro:</label>
                        <input type="text" name="descricao" id="descricao"
                            placeholder="Escreva a descrição da utilidade pública">
                    </div>
                    <div class="input-group">
                        <label>Escolher Imagem:</label>
                        <input type="file" name="file" id="file"
                            required>
                    </div>
                    <div class="img-parceiro">
                        <label>Logo Atual:</label>
                        <img class="parceiro-img" src="../../../Public/imgs/img-parceiros.css/pref-cg.png" alt="">
                    </div>
                </form>
                
                <div class="vetor">
                    <img src="../../../Public/imgs/img-cadastro-eventos/img-vetor.png" alt="">
                </div>
                <div class="box-img">
                    <img src="../../../Public/imgs/img-parceiros.css/foto-parceiros.png" alt="">
                </div>
            </div>
            <div class="form-box2"></div>
            

            <div class="btns">
                <a href="gerenciar-parceiros.php" class="voltar">
                    <img src="../../../Public/imgs/img-area-contate/seta-voltar.png" class="btn-voltar">
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
                <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="" class="bola-verde1">
                <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="" class="bola-verde2">
                <img src="../../../Public/imgs/imagens-bolas/Elemento3.ElipseRosa.png" alt="" class="bola-rosa">
        </div>

        <script src="../js/main.js"></script>

    </body>
</html>