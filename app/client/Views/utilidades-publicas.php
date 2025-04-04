<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-utilidades-publicas.css">
    <link rel="stylesheet" href="../../../Public/css/menu-home.css"> 
    <title>Bosque da Paz</title>
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
</head>


<body>
<?php include "../../../Public/assets/home/menu-home.html"; ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../Public/css/css-home/style-utilidades-publicas.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="../../../bosquedapaz/css/styles-home/menu.css"> -->
        <link rel="stylesheet" href="../../../Public/css/css-home/style-menu.css">
        <title>Gerenciar Eventos</title>
    </head>
    
    <body>
        <section class="principal-tela-utl">
        <div class="bola-1">
            <img src="../../../Public/imgs/imagens-utilidades/Bola Nova 1 1 1.png" alt="">
        </div>

        <div class="bola-2">
            <img src="../../../Public/imgs/imagens-utilidades/Bola Nova 2 1 1.png" alt="">
        </div>

        <div class="bola-3">
            <img src="../../../Public/imgs/imagens-utilidades/Bola Nova 3 1.svg" alt="">
        </div>

        <div class="box-principal-utl">
            <h1 id="titulo-ult">Utilidades Públicas</h1>
            <div class="area-cards">

                <div class="cards" id="border-card-azul">
                    <div class="area-img">
                        <div class="dec-img"></div>
                        <div class="img">
                            <img src="../../../Public/imgs/imagens-utilidades/Captura de tela 2025-02-19 140715.png" alt="">
                        </div>
                    </div>
                    <div class="area-button">
                        <h1 id="h1-azul-card">Primavera</h1>
                        <button class="botao-saiba-mais open-modal" id="button-azul-utl" data-modal="abrir-siba-mas">Saiba Mais</button>
                        <div class="dec-button" id="dec-azul-utl"></div>
                        <div class="dec-menor-button" id="dec2-azul-utl"></div>
                        <div class="dec-menor-dentro-button"></div>
                    </div>
                </div>

                <div class="cards">
                    <div class="area-img">
                        <div class="dec-img"></div>
                        <div class="img">
                            <img src="../../../Public/imgs/imagens-utilidades/Captura de tela 2025-02-19 140715.png" alt="">
                        </div>
                    </div>
                    <div class="area-button">
                        <h1 id="h1-rosa-utl">Primavera</h1>
                        <button class="botao-saiba-mais open-modal" data-modal="abrir-siba-mas2">Saiba Mais</button>
                        <div class="dec-button"></div>
                        <div class="dec-menor-button"></div>
                        <div class="dec-menor-dentro-button"></div>
                    </div>
                </div>

                <div class="cards" id="border-card-azul">
                    <div class="area-img">
                        <div class="dec-img"></div>
                        <div class="img">
                            <img src="../../../Public/imgs/imagens-utilidades/Captura de tela 2025-02-19 140715.png" alt="">
                        </div>
                    </div>
                    <div class="area-button">
                        <h1 id="h1-azul-card">Primavera</h1>
                        <button class="botao-saiba-mais open-modal" id="button-azul-utl" data-modal="abrir-siba-mas">Saiba Mais</button>
                        <div class="dec-button" id="dec-azul-utl"></div>
                        <div class="dec-menor-button" id="dec2-azul-utl"></div>
                        <div class="dec-menor-dentro-button"></div>
                    </div>
                </div>

                <div class="cards">
                    <div class="area-img">
                        <div class="dec-img"></div>
                        <div class="img">
                            <img src="../../../Public/imgs/imagens-utilidades/Captura de tela 2025-02-19 140715.png" alt="">
                        </div>
                    </div>
                    <div class="area-button">
                        <h1 id="h1-rosa-utl">Primavera</h1>
                        <button class="botao-saiba-mais open-modal" data-modal="abrir-siba-mas2">Saiba Mais</button>
                        <div class="dec-button"></div>
                        <div class="dec-menor-button"></div>
                        <div class="dec-menor-dentro-button"></div>
                    </div>
                </div>
                
                    <!-- MODAL 1 -->

                <dialog class="dlog-modal-card-ProEv abrir-siba-mas" id="abrir-siba-mas">
                <div class="div-decorativa-modal">
                                <div id="linha-dec1-modal"></div>
                            </div>
                            <div class="div-decorativa2-modal">
                                <div id="linha-dec2-modal"></div>
                                <div id="linha-dec3-modal"></div>
                                <div id="linha-dec4-modal"></div>
                            </div>
                            <div class="div-infs-evento-modal">
                                <div class="areatl-img-modal-ProEv">
                                    <div class="area-img-modal-ProEv">
                                        <img src="../../../Public/imgs/imagens-utilidades/Captura de tela 2025-02-19 140715.png" alt="">
                                    </div>
                                </div>
                                <div class="area-text-modal-ProEv">
                                    <h1 class="title-atracao-modal">Tapioca Forró</h1>
                                    <p class="p-atracao-modal">Lorem ipsum dolor sit amet consectetur. 
                                        Fames metus ac egestas turpis ipsum Lorem 
                                        ipsum dolor sit amet consectetur. Lorem ipsum 
                                        dolor sit amet consectetur. Fames metus ac egestas 
                                        turpis ipsum Lorem ipsum dolor sit amet consectetur.
                                        Lorem ipsum 
                                        dolor sit amet consectetur. Fames metus ac egestas 
                                        turpis ipsum Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                                <button id="b-sari-modal" class="close-modal" data-modal="abrir-siba-mas">
                                    <img src="../../../Public/imgs/Proximos-Eventos-img/arrow-circle-left.png" alt="">
                                </button>
                            </div>
                </dialog>

                    <!-- MODAL 2 -->

                <dialog class="dlog-modal-card-ProEv abrir-siba-mas" id="abrir-siba-mas2">
                <div class="div-decorativa-modal2">
                                <div id="linha-dec1-modal2"></div>
                            </div>
                            <div class="div-decorativa2-modal2">
                                <div id="linha-dec2-modal2"></div>
                                <div id="linha-dec3-modal2"></div>
                                <div id="linha-dec4-modal2"></div>
                            </div>
                            <div class="div-infs-evento-modal2">
                                <div class="areatl-img-modal-ProEv2">
                                    <div class="area-img-modal-ProEv2">
                                        <img src="../../../Public/imgs/imagens-utilidades/Captura de tela 2025-02-19 140715.png" alt="">
                                    </div>
                                </div>
                                <div class="area-text-modal-ProEv2">
                                    <h1 class="title-atracao-modal2">Tapioca Forró</h1>
                                    <p class="p-atracao-modal2">Lorem ipsum dolor sit amet consectetur. 
                                        Fames metus ac egestas turpis ipsum Lorem 
                                        ipsum dolor sit amet consectetur. Lorem ipsum 
                                        dolor sit amet consectetur. Fames metus ac egestas 
                                        turpis ipsum Lorem ipsum dolor sit amet consectetur.
                                        Lorem ipsum 
                                        dolor sit amet consectetur. Fames metus ac egestas 
                                        turpis ipsum Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                                <button id="b-sari-modal" class="close-modal" data-modal="abrir-siba-mas">
                                    <img src="../../../Public/imgs/Proximos-Eventos-img/arrow-circle-left.png" alt="">
                                </button>
                            </div>
                </dialog>

            </div>
            <a id="seta-voltar" href="../../../index.php#voltar-edpass">
                <img src="../../../Public/imgs/Proximos-Eventos-img/arrow-circle-left.png" alt="">
            </a>
        </div>
    </section>

    <script src="../../../Public/js/js-modais/js-abrir-modal.js"></script>
</body>

</html>
</body>
</html>