<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-home/quem-somos.css">
    <link rel="stylesheet" href="../../../Public/css/css-home/menu.css">
    <link rel="stylesheet" href="../../../Public/css/css-home/rodape.css">
    <title>Quem Somos</title>
</head>
<body>
    <?php include "../../../Public/assets/home/menu-home-client.html"; ?>
    <!-- inicio header -->
    <header class="cabecalho">
        <!-- inicio menu -->
            <nav class="menu">
    
                <div class="logo"><!-- logo -->
                    <a href="../../../iindex.php"><img src="../../../Public/imgs/img-home/logo.png" alt="Logo"></a>
                </div>
    
                <div class="nav-bar"> <!-- navegação -->
                    <ul>
                        <li><a href="../../../iindex.php">Início</a></li>
                        <li><a href="#">Parceiros</a></li>
                        <li><a href="../../client/Views/fale-conosco.php">Fale Conosco</a></li>
                        <li><a href="../../client/Views/quem-somos.php">Quem Somos?</a></li>
                    </ul>
                    
                    <div class="pesquisar-login">
                        <div class="pesquisar"> <!-- area de pesquisa -->
                            <input class="input" type="text" placeholder="Pesquisar por...">
                            <div class="bola"  onclick="inputShow2()">
                               
                            </div>
                        </div>
                        <div class="login"> <!-- area login -->
                            <a href="#"><img src="../../../Public/imgs/img-home/login.png" alt="Login"></a>
                        </div>
                    </div>
                </div>
    
                <div class="pequisa-mobile">
                    <div class="pesquisa"> <!-- area de pesquisa -->
                        <input class="input" type="text" placeholder="Pesquisar por...">
                        <div class="bola"  onclick="inputShow()">
                        </div>
                    </div>
                    <div class="menu-icon">
                        <button onclick="menuShow()"><img class="icon" src="../../../Public/imgs/img-home/menu.png" alt="Menu"></button>
                    </div>
                </div>
            </nav>
            <!-- fim menu -->
    
            <!-- mobile menu -->
            <div class="mobile-menu"> <!-- navegação -->
                <ul class="nav-item">
                    <li class="nav-item"><a href="../../../iindex.php">Início</a></li>
                    <li class="nav-item"><a href="#">Parceiros</a></li>
                    <li class="nav-item"><a href="../app/client/fale-conosco.php">Fale Conosco</a></li>
                    <li class="nav-item"><a href="../../app/client/Views/quem-somos.html">Quem Somos?</a></li>
                </ul>
    
                <div class="btn-login"> <!-- area login -->
                    <button class="btnlogin">Login</button>
                </div>
            </div>
            <!-- mobile menu -->
        </header>
    <!-- fim header -->




    <!----------------------------------------------->





    <main class="section-bosque-quem-somos">
        <div class="div-text-sobre">
            <h1 class="titulo">FEIRA BOSQUE <span>DA PAZ!</span></h1>
            <p class="somos-apaixonados">Somos uma equipe apaixonada por conectar pessoas e promover a troca de ideias e experiências. Desde nossa fundação, nossa missão tem sido criar um espaço vibrante e acolhedor onde expositores e visitantes possam se encontrar, explorar novidades e celebrar a diversidade de talentos e produtos.</p>
        </div>
        <div class="div-img-animation">
            <img src="../../../Public/imgs/quem-somos/imagem1.png" alt="imagem1" class="imagem1 img-sobre">
            <img src="../../../Public/imgs/quem-somos/imagem2.png" alt="imagem2" class="imagem2 img-sobre">
            <img src="../../../Public/imgs/quem-somos/imagem3.png" alt="imagem3" class="imagem3 img-sobre">

        </div>
    </main> <!--MAIN QUE TERMINA A PARTE INCIAL-->

    
        <section class="section-nosso-time-quem-somos">
            <div class="div-nt" >
            <h2>NOSSO TIME</h2 >
            
            </div>
        </section> <!--section que termina o NOSSO TIME-->

    <section class="section-colaboradoras-quem-somos">
            
            <div class="image-text-carina">
                
                <img class="fotos" src="../../../Public/imgs/quem-somos/colaboradora1.png" alt="">
                <p class="carina">Carina Zamboni</p>
                <span class="profission"> Produtora Cultural</span>
            </div>

            <div class="image-text-denise">
                <img class="fotos" src="../../../Public/imgs/quem-somos/colaboradora2.png" alt="">
                <p class="denise">Denise Zamboni</p>
                <span class="profission"> Produtora Cultural</span>
            </div>
   
            <div class="image-text-fernanda">
                <img class="fotos" src="../../../Public/imgs/quem-somos/colaboradora3.png" alt="">
                <p class="fernanda">Fernanda Gutierrez</p>
                <span class="profission">Advogada</span>
            </div>

            <div class="image-text-nájila">
                <img class="fotos" src="../../../Public/imgs/quem-somos/colaboradora4.png" alt="">
                <p class="nájila"> Nájla Fogaça</p>
                <span class="profission">Fisioterapeuta</p>
            </div>
    </section>


    <!----------------------------------------------------->


    <section class="section-expositor-quem-somos">

        <div class="expositor">
            <h3>SEJA UM EXPOSITOR</h3>
        </div>
        
        <div class="expositor-p">
            <p class="acesse">Mostre seu talento na nossa feira. Acesse o Botão Abaixo e Cadastre-se agora e aproveite a chance de destacar seu trabalho para um público animado. Não perca essa oportunidade!</p>
            
        </div>
        
        <div class="botão-expositor">
            <a class="botão" href="../../../app/adm/Views/cadastro-expositor.html">CLIQUE AQUI!</a>
        </div>
    </section>

    <section class="vazio">
        <div class="logo2">
            <img src="../../../Public/imgs/quem-somos/BOSQUE-removebg-preview (1) 3.png" alt="">
        </div>
    </section>



    <!--------------------------------->



    
    <footer class="rodape">
        <div class="box-footer">

            <!-- lista categorias -->
            <div class="list-rodape list-categoria">
                <h5>CATEGORIAS</h5>
                <ul>
                    <li>Artesanato</li>
                    <li>Antiguidade</li>
                    <li>Colecionismo</li>
                    <li>Cosmetologia</li>
                    <li>Gastronomia</li>
                    <li>Literatura</li>
                    <li>Moda Autoral</li>
                    <li>Plantas</li>
                    <li>Sustentabilidade</li>
                </ul>
            </div>

            <!-- lista sobre nós -->
            <div class="list-rodape list-sobre">
                <h5>SOBRE</h5>
                <ul>
                    <li><a href="../../client/Views/quem-somos.php">Sobre nós</a></li>
                    <li><a href="../../client/Views/fale-conosco.php">Contate-nos</a></li>
                    <li><a href="#">Equipe de Dev</a></li>
                    <li><a href="../../../app/adm/Views/cadastro-expositor.html">Seja um Expositor</a></li>
                </ul>
            </div>

            <!-- lista entrar contato -->
            <div class="list-rodape list-contato">
                <h5>CONTATO</h5>
                <div>
                    <img src="../../../Public/imgs/img-home/Instagram.png" alt="icon Instagram">
                    <p>@feirabosquedapaz</p>
                </div>
                <div>
                    <img src="../../../Public/imgs/img-home/Mail.png" alt="icon E-mail">
                    <p>bosquedapaz@gmail.com</p>
                </div>
            </div>

        </div>

        <div class="copyright"> <!-- copyright -->
            <p>Copyright  ©2024. Feira Bosque da Paz. All Rights Reserved.</p>
        </div>
    </footer>
<!-- fim footer -->

    <script src="../../../Public/js/js-home/main.js" defer></script>
    <script src="../../../Public/js/js-home/carrossel.js" defer></script>
</body>
</html>