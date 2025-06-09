<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
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
                <h1>Área Administrativa</h1>
            </div>
            <!-- área dos botões -->
            <div class="container__action__tile">
                <!-- botão -->
                <div class="action__title open-modal"  data-modal="abrir-mais-parceiros">
                    <div class="action__content">
                        <img src="../../../Public/imgs/img-area-adm/Vector Parceiros.png" alt="">
                        <p>Parceiros</p>
                    </div> 
                </div>

                <!-- Modal Parceiros -->
                <dialog class="abrir-mais" id="abrir-mais-parceiros">
                    <div class="close-modal" data-modal="abrir-mais-parceiros">
                        <h2>Parceiros</h2>
                        <i id="icon-sair" class="bi bi-x-square-fill"></i>
                    </div>
                    <div class="modais">
                        <a class="link-modais" href="../../../app/Views/Adm/cadastrar-parceiros.php">
                            <div class="action__title open-modal"  data-modal="abrir-mais-parceiros">
                                <div class="action__content">
                                    <img src="../../../Public/imgs/img-area-adm/Vector Parceiros.png" alt="">
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
                </dialog>


                <!-- botão -->
                <div class="action__title open-modal" data-modal="abrir-mais-expositor">
                    <div class="action__content">
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
                        <a class="link-modais" href="../../../app/Views/Adm/cadastrar-expositor.php">
                            <div class="action__title open-modal" data-modal="abrir-mais-expositor">
                                <div class="action__content">
                                    <img src="../../../Public/imgs/img-area-adm/Vector Expositores.png" alt="">
                                    <p>Cadastrar Expositores</p>
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
                </dialog>

                <!-- botão -->
                <div class="action__title open-modal" data-modal="abrir-mais-relatorios">
                    <div class="action__content">
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
                        <a class="link-modais" href="../../../app/Views/Adm/relatorio-expositor.php">
                            <div class="action__title open-modal" data-modal="abrir-mais-relatorios">
                                <div class="action__content">
                                    <img src="../../../Public/imgs/img-area-adm/Vector Relatorio.png" alt="">
                                    <p>Relatório Expositor</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </dialog>

                <!-- botão -->
                <div class="action__title open-modal" data-modal="abrir-mais-categoria">
                    <div class="action__content">
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
                        <a class="link-modais" href="../../../app/Views/Adm/listar-categorias.php">
                            <div class="action__title open-modal" data-modal="abrir-mais-categoria">
                                <div class="action__content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#162868" class="bi bi-card-list" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                                    </svg>
                                    <p>Listar Categorias</p>
                                </div>
                            </div>
                        </a>
                        <a class="link-modais" href="../../../app/Views/Adm/visualizar-categorias.php">
                            <div class="action__title open-modal" data-modal="abrir-mais-categoria">
                                <div class="action__content">
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


                <a id="action__carrossel" href="editar-carrossel.php">
                    <div class="action__title">
                        <div class="action__content">
                            <img src="../../../Public/imgs/img-area-adm/Vector Carrossel.png" alt="">
                            <p>Carrossel</p>
                        </div>
                    </div>
                </a>

                <!-- botão -->
                <div class="action__title open-modal" data-modal="abrir-mais-evento">
                    <div class="action__content">
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
                        <a class="link-modais" href="../../../app/Views/Adm/cadastrar-evento.php">
                            <div class="action__title">
                                <div class="action__content">
                                    <img src="../../../Public/imgs/img-area-adm/Vector Eventos.png" alt="">
                                    <p>Cadastrar Eventos</p>
                                </div>    
                            </div>
                        </a>
                        <a class="link-modais" href="../../../app/Views/Adm/gerenciar-eventos.php">
                            <div class="action__title">
                                <div class="action__content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#162868" class="bi bi-card-list" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                                    </svg>
                                    <p>Listar Eventos</p>
                                </div>    
                            </div>
                        </a>
                    </div>
                </dialog>


            
                <!-- botão -->
                <div class="action__title open-modal" data-modal="abrir-mais-financas">
                    <div class="action__content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="85" height="85" fill="#162868" class="bi bi-bar-chart" viewBox="0 0 16 16">
                            <path d="M4 11H2v3h2zm5-4H7v7h2zm5-5v12h-2V2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1z"/>
                        </svg>
                        <p>Financeiro</p>
                    </div>
                </div>

                <!-- Modal Finanças -->
                <dialog class="abrir-mais abrir-mais-financas" id="abrir-mais-financas">
                    <div class="close-modal" data-modal="abrir-mais-financas">
                        <h2>Financeiro</h2>
                        <i id="icon-sair" class="bi bi-x-square-fill"></i>
                    </div>
                    <div class="modais">
                        <a class="link-modais" href="../../../app/Views/Adm/grafico-central.php">
                            <div class="action__title">
                                <div class="action__content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="85" height="85" fill="#162868" class="bi bi-bar-chart" viewBox="0 0 16 16">
                                    <path d="M4 11H2v3h2zm5-4H7v7h2zm5-5v12h-2V2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1z"/>
                                </svg>
                                <p>Gráfico</p>
                            </div>
                        </a>
                        <a class="link-modais" href="../../../app/Views/Adm/cadastro-boleto.php">
                            <div class="action__title">
                                <div class="action__content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#162868" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                        <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                                    </svg>
                                    <p>Cadastrar Boletos</p>
                                </div>
                            </div>    
                        </a>
                        <a class="link-modais" href="../../../app/Views/Adm/gerenciar-boletos.php">
                            <div class="action__title">
                                <div class="action__content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="85" height="85" fill="#162868" class="bi bi-stickies" viewBox="0 0 16 16">
                                        <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1z"/>
                                        <path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293z"/>
                                    </svg>
                                    <p>Gerenciar Boletos</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </dialog>

                <!-- botão -->
                <div class="action__title open-modal" data-modal="abrir-mais-gerancia">
                    <div class="action__content">
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
                        <a class="link-modais" href="../../../app/Views/Adm/cadastrar-adm.php">
                            <div class="action__title open-modal" data-modal="abrir-mais-gerancia">
                                <div class="action__content">
                                    <img src="../../../Public/imgs/img-area-adm/Gerenciar ADM.png" alt="">
                                    <p>Cadastrar ADM</p>
                                </div>
                            </div>
                        </a>
                        <a class="link-modais" href="../../../app/Views/Adm/listar-adm.php">
                            <div class="action__title open-modal" data-modal="abrir-mais-gerancia">
                                <div class="action__content">
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

    <!-- Imagens Decorativas  -->
    <div class="decorative__img1"><img src="../../../Public/imgs/imagens-bolas/imagem-superior-esquerdo.svg" alt=""></div>
    <div class="decorative__img2"><img src="../../../Public/imgs/imagens-bolas/imagem-superior-direito.svg" alt=""></div>
    <div class="decorative__img3"><img src="../../../Public/imgs/imagens-bolas/imagem-inferior-direito.svg" alt=""></div>

    <!-- Scripts JS  -->
    <script src="../js/main.js"></script>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-modais/js-abrir-modal.js"></script>
</body>
</html>