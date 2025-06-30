<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-menu.css">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-utilidades-publicas.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
<?php include "../../../Public/include/home/menu-home.html" ?>

    <main>
        <section class="container__box">
            <div class="titulo"><h1>Utilidades Publicas</h1></div>
            
            <div class="conteiner__cards">
                <div class="card">
                    <div class="por-cima-card">
                        <div class="parte-superior">
                            <img class="img-ult" src="../../../Public/imgs/primavera.png" alt="">
                        </div>
                        <div class="parte-inferior">
                            <h1 class="nome-card">Nome</h1>
                            <button class="meu-botao open-modal" data-modal="modal-info">Saiba Mais</button>
                            <div class="linha-decorativa-1"></div>
                            <div class="container__decorativo">
                                <div class="linha-decorativa-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="por-cima-card">
                        <div class="parte-superior">
                            <img class="img-ult" src="../../../Public/imgs/primavera.png" alt="">
                        </div>
                        <div class="parte-inferior">
                            <h1 class="nome-card">Nome</h1>
                            <button class="meu-botao open-modal" data-modal="modal-info">Saiba Mais</button>
                            <div class="linha-decorativa-1"></div>
                            <div class="container__decorativo">
                                <div class="linha-decorativa-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="por-cima-card">
                        <div class="parte-superior">
                            <img class="img-ult" src="../../../Public/imgs/primavera.png" alt="">
                        </div>
                        <div class="parte-inferior">
                            <h1 class="nome-card">Nome</h1>
                            <button class="meu-botao open-modal" data-modal="modal-info">Saiba Mais</button>
                            <div class="linha-decorativa-1"></div>
                            <div class="container__decorativo">
                                <div class="linha-decorativa-2"></div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="por-cima-card">
                        <div class="parte-superior">
                            <img class="img-ult" src="../../../Public/imgs/primavera.png" alt="">
                        </div>
                        <div class="parte-inferior">
                            <h1 class="nome-card">Nome</h1>
                            <button class="meu-botao open-modal" data-modal="modal-info">Saiba Mais</button>
                            <div class="linha-decorativa-1"></div>
                            <div class="container__decorativo">
                                <div class="linha-decorativa-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal:  -->
    <dialog id="modal-info" class="custom-modal">
        <div class="modal-content-decorated">

            <!-- Decoração: Bolas -->
            <div class="modal-ball ball1"></div>
            <div class="modal-ball ball2"></div>

            <!-- Decoração: Linha Diagonal -->
            <div class="modal-diagonal"></div>

            <!-- Imagem à esquerda -->
            <div class="modal-img">
            <img src="../../../Public/imgs/primavera.png" alt="Imagem Modal">
            </div>

            <!-- Texto à direita -->
            <div class="modal-text">
            <h2>Título Decorado</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus sem ut nisi 
                pulvinar, nec euismod tortor bibendum. Vivamus in ex libero. Morbi iaculis 
                facilisis dui non sodales. <br><br>
                (Role o texto para ver o scroll funcionando)
            </p>
            <button class="close-modal" data-modal="modal-info">Fechar</button>
            </div>
        </div>
    </dialog>

    <!-- Imagens Decorativas  -->
    <div class="decorative__img1"><img src="../../../Public/assets/img-bolas/bola-ult1.png" alt=""></div>
    <div class="decorative__img2"><img src="../../../Public/assets/img-bolas/bola-ult2.png" alt=""></div>
    <div class="decorative__img3"><img src="../../../Public/assets/img-bolas/bola-rosa.png" alt=""></div>

    <script src="../../../Public/js/js-modais/modal-utilidades-publi.js"></script>

</body>
</html>