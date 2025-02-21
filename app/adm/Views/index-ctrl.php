<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central de Controle ADM</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/index-ctrl.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <?php
    include "../../../Public/assets/adm/menu-adm.html";
    ?>
    <main class="box-ctrl">
        <h1 class="title-ctrl">CENTRAL DE CONTROLE</h1>
        <div class="area-geral">
                <div class="area-dados-feirantes">
                    <div class="cards-feirantes">
                    <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                    </svg>
                    <div class="dados">
                    <p class="numeros">450</p>
                    <p class="feirantes">Quantidade de Feirantes</p>
                    </div>
                    <div id="listra1">
                    </div>
                    </div>
                    <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                    <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                    </svg>
                    <div class="dados">
                    <p class="numeros">250</p>
                    <p class="feirantes-espera">Feirantes na Fila de Espera</p>
                    </div>
                    <div id="listra2">
                    </div>
                    </div>
                    <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                    <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                    <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z"/>
                    </svg>
                    <div class="dados">
                    <p class="numeros">150</p>
                    <p class="feirantes-pagou">Feirantes Realizaram o Pagamento da Taxa</p>
                    </div>
                    <div id="listra3">
                    </div>
                    </div>
                    <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                    </svg>
                    <div class="dados">
                    <p class="numeros">300</p>
                    <p class="feirantes-devendo">Feirantes Faltam Pagar a Taxa</p>
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
                label: 'Expositores',
                data: [40, 20, 5, 10, 50, 15, 20, 15,35],
                borderWidth: 0,
                backgroundColor:[
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
                fontColor:
                '#0F25EE',
                }]
              },
              options: {
                // indexAxis: 'y',
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
    </main>
    <img class="imagem-fundo1" src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="">
    <img class="imagem-fundo2" src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="">
    <img class="imagem-fundo3" src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="">
    <script src="../../js/js-menu/js-menu.js"></script>
</body>
</html>