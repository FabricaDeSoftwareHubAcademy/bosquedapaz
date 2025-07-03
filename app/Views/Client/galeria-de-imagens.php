<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
    <link rel="stylesheet" href="../../../Public/css/css-home/style-galeria-de-imagens.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Galeria DE IMAGENS</title>
</head>
<body>  

  <!-- Includ do Menu:  -->
  <?php include "../../../Public/include/home/menu-home.html" ?>

  <!-- Section Imagem de Fundo  -->
  <section class="container__imgFundo">
    <img src="../../../Public/imgs/img-teste-2.jpg" alt="Imagem de fundo" class="imgFundo">

      <!-- Titulos  -->
      <div class="text">
          <h1 class="title">A Feira em Imagens</h1>
          <h2 class="sub-title">Cada clique, uma história.</h2>
      </div>

      <!-- Seta  -->
      <div class="scroll-indicator" role="button" aria-label="Scroll para o conteúdo">
          <svg class="arrow-svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
            <path d="M12 5v14M12 19l-5-5M12 19l5-5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
      </div>

      <!-- Curvatura:  -->
      <div class="cloud-bubble-separator">
          <svg viewBox="0 0 1440 150" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path style="fill: white;" d="
              M0,96
              C144,144 288,48 432,96
              C576,144 720,48 864,96
              C1008,144 1152,48 1296,96
              C1360,112 1400,120 1440,123
              L1440,150 L0,150 Z
            "/>
          </svg>
        </div>
  </section>

  <!-- Section da Galeria:  -->
  <section class="overflow">
      <h2>Nome do Evento</h2>
      <!-- Area da Galeria de Imagens:  -->
      <div class="container_galeria">
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem20.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem21.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem22.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem22.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem23.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem24.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem25.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem33.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem34.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem37.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem38.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem39.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem40.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem41.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem42.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem43.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem44.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem45.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem46.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem47.png" alt="">
        </div>
        <div class="item-galeria">
          <img src="../../../Public/imgs/imagem20.png" alt="">
        </div>
      </div>
  </section>

  <!-- Modal: Ao clicar na Imagem:  -->
  <dialog class="img-dialog" id="dialog-img">
    <button class="close-btn" onclick="fecharDialog()" aria-label="Fechar imagem">
      <i class="bi bi-x-lg"></i>
    </button>      
    <img id="img-dialog-view" src="" alt="">
  </dialog>
  
  <script src="../../../Public/js/js-home/script-galeria.js"></script>

</body>
</html>

<!-- Matheus Manja -->