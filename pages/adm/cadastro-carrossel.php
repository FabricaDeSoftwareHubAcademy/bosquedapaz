<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Carrossel</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- link com style padrao da pagina adm -->
    <link rel="stylesheet" href="../../css/css-adm/cadastro-carrossel.css">
    <!-- <link rel="stylesheet" href="../../css/menu-adm.css"> -->
</head>
<body>
    <?php include "../../assets/adm/menu-adm.html"?>

    <!-- inicio da parte principal da pagina -->
    <main class="principal">
        
        <!-- box principal -->
        <div class="box">
            
            <h1 class="titulo">CADASTRAR CARROSSEL</h1>

            <!-- local de uploads de imgs para o carrossel -->
            <section class="up-imgs">

                <div class="uploads">

                    <label class="up" tabindex="0">
                        <input type="file" name="img" id="imagens-input" accept="images/*" class="input-img">
                        <span class="text-up-imgs">
                            <i class="fa-solid fa-upload up-img"></i>
                        </span>
                    </label>

                    <button class="btn-editar open-modal" data-modal="m-nova-img">
                        <i class="fa-solid fa-pen editar"></i>
                    </button>
                </div>
                
                <div class="uploads upload-text">

                    <label class="label-input" tabindex="0">Digite o texto do Carrossel</label>
                    <input type="Text" name="text-car" id="input-text"  class="input-text" placeholder="Digite aqui">
                </div>

                <dialog class="m-nova-img" id="m-nova-img">
                    <?php include "../../assets/modais/m-nova-img-carrossel.html"; ?>
                </dialog>

            </section>

            <!-- botoes parte de baixo -->
            <div class="btns">
                <a href="" class="voltar">
                    <img src="../../imgs/img-cadastro-carrosel/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
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

    <!-- bolas de fundo -->
    <div class="bolas-fundo">
        <img src="../../imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <!-- link do JavaScript -->
    <script src="../../js/js-menu/js-menu.js"></script>
    <script src="../../js/js-adm/js-cadastro-carrossel.js"></script>
    <script src="../../js/js-modais/js-abrir-modal.js"></script>
</body>
</html>