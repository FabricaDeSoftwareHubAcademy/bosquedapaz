<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicial</title>
    <link rel="stylesheet" href="css/styles-home/style.css">
</head>
<!-- inicio body -->
<body class="home">
    <!-- incluindo o menu -->
    <?php include "assets/menu-home.html"; ?>

<!-- inicio carrosel -->
    <section class="carossel">
        <div class="fundo"> <!-- fundo da imagem -->
            
            <div class="imagem"> <!-- imagem -->
                <section class="slider">
                    <div class="slider-content">
                        <input type="radio" name="btn-radio" id="radio1">
                        <input type="radio" name="btn-radio" id="radio2">
                        <input type="radio" name="btn-radio" id="radio3">
                        
                        <div class="slide-box primeiro">
                        <img src="imgs/img-home/imagem-carrosel-1.png" alt="" class="img-desktop">
                        </div>
            
                        <div class="slide-box">
                            <img src="imgs/img-home/imagem-carrossel-2.png" alt="" class="img-desktop">
                        </div>
                        
                        <div class="slide-box">
                            <img src="imgs/img-home/imagem-carrossel-3.png" alt="" class="img-desktop">
                        </div>
                        
                        <div class="nav-auto">
                            <div class="auto-btn1"></div>
                            <div class="auto-btn2"></div>
                            <div class="auto-btn3"></div>
                        </div>
            
                        <div class="nav-manual">
                            <label for="radio1" class="manual-btn"></label>
                            <label for="radio2" class="manual-btn"></label>
                            <label for="radio3" class="manual-btn"></label>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="text-carrossel"> <!-- texto de apresentação -->
            <h1 class="title-welcome">BEM-VINDO Á FEIRA BOSQUE DA PAZ!</h1>
            <p class="text-welcome-c">Venha viver uma experiência única em meio à natureza, onde a cultura local, 
                artesanato autêntico, delícias gastronômicas e a alegria de nossa comunidade se encontram!</p>
        </div>
    </section>
    <!-- inicio carrosel -->
    
    <!-- inicio main -->
    <main>
        
        <!-- inicio categorias -->
        <div class="informacoes">
        <div class="info">
            <img src="imgs/img-home/People.png" alt="Pessoas">
            <div class="especi">
                <p class="p-prin">+46 mil</p>
                <p class="p-compl">Visitantes</p>
            </div>
        </div>
        
        <div class="info">
            <img src="imgs/img-home/Shop.png" alt="Shop">
            <div class="especi">
                <p class="p-prin">+400</p>
                <p class="p-compl">Expositores</p>
            </div>
        </div>
        
        <div class="info">
            <img src="imgs/img-home/Micro.png" alt="Microfone">
            <div class="especi">
                <p class="p-prin">+450</p>
                <p class="p-compl">Artistas</p>
            </div>
        </div>
        
        <div class="info">
            <img src="imgs/img-home/World Map.png" alt="Mapa Mundi">
            <div class="especi">
                <p class="p-prin">+28</p>
                <p class="p-compl">Países</p>
            </div>
        </div>
        </div>
        <!-- inicio informação sobre a feira -->
        </div>
        <div class="categoria">
            <!-- inicio informação sobre a feira -->
            <!-- texto sobre categorias -->
            <div id="fundo-categoia">
                <div class="text-categoria">
                    <h2>CATEGORIAS DOS EXPOSITORES </h2>
                    <p>Confira como são nossos expositores! Os produtos dos feirantes são separados por setor para garantir uma melhor organização e procura dos produtos.</p>
                </div>
            </div>

            <!-- lista de categorias -->
            <div class="categorias">
                <div class="parte">
                    
                    <div class="item">
                        <div class="img-fundo artesanato">
                            <img src="imgs/img-home/picel.png" alt="Imagem picel">
                        </div>
                        <p>ARTESANATO</p>
                    </div>

                    <div class="item">
                        <div class="img-fundo antiguidade">
                            <img src="imgs/img-home/Parchment.png" alt="Imagem papel">
                        </div>
                        <p>ANTIGUIDADE</p>
                    </div>

                    <div class="item">
                        <div class="img-fundo colecionismo">
                            <img src="imgs/img-home/NFT Collection.png" alt="Imagem coleção">
                        </div>
                        <p>COLECIONISMO</p>
                    </div>

                    <div class="item">
                        <div class="img-fundo cosmetica">
                            <img src="imgs/img-home/Vial.png" alt="Imagem ampola">
                        </div>
                        <p>COSMETOLOGIA</p>
                    </div>

                    <div class="item">
                        <div class="img-fundo gastronomia">
                            <img src="imgs/img-home/Real Food for Meals.png" alt="Imagem comida">
                        </div>
                        <p>GASTRONOMIA</p>
                    </div>

                    <div class="item">
                        <div class="img-fundo literatura">
                            <img src="imgs/img-home/Books.png" alt="Imagem livros">
                        </div>
                        <p>LITERATURA</p>
                    </div>

                    <div class="item">
                        <div class="img-fundo moda">
                            <img src="imgs/img-home/Scissors.png" alt="Imagem tesoura">
                        </div>
                        <p>MODA AUTORAL</p>
                    </div>

                    <div class="item">
                        <div class="img-fundo planta">
                            <img src="imgs/img-home/Potted Plant.png" alt="Imagem planta">
                        </div>
                        <p>PLANTAS</p>
                    </div>

                    <div class="item">
                        <div class="img-fundo sustenta">
                            <img src="imgs/img-home/Recycle.png" alt="Imagem reciclagem">
                        </div>
                        <p>SUSTENTABILIDADE</p>
                    </div>
                </div>
            </div>
            <!-- fim lista de categorias -->
            


        <!-- sobre expositores -->
        <section class="expositores">
            <h2>NOSSOS EXPOSITORES</h2>
            <p class="text-ver-expositores">Veja como são nossos expositores e venha explorar, apoiar e compartilhar uma experiência inesquecível conosco!</p>

                <!-- inicio lista de expositor -->
            <div class="expositor-lista">

                <div class="expositor expositor1">
                    <div class="imagem-expositor">
                        <img src="imgs/img-home/retalhos e chica.png" alt="Perfil Retalhos e chica">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>RETALHOS E CHITA</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Artesanato</span></p>
                                <p class="rua rua1" ><span>RUA:</span> Amarela</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expositor expositor2">

                    <div class="imagem-expositor">
                        <img src="imgs/img-home/akj prime.png" alt="Perfil AKJ Prime">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>AKJ PRIME</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Gastronomia</span></p>
                                <p class="rua rua2"><span>RUA:</span> Laranja</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expositor expositor3">

                    <div class="imagem-expositor">
                        <img src="imgs/img-home/cake pet.png" alt="Perfil Cake Pet CG">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>CAKE PET CG</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Gastronomia</span></p>
                                <p class="rua rua3"><span>RUA:</span> Verde</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expositor expositor4">

                    <div class="imagem-expositor">
                        <img src="imgs/img-home/decorart.png" alt="Perfil Decorart Artezanato">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>DECORART ARTESANATO</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Artesanato</span></p>
                                <p class="rua rua4"><span>RUA:</span> Roxa</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="expositor expositor1">
                    <div class="imagem-expositor">
                        <img src="imgs/img-home/retalhos e chica.png" alt="Perfil Retalhos e chica">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>RETALHOS E CHITA</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Artesanato</span></p>
                                <p class="rua rua1" ><span>RUA:</span> Amarela</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expositor expositor2">

                    <div class="imagem-expositor">
                        <img src="imgs/img-home/akj prime.png" alt="Perfil AKJ Prime">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>AKJ PRIME</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Gastronomia</span></p>
                                <p class="rua rua2"><span>RUA:</span> Laranja</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expositor expositor3">

                    <div class="imagem-expositor">
                        <img src="imgs/img-home/cake pet.png" alt="Perfil Cake Pet CG">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>CAKE PET CG</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Gastronomia</span></p>
                                <p class="rua rua3"><span>RUA:</span> Verde</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expositor expositor4">

                    <div class="imagem-expositor">
                        <img src="imgs/img-home/decorart.png" alt="Perfil Decorart Artezanato">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>DECORART ARTESANATO</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Artesanato</span></p>
                                <p class="rua rua4"><span>RUA:</span> Roxa</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expositor expositor1">
                    <div class="imagem-expositor">
                        <img src="imgs/img-home/retalhos e chica.png" alt="Perfil Retalhos e chica">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>RETALHOS E CHITA</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Artesanato</span></p>
                                <p class="rua rua1" ><span>RUA:</span> Amarela</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expositor expositor2">

                    <div class="imagem-expositor">
                        <img src="imgs/img-home/akj prime.png" alt="Perfil AKJ Prime">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>AKJ PRIME</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Gastronomia</span></p>
                                <p class="rua rua2"><span>RUA:</span> Laranja</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expositor expositor3">

                    <div class="imagem-expositor">
                        <img src="imgs/img-home/cake pet.png" alt="Perfil Cake Pet CG">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>CAKE PET CG</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Gastronomia</span></p>
                                <p class="rua rua3"><span>RUA:</span> Verde</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expositor expositor4">

                    <div class="imagem-expositor">
                        <img src="imgs/img-home/decorart.png" alt="Perfil Decorart Artezanato">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>DECORART ARTESANATO</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Artesanato</span></p>
                                <p class="rua rua4"><span>RUA:</span> Roxa</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expositor expositor1">
                    <div class="imagem-expositor">
                        <img src="imgs/img-home/retalhos e chica.png" alt="Perfil Retalhos e chica">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>RETALHOS E CHITA</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Artesanato</span></p>
                                <p class="rua rua1" ><span>RUA:</span> Amarela</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expositor expositor2">

                    <div class="imagem-expositor">
                        <img src="imgs/img-home/akj prime.png" alt="Perfil AKJ Prime">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>AKJ PRIME</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Gastronomia</span></p>
                                <p class="rua rua2"><span>RUA:</span> Laranja</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expositor expositor3">

                    <div class="imagem-expositor">
                        <img src="imgs/img-home/cake pet.png" alt="Perfil Cake Pet CG">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>CAKE PET CG</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Gastronomia</span></p>
                                <p class="rua rua3"><span>RUA:</span> Verde</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expositor expositor4">

                    <div class="imagem-expositor">
                        <img src="imgs/img-home/decorart.png" alt="Perfil Decorart Artezanato">
                    </div>
                    <div class="informacoes-expositor">
                        <div class="info-expo">
                            <h3>DECORART ARTESANATO</h3>
                            <div id="informacao">
                                <p class="text-info">CATEGORIA: <span>Artesanato</span></p>
                                <p class="rua rua4"><span>RUA:</span> Roxa</p>
                            </div>
                            <div class="botao">
                                <button>VER</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- fim lista de expositor -->

            <div class="ver-mais-expositor"><!-- botão mais expositores -->
                <button>VER MAIS EXPOSITORES</button>
            </div>
        </section>
        <!-- sobre expositores -->

        <!-- inicio seja expositor -->
        <section class="seja-expositor">

            <!-- seja expositor -->
            <div class="box-content-seja-expositor">
                <div class="box-seja-expositor">
                    <div class="box-content-expositor">
                        <h3>SEJA UM EXPOSITOR</h3>
                        <p>Mostre seu talento na nossa feira! Acesse o Botão Abaixo e Cadastre-se agora e aproveite a chance de destacar seu trabalho para um público animado. Não perca essa oportunidade!</p>
                        <button>ACESSAR</button>
                    </div>
                </div>
                <div class="sombra"></div><!-- sombra do seja expositor -->
            </div>

            <!-- inicio imagens -->
            <div class="box-imagens">
                <!-- img 1 -->
                <div class="img">
                    <img src="imgs/img-home/img-expositor-1.png" alt="imagem de expositor">
                    <!-- lista categorias -->
                    <ul>
                        <li>Artesanato</li>
                        <li>Literatura</li>
                        <li>Antiguidades</li>
                    </ul>
                </div>
                <!-- fim img 1 -->

                <!-- img 2 -->
                <div class="img">
                    <img src="imgs/img-home/img-expositor-2.png" alt="imagem de expositor">
                    <!-- lista categorias -->
                    <ul>
                        <li>Gastronomia</li>
                        <li>Cosmetologia E Muito Mais!</li>
                    </ul>
                </div>
                <!-- img 2 -->
            </div>
            <!-- fim imagens -->
        </section>
        <!-- fim seja expositor -->
    </main>
