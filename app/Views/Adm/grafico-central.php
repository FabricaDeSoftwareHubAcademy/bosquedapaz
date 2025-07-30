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

</head>

<body>
<?php include "../../../Public/include/menu-adm.html" ?>
  <main class="box-ctrl">
    <h1 class="title-ctrl">CENTRAL DE CONTROLE</h1>
    <div class="area-geral">
      <div class="area-dados-feirantes">
        <div class="cards-feirantes">
          <div class="card">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
            </svg>
            <div class="dados">
              <p class="numeros">450</p>
              <p class="feirantes">Quantidade de Expositores</p>
            </div>
            <div id="listra1">
            </div>
          </div>
          <div class="card">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
              <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
            </svg>
            <div class="dados">
              <p class="numeros">250</p>
              <p class="feirantes-espera">Expositores na Fila de Espera</p>
            </div>
            <div id="listra2">
            </div>
          </div>
          <div class="card">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
          </svg>
            <div class="dados">
              <p class="numeros">150</p>
              <p class="feirantes-pagou">Expositores Realizaram o Pagamento da Taxa</p>
            </div>
            <div id="listra3">
            </div>
          </div>
          <div class="card">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">
            <path d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856s-.036.586-.113.856c-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a10 10 0 0 1-.443-.05 9.36 9.36 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a9 9 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581s-.027-.414-.075-.581c-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.2 2.2 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.9.9 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1"/>
          </svg>
            <div class="dados">
              <p class="numeros">300</p>
              <p class="feirantes-devendo">Expositores em Débito</p>
            </div>
            <div id="listra4">
            </div>
          </div>
        </div>
      </div>
      <div class="area-grafico">
        <canvas id="grafico" style="width: 95%; height: 100%;">
        </canvas>
        <script>
          const ctx = document.getElementById('grafico');

          new Chart(ctx, {
            type: 'bar',
            data: {
              labels: ['Artesanato', 'Antiguidade', 'Colecionismo', 'Cosmetologia', 'Gastronomia', 'Literatura', 'Moda Autoral', 'Plantas', 'Sustentabilidade'],
              datasets: [{
                label: '',
                data: [40, 20, 5, 10, 50, 15, 20, 15, 35],
                borderWidth: 0,
                backgroundColor: [
                  '#0F25EE',
                  '#FFC700',
                  '#B413FF',
                  '#FF00F5',
                  '#FF8A00',
                  '#178076',
                  '#0F4C5C',
                  '#89BD00',
                  '#6C584C'
                ],
              }]
            },
            options: {
              plugins: {
                legend: {
                  display: false
                }
              },
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        </script>
      </div>
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
</body>

</html>