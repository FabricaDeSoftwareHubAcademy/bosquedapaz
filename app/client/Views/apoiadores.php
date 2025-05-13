<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-apoiadores.css">

    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >

    <link rel="stylesheet" href="../../../Public/css/css-home/style-menu.css">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-parceiros-home.css">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-rodape.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


    <title>Bosque da Paz</title>
    <script src="../../../Public/js/js-home/yan-carrossel.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

    <?php include "../../../Public/assets/home/menu-home.html"; ?>
    
    <section class="slider">
      <div class="slider-content">
        <input type="radio" name="btn-radio" id="radio1">
        <input type="radio" name="btn-radio" id="radio2">
        <input type="radio" name="btn-radio" id="radio3">
        
        <div class="slide-box primeiro">
            <img src="../../../Public/imgs/quem-somos-img/imagem1.webp" alt="imagem1" class="imagem1 img-sobre">
        </div>
        <div class="slide-box">
            <img src="../../../Public/imgs/quem-somos-img/imagem2.webp" alt="imagem2" class="imagem2 img-sobre">
        </div>
        <div class="slide-box">
            <img src="../../../Public/imgs/quem-somos-img/imagem3.webp" alt="imagem3" class="imagem3 img-sobre">
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

    <!-- <main class="section-bosque-quem-somos">
        <div class="div-text-sobre">
            <h1 class="titulo">FEIRA BOSQUE <span>DA PAZ!</span></h1>
            <p class="somos-apaixonados">Somos uma equipe apaixonada por conectar pessoas e promover a troca de ideias e experiências. Desde nossa fundação, nossa missão tem sido criar um espaço vibrante e acolhedor onde expositores e visitantes possam se encontrar, explorar novidades e celebrar a diversidade de talentos e produtos.</p>
        </div>
        <div class="div-img-animation">
            <img src="../../../Public/imgs/quem-somos-img/imagem1.webp" alt="imagem1" class="imagem1 img-sobre">
            <img src="../../../Public/imgs/quem-somos-img/imagem2.webp" alt="imagem2" class="imagem2 img-sobre">
            <img src="../../../Public/imgs/quem-somos-img/imagem3.webp" alt="imagem3" class="imagem3 img-sobre">

        </div>
    </main> MAIN QUE TERMINA A PARTE INCIAL -->

    
        <section class="section-nosso-time-quem-somos">
            <div class="div-nt" >
            <h1 class="titulo-nosso-time-quem-somos">A <span class="tit">Feira Bosque da Paz </span> impacta diretamente a vida de mais de 500 famílias sul-mato-grossenses, impulsionando a economia local e diversos setores, como a gastronomia, artesanato, sustentabilidade, literatura, entre outros. O evento também promove ações de impacto social, valorizando expositores que utilizam conhecimentos e materiais de povos originários e quilombolas. Além disso, celebra a diversidade cultural com apresentações musicais e teatrais.</h1 >
            
            </div>
        </section> <!--section que termina o NOSSO TIME-->

    <section class="section-colaboradoras-quem-somos">
            
            <div class="image-text-carina">
                
                <img class="fotos" src="../../../Public/imgs/quem-somos-img/foto-carina.webp" alt="">
                <p class="carina">Carina Zamboni</p>
                <span class="profission"> Produtora Cultural</span>
            </div>

            <div class="image-text-denise">
                <img class="fotos" src="../../../Public/imgs/quem-somos-img/foto-denize.webp" alt="">
                <p class="denise">Denise Zamboni</p>
                <span class="profission"> Produtora Cultural</span>
            </div>
   
            <div class="image-text-fernanda">
                <img class="fotos" src="../../../Public/imgs/quem-somos-img/foto-fernanda.webp" alt="">
                <p class="fernanda">Fernanda Gutierrez</p>
                <span class="profission">Advogada</span>
            </div>

            </div>
    </section>


    <!----------------------------------------------------->


    <section class="section-expositor-quem-somos">

        <div class="expositor">
            <h1 class="titulo-seja-expositor-quem-somos">SEJA UM EXPOSITOR</h1>
        </div>
        
        <div class="expositor-p">
            <p class="acesse">Mostre todo o seu talento na nossa feira e conquiste o reconhecimento que você merece! Acesse o botao abaixo, faça seu cadastro agora mesmo e aproveite essa oportunidade única de apresentar seu trabalho para um público engajado e animado. Não deixe essa chance passar, destaque-se e faça parte desse grande evento!</p>
            
        </div>
        
        <a class="botao-expositor" href="../../../app/client/views/edital-expositor.php">
        <div class="botao">
            CLIQUE AQUI!
       
        </div>
        </a>
    </section>

<!-- 
    <section class="parceiros-quem-somos">
    <div class="titulo-parceiros-quem-somos">
        <h4>PARCEIROS</h4>

    </div>
    <div class="fotos-parceiros-quem-somos">
       <img src="../../../Public/imgs/quem-somos/bosque-ipe.webp" alt="">
        <img src="../../../Public/imgs/quem-somos/governo.webp" alt="">
        <img src="../../../Public/imgs/quem-somos/senac.webp" alt="">
        <img src="../../../Public/imgs/quem-somos/sebrae.webp" alt="">
        <img src="../../../Public/imgs/quem-somos/setur.webp" alt="">
        

    </div>


</section> -->

   


    <!--------------------------------->
    <section class="section-parce2">
    <h3 class="title all-titles">Nossos Apoiadores</h3>
        <div class="all-parce">
            <div class="div-logo-parceiro"><img src="../../../Public/imgs/img-home/logo-bosque-ipes.png" alt="logo shopping bosque dos ipes" class="img-logo-parceiros"></div>
            <div class="div-logo-parceiro"><img src="../../../Public/imgs/img-home/logo-prefeitura.png" alt="logo prefeitura de campo grande" class="img-logo-parceiros"></div>
            <div class="div-logo-parceiro"><img src="../../../Public/imgs/img-home/logo-sebrae.png" alt="logo sebrae" class="img-logo-parceiros"></div>
            <div class="div-logo-parceiro"><img src="../../../Public/imgs/img-home/logo-hub.jpg" alt="logo senac" class="img-logo-parceiros"></div>
            <div class="div-logo-parceiro"><img src="../../../Public/imgs/img-home/logo-senac.jpg" alt="logo senac" class="img-logo-parceiros"></div>
            <div class="div-logo-parceiro"><img src="../../../Public/imgs/img-home/logo-setur.png" alt="logo setur" class="img-logo-parceiros"></div>
        </div>
    </section>
    

    <?php include "../../../Public/assets/home/rodape.html"; ?>
    <script src="../../../Public/js/js-home/main.js" defer></script>

</body>
</html>