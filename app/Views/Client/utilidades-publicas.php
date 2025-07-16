<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-menu.css">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-utilidades-publicas.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>Bosque da Paz</title>
</head>
<body>

    <!-- Includ do Menu:  -->
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

            <!-- Seta:  -->
            <div class="seta_voltar"><a href="feira-bosque-da-paz.php#edit_pass"><img src="../../../Public/assets/icons/voltar.png" alt=""></a></div>
        </section>
    </main>

    <!-- Modal:  -->
    <dialog id="modal-info" class="custom-modal">
        <div class="modal-wrapper">

            <!-- Botão fechar -->
            <button class="btn-fechar close-modal" data-modal="modal-info"><i class="bi bi-x-circle"></i></button>

            <!-- Imagens decorativas posicionadas -->
            <img src="../../../Public/assets/img-decoracao-ult1.png" alt="Decor 1" class="modal-decor decor-top-left">
            <img src="../../../Public/assets/img-decoracao-ult2.png" alt="Decor 2" class="modal-decor decor-bottom-right">

            <!-- Conteúdo -->
            <div class="modal-content">
                <div class="modal-left">
                    <img src="../../../Public/imgs/primavera.png" alt="Imagem do Evento">
                </div>
                <div class="modal-right">
                    <div class="modal-text-content">
                    <h2>Primavera</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                        Lorem ipsum dolor sit amet consectetur. Fames metus ac egestas turpis ipsum.
                    </p>
                    </div>
                </div>
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

<!-- Matheus Manja  -->