<!-- fim main -->

<div class="todos-avisos">
    <!-- proximo evento -->
        <section class="avisos">
            <div class="content-avisos">
                <div class="box-aviso"><!-- imagem -->
                    <img src="imgs/img-home/Rectangle 648.png" alt="imagem evento magia">
                </div>
                <div class="box-text text-avisos"><!-- texto -->
                    <h4>PRÓXIMO EVENTO</h4>
                    <img src="imgs/img-home/Rectangle 648.png" alt="imagem evento magia">
                    <p>Descubra como será o nosso próximo evento!</p>
                    <button>SAIBA MAIS!</button>
                </div>
            </div>
        </section>
    <!-- fim proximo evento -->
    
    <!-- proximos eventos -->
        <section class="avisos passadas">
            <div class="content-avisos">
                <div class="box-text"><!-- texto -->
                    <h4>EDIÇÕES PASSADAS</h4>
                    <img src="imgs/img-home/image 83.png" alt="tempos brilhantes">
                    <p>Descubra como será o nosso próximo evento!</p>
                    <button>SAIBA MAIS!</button>
                </div>
                <div class="box-aviso"><!-- imagem -->
                    <img src="imgs/img-home/image 83.png" alt="tempos brilhantes">
                </div>
            </div>
        </section>
    <!-- fim proximos eventos -->
    
    <!-- ultimas edições -->
        <section class="avisos ultimas">
            <!-- imgens -->
            <div class="content-avisos">
                <div class="box-aviso edicoes">
                    <!-- img 1 -->
                    <div class="img" id="edicao-img-1">
                        <img src="imgs/img-home/Rectangle 652.png" alt="imagem adote um cachorro">
                        <p>Feirinha de Adoção de Animais</p>
                    </div>
                    <!-- fim img 1 -->
    
                    <!-- img 2 -->
                    <div class="img">
                        <img src="imgs/img-home/Rectangle 653.png" alt="imagem doe sangue">
                        <p>Campanha de Vacinação Contra o HIV</p>
                    </div>
                    <!-- img 2 -->
                </div>
                <!-- fim imagens -->
                <div class="box-text text-ultimas"><!-- texto -->
                    <h4>PRÓXIMO EVENTO</h4>
                    <img src="imgs/img-home/Rectangle 653.png" alt="imagem doe sangue" ">
                    <p>Descubra como será o nosso próximo evento!</p>
                    <button>SAIBA MAIS!</button>
                </div>
            </div>
        </section>
    <!-- ultimas edições -->
