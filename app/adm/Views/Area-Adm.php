<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="stylesheet" href="../../../Public/css/css-adm/Area-Adm.css">
    <link rel="icon" href="../../imgs/img-home/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>

    <!-- Menu -->

    <?php include "../../../Public/assets/adm/menu-adm.html" ?>

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

            <!-- Modal Parceiros -->

            <dialog class="abrir-mais" id="abrir-mais-parceiros">
                <div class="close-modal" data-modal="abrir-mais-parceiros">
                    <h2>Parceiros</h2>
                    <i id="icon-sair" class="bi bi-x-square-fill"></i>
                </div>
                <div class="modais">
                    <a class="link-modais" href="../../../app/adm/Views/cadastrar-parceiros.php">
                    <div class="Botoes-gabriel open-modal"  data-modal="abrir-mais-parceiros">
                        <div class="area-icon-gabriel">
                            <img src="../../../Public/imgs/img-area-adm/Vector Parceiros.png" alt="">
                            <p>Cadastrar Parceiros</p>
                            <div class="icon-gabriel"></div>
                        </div>
                    </div>
                </a>
                <a class="link-modais" href="../../../app/adm/Views/listar-parceiros.php">
                    <div class="Botoes-gabriel open-modal"  data-modal="abrir-mais-parceiros">
                        <div class="area-icon-gabriel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#162868" class="bi bi-card-list" viewBox="0 0 16 16">
                         <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                        </svg>
                            <p>Listar Parceiros</p>
                            <div class="icon-gabriel"></div>
                        </div>
                    </div>
                </a>
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
                <div class="close-modal" data-modal="abrir-mais-expositor">
                    <h2>Expositores</h2>
                    <i id="icon-sair" class="bi bi-x-square-fill"></i>
                </div>
                <div class="modais">
                    <a class="link-modais" href="../../../app/adm/Views/cadastrar-expositor.php">
                        <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-expositor">
                            <div class="area-icon-gabriel">
                                <img src="../../../Public/imgs/img-area-adm/Vector Expositores.png" alt="">
                                <p>Cadastrar Expositores</p>
                            </div>
                        </div>
                    </a>
                    <a class="link-modais" href="../../../app/adm/Views/listar-expositor.php">
                        <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-expositor">
                            <div class="area-icon-gabriel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#162868" class="bi bi-card-list" viewBox="0 0 16 16">
                         <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                        </svg>
                        <p>Listar Expositores</p>
                    </div>
                </div>
                </a>
                </div>
            </dialog>

            <!-- aqui -->
            <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-relatorios">
                <div class="area-icon-gabriel">
                    <img src="../../../Public/imgs/img-area-adm/Vector Relatorio.png" alt="">
                    <p>Relatórios</p>
                </div>
            </div>

            <!-- Modal Relatórios -->
            <dialog class="abrir-mais" id="abrir-mais-relatorios">
                <div class="close-modal" data-modal="abrir-mais-relatorios">
                    <h2>Relatórios</h2>
                    <i id="icon-sair" class="bi bi-x-square-fill"></i>
                </div>
                <div class="modais">
                    <a class="link-modais" href="../../../app/adm/Views/lista-de-espera.php">
                        <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-relatorios">
                            <div class="area-icon-gabriel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#162868" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                            </svg>
                                <p>Lista de Espera</p>
                            </div>
                        </div>
                    </a>
                    <a class="link-modais" href="../../../app/adm/Views/relatorio-expositor.php">
                        <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-relatorios">
                            <div class="area-icon-gabriel">
                                <img src="../../../Public/imgs/img-area-adm/Vector Relatorio.png" alt="">
                    <p>Relatório Expositor</p>
                </div>
            </div>
        </a>
        <a class="link-modais" href="../../../app/adm/Views/listar-adm.php">
            <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-relatorios">
                <div class="area-icon-gabriel">
                    <img src="../../../Public/imgs/img-area-adm/Vector Relatorio.png" alt="">
                    <p>Relatório Usuários</p>
                </div>
            </div>
        </a>
                </div>
            </dialog>

            <!-- aqui -->
            <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-categoria">
                <div class="area-icon-gabriel">
                    <img src="../../../Public/imgs/img-area-adm/Vector Categorias.png" alt="">
                    <p>Categorias</p>
                </div>
            </div>

            <!-- Modal Categorias -->
            <dialog class="abrir-mais" id="abrir-mais-categoria">
                <div class="close-modal" data-modal="abrir-mais-categoria">
                    <h2>Categorias</h2>
                    <i id="icon-sair" class="bi bi-x-square-fill"></i>
                </div>
                <div class="modais">
                    <a class="link-modais" href="../../../app/adm/Views/listar-categorias.php">
                        <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-categoria">
                            <div class="area-icon-gabriel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#162868" class="bi bi-card-list" viewBox="0 0 16 16">
                         <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                        </svg>
                                <p>Listar Categorias</p>
                            </div>
                        </div>
                    </a>
                    <a class="link-modais" href="../../../app/adm/Views/visualizar-categorias.php">
                        <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-categoria">
                            <div class="area-icon-gabriel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#162868" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                            </svg>
                                <p>Visualizar Categorias</p>
                            </div>
                        </div>
                    </a>
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

            <!-- Aqui -->
            <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-evento">
                    <div class="area-icon-gabriel">
                        <img src="../../../Public/imgs/img-area-adm/Vector Eventos.png" alt="">
                        <p>Eventos</p>
                    </div>
                </div>

           <!-- Modal Eventos -->

           <dialog class="abrir-mais" id="abrir-mais-evento">
                <div class="close-modal" data-modal="abrir-mais-evento">
                    <h2>Eventos</h2>
                    <i id="icon-sair" class="bi bi-x-square-fill"></i>
                </div>
                <div class="modais">
                    <a class="link-modais" href="../../../app/adm/Views/cadastrar-evento.php">
                    <div class="Botoes-gabriel">
                        <div class="area-icon-gabriel">
                            <img src="../../../Public/imgs/img-area-adm/Vector Eventos.png" alt="">
                        <p>Cadastrar Eventos</p>
                    </div>
                </div>
                    </a>
                    <a class="link-modais" href="../../../app/adm/Views/gerenciar-eventos.php">
                    <div class="Botoes-gabriel">
                        <div class="area-icon-gabriel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#162868" class="bi bi-card-list" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                            <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                        </svg>
                        <p>Listar Eventos</p>
                    </div>
                </div>
            </a>
            </dialog>


            <a href="grafico-central.php">
                <div class="Botoes-gabriel">
                    <div class="area-icon-gabriel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="85" height="85" fill="#162868" class="bi bi-bar-chart" viewBox="0 0 16 16">
                            <path d="M4 11H2v3h2zm5-4H7v7h2zm5-5v12h-2V2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1z"/>
                        </svg>
                        <p>Financeiro</p>
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

            <!-- Modal ADM -->
            <dialog class="abrir-mais" id="abrir-mais-gerancia">
            <div class="close-modal" data-modal="abrir-mais-gerancia">
                    <h2>Gerenciar ADM</h2>
                    <i id="icon-sair" class="bi bi-x-square-fill"></i>
                </div>
                <div class="modais">
                    <a class="link-modais" href="../../../app/adm/Views/cadastrar-adm.php">
                        <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-gerancia">
                            <div class="area-icon-gabriel">
                                <img src="../../../Public/imgs/img-area-adm/Gerenciar ADM.png" alt="">
                                <p>Cadastrar ADM</p>
                            </div>
                        </div>
                    </a>
                    <a class="link-modais" href="../../../app/adm/Views/listar-adm.php">
                        <div class="Botoes-gabriel open-modal" data-modal="abrir-mais-gerancia">
                            <div class="area-icon-gabriel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#162868" class="bi bi-card-list" viewBox="0 0 16 16">
                         <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                        </svg>
                                <p>Listar ADM</p>
                        </div>
                    </div>
                </a>
            </div>
            </dialog>

            </div>

        </div>

    </main>

    <img class="Bola-1-gabriel" src="../../../Public/imgs/imagens-bolas/imagem-superior-esquerdo.svg" alt="">

    <img class="Bola-2-gabriel" src="../../../Public/imgs/imagens-bolas/imagem-superior-direito.svg" alt="">

    <img class="Bola-3-gabriel" src="../../../Public/imgs/imagens-bolas/imagem-inferior-direito.svg" alt="">

    <script src="../../../Public/js/js-menu/js-menu.js"></script>

    <script src="../../../Public/js/js-modais/js-abrir-modal.js"></script>
</body>

</html>