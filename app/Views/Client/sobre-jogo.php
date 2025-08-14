<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-sobre-jogo.css">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-menu.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>Sobre o Jogo</title>
</head>
<body>
    <!-- Includ do Menu:  -->
    <?php include "../../../Public/include/home/menu-home.html" ?>

    <main>
        <!-- Section 1 -->
        <section class="section" id="section_1">
            <div class="left_text">
                <p>
                    Viva a Feira Bosque da Paz de um jeito especial 
                    com o Bosque Explore, o mapa interativo que transforma 
                    sua experiência!
                </p>
            </div>
            <div class="right_logo">
                <img src="../../../Public/imgs/imgs-sobre-jogo/logo_jogo.png" alt="Bosque Explore Logo" />
                <button onclick="startGame()">JOGAR</button>
            </div>
        </section>

        <!-- Section 2 -->
        <section class="section" id="section_2">
            <h2 class=" dark ">Bem-vindo AO BOSQUE EXPLORE!</h2>
            <p class=" dark ">Bosque Explore foi desenvolvido com criatividade para tornar sua 
                experiênc   ia na Feira mais divertida e informativa. Explore o mapa 
                virtual, descubra expositores e conheça a diversidade cultural que 
                faz da Feira um patrimônio de Mato Grosso do Sul. Tecnologia leve, 
                acessível e a serviço da cultura e da economia criativa.
            </p>
        </section>

        <!-- Section 3 (Botões de filtro) -->
        <section class="section filter_section">
            <h2>Personagens do Jogo</h2>
            <p>Conheça as inspirações reais por trás da criação dos personagens do jogo. 
                Clique nos ícones para saber mais sobre os professores, desenvolvedores e idealizadoras
            </p>
            <div class="buttons_container">
                <button onclick="mostrarCards(2)"><img src="../../../Public/imgs/imgs-sobre-jogo/icone_devs (1).png" alt=""></button>
                <button onclick="mostrarCards(3)"><img src="../../../Public/imgs/imgs-sobre-jogo/icone_donas.png" alt=""></button>
                <button onclick="mostrarCards(4)"><img src="../../../Public/imgs/imgs-sobre-jogo/icone_profs.png" alt=""></button>
            </div>
        </section>

        <!-- Section 4 (Cards) -->
        <section class="section cards_section">
            <!-- Conatiner dos Cards  -->
            <div class="cards_box">
                <!-- Cards -->
                <div class="card">
                    <div class="card-image">
                        <img src="../../../Public/assets/fotosDesenvolvedores/Matheus (1).jpg" alt="Imagem do Card" />
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Matheus Manja</h3>
                        <p class="card-subtitle">Desenvolvedor</p>
                    </div>
                    <div class="card-footer">
                        <div class="avatar">
                        <img src="../../../Public/imgs/imgs-sobre-jogo/matheus.png" alt="Avatar" />
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="../../../Public/assets/fotosDesenvolvedores/Raquel.webp" alt="Imagem do Card" />
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Raquel Marques</h3>
                        <p class="card-subtitle">Designer</p>
                    </div>
                    <div class="card-footer">
                        <div class="avatar">
                        <img src="../../../Public/imgs/imgs-sobre-jogo/raquel.png" alt="Avatar" />
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="../../../Public/imgs/foto-carina.webp" alt="Imagem do Card" />
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Carina Zamboni</h3>
                        <p class="card-subtitle">Idealizadora</p>
                    </div>
                    <div class="card-footer">
                        <div class="avatar">
                        <img src="../../../Public/imgs/imgs-sobre-jogo/carina.png" alt="Avatar" />
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="../../../Public/imgs/foto-denize.webp" alt="Imagem do Card" />
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Denise Zamboni</h3>
                        <p class="card-subtitle">Idealizadora</p>
                    </div>
                    <div class="card-footer">
                        <div class="avatar">
                        <img src="../../../Public/imgs/imgs-sobre-jogo/denise.png" alt="Avatar" />
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="../../../Public/imgs/foto-fernanda.webp" alt="Imagem do Card" />
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Fernanda Steffen</h3>
                        <p class="card-subtitle">Organizadora</p>
                    </div>
                    <div class="card-footer">
                        <div class="avatar">
                        <img src="../../../Public/imgs/imgs-sobre-jogo/fernanda.png" alt="Avatar" />
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="../../../Public/assets/fotosDesenvolvedores/Enilda.webp" alt="Imagem do Card" />
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Enilda Cáceres</h3>
                        <p class="card-subtitle">Professor</p>
                    </div>
                    <div class="card-footer">
                        <div class="avatar">
                        <img src="../../../Public/imgs/imgs-sobre-jogo/Enilda 3.png" alt="Avatar" />
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="../../../Public/assets/fotosDesenvolvedores/Thiago.webp" alt="Imagem do Card" />
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Thiago Almeida</h3>
                        <p class="card-subtitle">Professore</p>
                    </div>
                    <div class="card-footer">
                        <div class="avatar">
                        <img src="../../../Public/imgs/imgs-sobre-jogo/Thiago.png" alt="Avatar" />
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="../../../Public/imgs/imgs-sobre-jogo/prof-mauricio.png" alt="Imagem do Card" />
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Maurício de Souza</h3>
                        <p class="card-subtitle">Professor</p>
                    </div>
                    <div class="card-footer">
                        <div class="avatar">
                        <img src="../../../Public/imgs/imgs-sobre-jogo/Maurício 3.png" alt="Avatar" />
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="../../../Public/assets/fotosDesenvolvedores/Guilherme.webp" alt="Imagem do Card" />
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Guilherme Vilani</h3>
                        <p class="card-subtitle">Professor</p>
                    </div>
                    <div class="card-footer">
                        <div class="avatar">
                        <img src="../../../Public/imgs/imgs-sobre-jogo/Vilani.png" alt="Avatar" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 5 -->
        <section class="section" id="section_5">
            <div class="container_logo">
                <div class="img_logo"><img src="../../../Public/imgs/imgs-sobre-jogo/logo_jogo.png" alt=""></div>
            </div>

            <div class="container_text">
                <h2>Comece a Explorar!</h2>
                <p>Caminhe pela Feira Bosque da Paz de um jeito único com o Bosque Explore!
                    Clique em jogar e venha se aventurar.
                </p>
                <button onclick="startGame()">JOGAR</button>
            </div>
        </section>

        <!-- Seção do Jogo Unity -->
        <section class="section" id="section_game">
            <button id="close-game" onclick="closeGame()">Fechar</button>
            <div id="unity-container" class="unity-desktop">
                <canvas id="unity-canvas" width="960" height="600" tabindex="-1"></canvas>
                <div id="unity-loading-bar">
                    <div id="unity-logo"></div>
                    <div id="unity-progress-bar-empty">
                        <div id="unity-progress-bar-full"></div>
                    </div>
                </div>
                <div id="unity-warning"></div>
                <div id="unity-footer">
                    <div id="unity-webgl-logo"></div>
                    <div id="unity-fullscreen-button"></div>
                    <div id="unity-build-title">mapa-feira</div>
                </div>
            </div>
        </section>
    </main>
    </main>

    <!-- Includ do Rodapé -->
    <?php include "../../../Public/include/home/rodape.html"; ?> 

    <script src="../../../Public/js/js-home/sobre-jogo.js"></script>
    <script src="../../../Public/js/js-home/play-game.js"></script>
</body>
</html>

<!-- /* Matheus Manja  */  -->