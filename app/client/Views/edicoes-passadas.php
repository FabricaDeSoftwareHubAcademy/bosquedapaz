<!DOCTYPE html>
<html lang="pt/br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIÇÕES PASSADAS</title>
    <link rel="stylesheet" href="../../../Public/css/css-home/style-edicoes-passadas.css">
    <link rel="stylesheet" href="../../../Public/css/css-modais/style-edicoes-passadas-modal.css">
    <script src="../../../Public/js/js-modais/edicoes-passadas-abrir-modais.js" defer></script>
</head>
<body>
    <?php include "../../../Public/assets/home/menu-home.html"; ?>

    <!-- formas -->
    <main class="main">
        <section class="section-b">
            <div class="box-edpass"></div>
            <div class="forma-1-edpass">
                <img src="../../../Public/imgs/edicoes-passadas-img/edpassForma1.svg " alt="elemento1">
            </div>
            <div class="forma-3-edpass">
                <img src="../../../Public/imgs/edicoes-passadas-img/edpassForma3.svg" alt="elemento3">
            </div>
            <div class="forma-4-edpass">
                <img src="../../../Public/imgs/edicoes-passadas-img/edpassForma4.svg" alt="elemento4">
            </div>
            <button id="btn-voltar-edpass">
                <img href="avisos.html#voltar-edpass"  src="../../../Public/imgs/edicoes-passadas-img/voltar.svg" alt="">
            </button>
        </section>

        <div>
            <h1 class="ed-edpass">EDIÇÕES PASSADAS</h1>
        </div>
        <div class="area-card-edpass"> 

            <!-- card 1 -->
            <div class="cardRosa-edpass">
                <div class="card-img-edpass">
                    <img src="../../../Public/imgs/edicoes-passadas-img/img-card1-edpass.png" alt="Imagem do Card 1">
                </div>
                <div class="card-content-edpass">
                    <h2 class="title-card-edpass">Bloquinho de Carnaval</h2>
                        <button id="btn-cardRosa-edpass" class="btn-ver-mais" data-modal="modal1">Saiba Mais!</button>
                    </div>
                </div>

            <!-- card 2 -->
            <div class="cardVerde-edpass">
                <div class="card-img-edpass">
                    <img src="../../../Public/imgs/edicoes-passadas-img/img-card2-edpass.png" alt="Imagem do Card 2">
                </div>
                <div class="card-content-edpass">
                    <h2 class="title-card-edpass">Colônia de Férias</h2>
                    <button id="btn-cardVerde-edpass" class="btn-ver-mais" data-modal="modal2">Saiba Mais!</button>
                </div>
            </div> 
            <!-- card 3 -->
                <div class="cardRosa-edpass">
                    <div class="card-img-edpass">
                        <img src="../../../Public/imgs/edicoes-passadas-img/img-card3-edpass.png" alt="Imagem do Card 3">
                    </div>
                    <div class="card-content-edpass">
                        <h2 class="title-card-edpass">Natal Encantado no Bosque</h2>
                            <button id="btn-cardRosa-edpass" class="btn-ver-mais" data-modal="modal3">Saiba Mais!</button>
                        </div>
                </div>
            <!-- card 4 -->
            <div class="cardVerde-edpass">
                <div class="card-img-edpass">
                    <img src="../../../Public/imgs/edicoes-passadas-img/img-card4-edpass.png" alt="Imagem do Card 4">
                </div>
                <div class="card-content-edpass">
                    <h2 class="title-card-edpass">Black Weekend</h2>
                        <button id="btn-cardVerde-edpass" class="btn-ver-mais" data-modal="modal4">Saiba Mais!</button>
                    </div>
            </div>  

            <!-- MODAIS -->

            <!--modal 1-->
            <div class="modal-overlay" id="overlay"></div>

            <div class="modal" id="modal1">
                <span class="close" data-modal="modal1">&times;</span>
                <div class="modal-content-edpass">
                    <div class="modal-img">
                        <img src="../../../Public/imgs/edicoes-passadas-img/imagemGG.1.1.svg" alt="Imagem 1 do Modal 1" class="gg-img">
                        <div class="area-img-p">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.2.1.svg" alt="Imagem 2 do Modal 1" class="p-img">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.3.1.svg" alt="Imagem 3 do Modal 1" class="p-img">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.4.1.svg" alt="Imagem 4 do Modal 1" class="p-img">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.5.1.svg" alt="Imagem 5 do Modal 1" class="p-img">
                        </div>
                    </div>
                    <div class="txt-content-modal">
                        <h2 class="title-modal1">Bloquinho de Carnaval</h2>
                        <div class="area-texto">
                            <p class="modal-texto">
                                O Bloquinho da Feira Bosque da Paz vem com tudo! 🎉🎭

                                Prepare a fantasia e a alegria, porque o nosso Bloquinho do Bosque está chegando com uma programação especial para toda a família! 💃🕺 Música, diversão e muita energia para deixar o seu domingo ainda mais animado!
                                
                                E as novidades não param por aí! A maior feira cultural e gastronômica da cidade agora conta com um espaço exclusivo de empreendedorismo, onde você encontra produtos de economia criativa e industrializados, ampliando ainda mais as opções para o nosso público!
                                
                                📅 16 de Fevereiro
                                ⏰ 9 às 15h
                                📍 Praça Bosque da Paz - Rua Kame Takaiassu com Rua das Folhagens - Carandá Bosque
                                🎭 Diversão para todas as idades!
                                
                                Vem curtir o melhor do Carnaval e conferir essa novidade incrível! 💛💚💜❤️</p>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- modal 2 -->
            <div class="modal" id="modal2">
                <span class="close" data-modal="modal2">&times;</span>
                <div class="modal-content-edpass">
                    <div class="modal-img">
                        <img src="../../../Public/imgs/edicoes-passadas-img/imagemGG.1.1.svg" alt="Imagem 1 do Modal 2" class="gg-img">
                        <div class="area-img-p">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.2.1.svg" alt="Imagem 2 do Modal 2" class="p-img">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.3.1.svg" alt="Imagem 3 do Modal 2" class="p-img">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.4.1.svg" alt="Imagem 4 do Modal 2" class="p-img">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.5.1.svg" alt="Imagem 5 do Modal 2" class="p-img">
                        </div>
                    </div>
                    <div class="txt-content-modal">
                        <h2 class="title-modal2">Colônia de Férias</h2>
                        <div class="area-texto">
                                <p class="modal-texto">Vem começar 2025 com muita alegria e diversão! No dia 19 de janeiro, das 9h às 15h, nossa querida Feira Bosque da Paz está de volta com uma edição imperdível!

                                    🎶 Atrações musicais incríveis para embalar o dia com muita energia e alegria.
                                    🎨 Colônia de férias especial com a “Fábrica do Brincar” - um espaço mágico cheio de atividades lúdicas e criativas para as crianças.
                                    
                                    Um dia pensado para toda a família se divertir, relaxar e celebrar a cultura local. 💚
                                    
                                    📍 Local: Praça Bosque da Paz
                                    📅 Data: 19/01
                                    ⏰ Horário: 9h às 15h
                                    
                                    Chama os amigos, traz a criançada e vem curtir com a gente!</p>
                        </div>
                    </div>
                </div>
            </div> 


            <!-- modal 3 -->
            <div class="modal" id="modal3">
                <span class="close" data-modal="modal3">&times;</span>
                <div class="modal-content-edpass">
                    <div class="modal-img">
                        <img src="../../../Public/imgs/edicoes-passadas-img/imagemGG.1.1.svg" alt="Imagem 1 do Modal 3" class="gg-img">
                        <div class="area-img-p">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.2.1.svg" alt="Imagem 2 do Modal 3" class="p-img">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.3.1.svg" alt="Imagem 3 do Modal 3" class="p-img">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.4.1.svg" alt="Imagem 4 do Modal 3" class="p-img">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.5.1.svg" alt="Imagem 5 do Modal 3" class="p-img">
                        </div>
                    </div>
                    <div class="txt-content-modal">
                        <h2 class="title-modal1">Natal Encantado no Bosque</h2>
                        <div class="area-texto">
                                <p class="modal-texto">
                                    ✨Encante-se com o Natal no Bosque!
                                    🎁Expositores com presentes únicos e artesanato
                                    🍪Delícias natalinas para toda a família
                                    🎶Apresentações musicais e atrações especiais
                                    E muito mais esperando por você!
                                    Venha celebrar o Natal com a gente!🎄Encante-se com o Natal no Bosque! Expositores com presentes únicos, artesanato, delícias natalinas, apresentações. Encante-se com o Natal no Bosque! Expositores com presentes únicos, artesanato, delícias natalinas, apresentações musicais, atrações especiais e surpresas aguardam por você. Venha viver a magia!✨ Encante-se com o Natal no Bosque!
                                    🎁Expositores com presentes únicos e artesanato
                                    🍪Delícias natalinas para toda a família
                                    🎶Apresentações musicais e atrações especiais
                                    E muito mais esperando por você!
                                    
                                    Venha celebrar o Natal com a gente!🎄</p>
                        </div>
                    </div>
                </div>
            </div> 


        <!-- modal 4 -->
        <div class="modal" id="modal4">
            <span class="close" data-modal="modal4">&times;</span>
            <div class="modal-content-edpass">
                    <div class="modal-img">
                        <img src="../../../Public/imgs/edicoes-passadas-img/imagemGG.1.1.svg" alt="Imagem 1 do Modal 4" class="gg-img">
                        <div class="area-img-p">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.2.1.svg" alt="Imagem 2 do Modal 4" class="p-img">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.3.1.svg" alt="Imagem 3 do Modal 4" class="p-img">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.4.1.svg" alt="Imagem 4 do Modal 4" class="p-img">
                            <img src="../../../Public/imgs/edicoes-passadas-img/imagempp.5.1.svg" alt="Imagem 5 do Modal 4" class="p-img">
                        </div>
                    </div>
                <div class="txt-content-modal">
                    <h2 class="title-modal2">Black Weekend</h2>
                    <div class="area-texto">
                            <p class="modal-texto">Domingo é dia de muita música e diversão no palco da Feira Bosque da Paz! Prepare-se para uma programação que vai encantar todas as idades com muita energia e alegria!

                                🌟 Karla Coronel @karlacoroneloficial - traz um repertório cheio de hits e carisma, pra fazer todo mundo dançar e cantar junto!
                                
                                🎤 Pagode do Vitão @pagodaodovitao - com aquele clima de roda de samba, a banda vai animar o público com muito pagode e boa vibe.
                                
                                🎪 Palhaço Pepa @pepa_quadrini - para divertir a criançada e garantir sorrisos para a família inteira, o Palhaço Pepa chega com suas brincadeiras e muita alegria!
                                
                                Venha curtir e celebrar com a gente mais uma edição especial da Feira Bosque da Paz!</p>
                    </div>
                </div>
            </div>
        </div> 
</body>
</html>
            