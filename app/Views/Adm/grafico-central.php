

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../../../Public/css/css-adm/style-index-ctrl.css">
  <title>Adm - Bosque da Paz</title>
  <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  
  <link rel="stylesheet" href="../../../Public/css/css-adm/style-grafico-central.css">
  <script src="../../../Public/js/js-adm/js-grafico-central.js" defer></script>
</head>

<body>
<?php include "../../../Public/include/menu-adm.html" ?>
  <main class="box-ctrl">

  <div class="containerInfo">
    <div class="enfoVisitantes">
      <span class="spnValorVisitantes"></span>
      <span class="spnVisitantes">$ mensal</span>
    </div>

    <div class="enfoExpositores">
      <span class="spnValorExpositores"></span>
      <span class="spnExpositores">Expositores</span>
    </div>

    <div class="enfoArtistas">
      <span class="spnValorArtistas"></span>
      <span class="spnArtistas">Artistas</span>
    </div>

    <div class="enfoEventosAtivos">
      <span class="spnValorEventosAtivos"></span>
      <span class="spnEventosAtivos">Eventos Ativos</span>
    </div>

  </div>

  <div class="grid-graficos">
    
    <div class="grafico">
      <div class="containerTitleGrafico">
        <span class="spnTitleGrafico">Expositores por status</span>
      </div>
      <div class="containerGrafico">
          <canvas id="expositorStatusChart"></canvas>
      </div>
    </div>

    <div class="grafico">
      <div class="containerTitleGrafico">
        <span class="spnTitleGrafico">Expositores por categoria</span>
      </div>
      <div class="containerGrafico">
          <canvas id="expositorCategoriaChart"></canvas>
      </div>
    </div>

    <div class="grafico">
      <div class="containerTitleGrafico">
        <span class="spnTitleGrafico">Boleto por status</span>
      </div>
      <div class="containerGrafico">
          <canvas id="boletoPorStatusChart"></canvas>
      </div>
    </div>

    <!-- <div class="grafico">
      <div class="containerTitleGrafico">
        <span class="spnTitleGrafico">Parceiro por status</span>
      </div>
      <div class="containerGrafico">
          <canvas id="parceiroPorStatusChart"></canvas>
      </div>
    </div> -->

    <div class="grafico">
      <div class="containerTitleGrafico">
        <span class="spnTitleGrafico">Cidades de origem</span>
      </div>
      <div class="containerGrafico">
          <canvas id="cidadesOrigemChart"></canvas>
      </div>
    </div>

    <!-- <div class="grafico">
      <div class="containerTitleGrafico">
        <span class="spnTitleGrafico">Número de atrações por evento</span>
      </div>
      <div class="containerGrafico">
          <canvas id="atracoesPorEventoChart"></canvas>
      </div>
    </div> -->

  </div>

    <div class="btns">
                <a href="./" class="voltar">
                    <img src="../../../Public/assets/icons/voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>
            </div>
  </main>
  <img class="imagem-fundo1" src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="">
  <img class="imagem-fundo2" src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="">
  <img class="imagem-fundo3" src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="">
  <script src="../../../Public/js/js-menu/js-menu.js"></script>
  <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>