</div>

<!-- inicio mapa gabriel -->
    <section class="mapa-gabriel">
        <h1>LOCALIZAÇÃO</h1>
        <div class="mapaDoGabriel">
            <p>Mapa do Gabriel</p>
        </div>
    </section>
<!-- fim mapa gabriel -->

<!-- inicio footer -->
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
                    <li><a href="#">Sobre nós</a></li>
                    <li><a href="#">Contate-nos</a></li>
                    <li><a href="#">Equipe de Dev</a></li>
                    <li><a href="#">Seja um Expositor</a></li>
                </ul>
            </div>

            <!-- lista entrar contato -->
            <div class="list-rodape list-contato">
                <h5>CONTATO</h5>
                <div>
                    <img src="imgs/img-home/Instagram.png" alt="icon Instagram">
                    <p>@feirabosquedapaz</p>
                </div>
                <div>
                    <img src="imgs/img-home/Mail.png" alt="icon E-mail">
                    <p>bosquedapaz@gmail.com</p>
                </div>
            </div>

        </div>

        <div class="copyright"> <!-- copyright -->
            <p>Copyright  ©2024. Feira Bosque da Paz. All Rights Reserved.</p>
        </div>
    </footer>
<!-- fim footer -->

    <script src="js/js-home/main.js" defer></script>
    <script src="js/js-home/carrossel.js" defer></script>
</body>
</html>