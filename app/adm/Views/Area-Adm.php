<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="stylesheet" href="../../../Public/css/css-adm/Area-Adm.css">
    <link rel="icon" href="../../imgs/img-home/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
</head>
<body>

        <!-- Menu -->

        <?php include "../../../Public/assets/adm/menu-adm.html"?>

    <script src="../js/main.js"></script>
    
        <!-- Área Dos Botões -->

    <main class="principal-gabriel">
        
        <div class="box-gabriel">
            <div class="nome-area-gabriel">
                <h1>Área Administrativa</h1>
            </div>

            <div class="seta-voltar-gabriel">
                <a href="../../../Public/tela-login.php">
                <img src="../../../Public/imgs/img-area-adm/Captura de tela 2024-09-25 163826.png" alt="">
                </a>
            </div>

            <div class="area-botao-gabriel">
                <!-- aqui -->
                <div class="Botoes-gabriel open-modal"  data-modal="abrir-mais-parceiros">
                    <div class="area-icon-gabriel">
                        <img src="../../../Public/imgs/img-area-adm/Vector Parceiros.png" alt="">
                        <p>Parceiros</p>
                        <div class="icon-gabriel"></div>
                    </div>
                </div>

            <!-- Modal Parcieros -->

            <dialog class="abrir-mais" id="abrir-mais-parceiros">
                <div class="modais">
                    <p>dfbdfb</p>
                    <p>dfbdfb</p>
                </div>
            </dialog>


            <!-- aqui -->
            <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-expositor">
                <div class="area-icon-gabriel">
                    <img src="../../../Public/imgs/img-area-adm/Vector Expositores.png" alt="">
                    <p>Expositores</p>
                </div>
            </div>

            <!-- Modal Expositores -->
            <dialog class="abrir-mais" id="abrir-mais-expositor">
                <div class="modais">
                    <p>4</p>
                    <p>dfbdfb</p>
                </div>
            </dialog>

            <!-- aqui -->
            <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-relatorios">
                <div class="area-icon-gabriel">
                    <img src="../../../Public/imgs/img-area-adm/Vector Relatorio.png" alt="">
                    <p>Relatórios</p>
                </div>
            </div>

            <!-- Modal Expositores -->
            <dialog class="abrir-mais" id="abrir-mais-relatorios">
                <div class="modais">
                    <p>5</p>
                    <p>dfbdfb</p>
                </div>
            </dialog>

            <!-- aqui -->
            <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-categoria">
                <div class="area-icon-gabriel">
                    <img src="../../../Public/imgs/img-area-adm/Vector Categorias.png" alt="">
                    <p>Categorias</p>
                </div>
            </div>

            <!-- Modal Expositores -->
            <dialog class="abrir-mais" id="abrir-mais-categoria">
                <div class="modais">
                    <p>6</p>
                    <p>dfbdfb</p>
                </div>
            </dialog>


                <a href="editar-carrossel.php">
                <div class="Botoes-gabriel">
                    <div class="area-icon-gabriel">
                        <img src="../../../Public/imgs/img-area-adm/Vector Carrossel.png" alt="">
                        <p>Carrossel</p>
                    </div>
                </div>
                </a>
                <a href="gerenciar-eventos.php">
                <div class="Botoes-gabriel">
                        <div class="area-icon-gabriel">
                            <img src="../../../Public/imgs/img-area-adm/Vector Eventos.png" alt="">
                            <p>Eventos</p>
                        </div>
                    </div>
                </a>
                <a href="index-ctrl.php">
                <div class="Botoes-gabriel">
                    <div class="area-icon-gabriel">
                        <img src="../../../Public/imgs/img-area-adm/Central de Controle.png" alt="">
                        <p>Central Controle </p>
                    </div>
                </div>
                </a>


            <!-- aqui -->
            <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-gerancia">
                <div class="area-icon-gabriel">
                    <img src="../../../Public/imgs/img-area-adm/Gerenciar ADM.png" alt="">
                    <p>Gerenciar ADM</p>
                </div>
            </div>

            <!-- Modal Expositores -->
            <dialog class="abrir-mais" id="abrir-mais-gerancia">
                <div class="modais">
                    <p>8</p>
                    <p>dfbdfb</p>
                </div>
            </dialog>

            </div>

        </div>

    </main>

    <div class="Bola-1-gabriel">
        <img src="../../../Public/imgs/img-area-adm/bola-1.png" alt="">
    </div>

    <div class="Bola-2-gabriel">
        <img src="../../../Public/imgs/img-area-adm/bola-2.png" alt="">
    </div>

    <div class="Bola-3-gabriel">
        <img src="../../../Public/imgs/img-area-adm/bola-3.png" alt="">
    </div>

    <script src="../../../Public/js/js-modais/js-abrir-modal.js"></script>
</body>
</html>