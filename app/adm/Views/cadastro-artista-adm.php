<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosque da paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-artistas.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="../Public/js/js-adm/js-cadastro-expositor.js"></script>

</head>

<body>
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>


    <main class="principal">

        <div class="box">

            <div class="title">
                <h1 class="title-text">CADASTRO DE ARTISTAS</h1>
            </div>

            <form class="formularios">

                <div class="form-pessoa">
                    <div class="input">
                        <label>Nome completo:</label>
                        <input type="text" name="" id="" placeholder="Digite seu nome completo" required>
                    </div>
                    <div class="input">
                        <label>Nome artistico:</label>
                        <input type="text" name="" id="" placeholder="Digite seu nome artistico " required>
                    </div>

                    <div class="input">
                        <label>E-mail:</label>
                        <input type="text" name="" id="" placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="input">
                        <label>Whatsapp:</label>
                        <input type="text" name="" id="" placeholder="Número de whatsapp" required>
                    </div>

                    <div class="input">
                        <label>Link:</label>
                        <input type="text" name="" id="" placeholder="link instagram" required>
                    </div>


                </div>


                <div class="form-expo">


                    <div class="input">
                        <label>Qual sua linguagem artística?</label>
                        <select name="todas_categorias" id="todas_categorias" class="select">
                            <option value="">Selecione</option>
                            <option value="teatro">Teatro</option>
                            <option value="danca">Dança</option>
                            <option value="circo">Circo</option>
                            <option value="musica">Música</option>
                        </select>
                    </div>


                    <div id="estilo_musica_container">
                        <label>Qual o estilo de música você segue?</label>
                        <select name="estilo_musica" id="estilo_musica" class="select">
                            <option value="">Selecione</option>
                            <option value="rock">Rock</option>
                            <option value="pop">Pop</option>
                            <option value="sertanejo">Sertanejo</option>
                            <option value="eletronica">Eletrônica</option>
                        </select>
                    </div>



                    <div class="input">
                        <label for="optionInput3">Qual seu publico alvo?</label>

                        <select name="todas_categorias" id="todas_categorias" class="select">

                            <option value="">selecione</option>
                            <option value="artesanato">Adulto</option>
                            <option value="gastronia">Infantil</option>
                            <option value="antiguidade">Misto</option>

                        </select>



                    </div>





                    <label for="tipo-expo">Tempo médio da sua apresentação?</label>
                    <div class="custom-dropdown">
                        <!-- <input type="text" id="tipo-expo" name="tipo-expo" placeholder="Selecione" autocomplete="off"> -->
                        <select name="todas_categorias" id="todas_categorias" class="select">

                            <option value="">selecione</option>
                            <option value="trailer">30min</option>
                            <option value="food-truck">50min</option>
                            <option value="barrca">60min</option>

                        </select>
                    </div>

                    <label for="energia">Qual valor do cache?</label>
                    <div class="custom-dropdown">
                        <select name="todas_categorias" id="todas_categorias" class="select">

                            <option value="">selecione</option>
                            <option value="sim">Até R$200</option>
                            <option value="nao">Até R$500</option>
                            <option value="nao">Até R$1.000</option>


                        </select>
                    </div>

                </div>

            </form>

            <form action="" method="post" class="finalizar">
                <div class="btn-finalizar">
                    <button class="btn btn-cancelar"><a href="">cancelar</a></button>
                    <button class="btn btn-salvar"><a href="">salvar</a></button>
                </div>
            </form>

            <div class="btns">
                <a href="Area-Adm.php" class="voltar">
                    <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>
            </div>
            
        </div>
        
    </main>

    <div class="bolas-fundo">

        <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-modais/modal-cadastro-expositor"></script>


</body>

</html>