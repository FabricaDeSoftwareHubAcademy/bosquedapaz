<?php require_once __DIR__ . '/../../../app/helpers/auth.php';?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expositor - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="stylesheet" href="../../../Public/css/css-adm/Area-Adm.css">
    <link rel="icon" href="../../imgs/img-home/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <!-- Menu -->
    <?php include "../../../Public/include/home/menu-expositor.html" ?>

    <!-- Área Principal da Página -->
    <main class="container__main">
        <!-- Box dos Componentes -->
        <div class="container__box">
            <!-- área do titulo -->
            <div class="container__title">
                <h1>Área Do Expositor</h1>
            </div>
            <!-- área dos botões -->
            <div class="container__action__tile">
                <!-- botão -->
                <div class="action__title open-modal"  data-modal="abrir-mais-parceiros">
                    <div class="action__content">
                    <img src="../../../Public/assets/icons/Gerenciar ADM.png" alt="">
                        <p>Perfil</p>
                    </div> 
                </div>

                <!-- Modal Parceiros -->
                <!-- <dialog class="abrir-mais" id="abrir-mais-parceiros">
                    <div class="close-modal" data-modal="abrir-mais-parceiros">
                        <h2>Parceiros</h2>
                        <i id="icon-sair" class="bi bi-x-square-fill"></i>
                    </div>
                    <div class="modais">
                        <a class="link-modais" href="../../../app/Views/Adm/cadastrar-parceiros.php">
                            <div class="action__title open-modal"  data-modal="abrir-mais-parceiros">
                                <div class="action__content">
                                    <img src="../../../Public/assets/icons/Vector Parceiros.png" alt="">
                                    <p>Cadastrar Parceiros</p>
                                </div> 
                             </div>
                        </a>
                        <a class="link-modais" href="../../../app/Views/Adm/listar-parceiros.php">
                            <div class="action__title open-modal"  data-modal="abrir-mais-parceiros">
                                <div class="action__content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#162868" class="bi bi-card-list" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                                    </svg>
                                    <p>Listar Parceiros</p>
                                </div> 
                            </div>
                        </a>
                    </div>
                </dialog> -->


                <!-- botão -->
                <div class="action__title open-modal" data-modal="abrir-mais-expositor">
                    <div class="action__content">
                        <img src="../../../Public/assets/icons/Vector Relatorio.png" alt="">
                        <p>Meus Boletos</p>
                    </div>
                </div>

                <!-- Modal Expositores -->
                <!-- <dialog class="abrir-mais" id="abrir-mais-expositor">
                    <div class="close-modal" data-modal="abrir-mais-expositor">
                        <h2>Expositores</h2>
                        <i id="icon-sair" class="bi bi-x-square-fill"></i>
                    </div>
                    <div class="modais">
                        <a class="link-modais" href="../../../app/Views/Adm/cadastrar-expositor.php">
                            <div class="action__title open-modal" data-modal="abrir-mais-expositor">
                                <div class="action__content">
                                    <img src="../../../Public/assets/icons/Vector Expositores.png" alt="">
                                    <p>Cadastrar Expositores</p>
                                </div>
                            </div>
                        </a>
                        <a class="link-modais" href="../../../app/Views/Adm/lista-de-espera.php">
                            <div class="action__title open-modal" data-modal="abrir-mais-relatorios">
                                <div class="action__content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#162868" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                    <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                                </svg>
                                    <p>Lista de Espera</p>
                                </div>
                            </div>
                        </a>
                        <a class="link-modais" href="../../../app/Views/Adm/listar-expositor.php">
                            <div class="action__title open-modal" data-modal="abrir-mais-expositor">
                                <div class="action__content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#162868" class="bi bi-card-list" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                                    </svg>
                                    <p>Listar Expositores</p>
                                </div> 
                            </div>    
                        </a>
                    </div>
                </dialog> -->
            </div>
        </div>
    </main>

    <!-- Imagens Decorativas  -->
    <div class="decorative__img1"><img src="../../../Public/assets/img-bolas/imagem-superior-esquerdo.svg" alt=""></div>
    <div class="decorative__img2"><img src="../../../Public/assets/img-bolas/imagem-superior-direito.svg" alt=""></div>
    <div class="decorative__img3"><img src="../../../Public/assets/img-bolas/imagem-inferior-direito.svg" alt=""></div>

    <!-- Scripts JS  -->
    <script src="../../../Public/js/js-menu/js-menu-expositor.js"></script>
    <script src="../../../Public/js/js-modais/js-abrir-modal.js"></script>
</body>
</html>

<!-- Matheus Manja -->