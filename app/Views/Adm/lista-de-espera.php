<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../../Public/css/menu-adm.css" />
  <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" />
  <link rel="stylesheet" href="../../../Public/css/css-adm/style-lista-de-espera.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <title>Adm - Bosque da Paz</title>
</head>

<body>
  <!-- Include do Menu  -->
  <?php include "../../../Public/include/menu-adm.html" ?>

  <!-- Área Principal  -->
  <main class="container__main">
    <!-- Box dos Elementos -->
    <div class="container__box">
      <h2>Lista de Espera</h2>
      <!-- Área Barra de Pesquisa  -->
      <div class="container__area__pesquisa">
        <form method="GET" class="div-pesquisa">
          <input type="text" id="buscar_expositor" name="busca" placeholder="Expositor"/>
        </form>
        <!-- Área Table -->
        <div class="table__area">
          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th class="nome">Nome</th>
                <th class="email">Email</th>
                <th class="cat">Marca</th>
                <th class="telefone">Telefone</th>
                <th class="perfil">Validar</th>
              </tr>
            </thead>
            <tbody class="tdbory" id="tbody">
            </tbody>
          </table>
        </div>
        <!-- Seta Voltar -->
        <div class="btn-v">
          <a href="./" class="voltar">
            <img src="../../../Public/assets/icons/voltar.png" alt="Botão de voltar" class="btn-voltar" />
          </a>
        </div>
      </div>
    </div>
  </main>

  <!-- Imagens Decorativas -->
  <div class="imgs__dec">
    <img class="img__dec1" src="../../../Public/assets/img-bolas/bola-azul1.png" alt="" />
    <img class="img__dec2" src="../../../Public/assets/img-bolas/bola-azul2.png" alt="" />
    <img class="img__dec3" src="../../../Public/assets/img-bolas/bola-azul.png" alt="" />
  </div>


  <script src="../../../Public/js/js-menu/js-menu.js"></script>
  <script src="../../../Public/js/js-adm/js-lista-de-espera.js"></script>
  <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
</body>
</html>

<!-- Matheus Manja -->