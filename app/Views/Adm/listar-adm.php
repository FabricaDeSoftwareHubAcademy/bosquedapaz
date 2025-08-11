<?php 
include_once('../../helpers/csrf.php');
$tolken = getTolkenCsrf();
?>
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <!-- jQuery -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <!-- Scripts -->
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-listar-adm.css">
    <link rel="stylesheet" href="../../../Public/css/css-modais/style-modal-statusAdm.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
      />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  </head>
  <body>
    <!-- Includs:  -->
    <?php include "../../../Public/include/menu-adm.html" ?>

    <main class="principal">
      <div class="box">
        <h2>LISTAR ADM</h2>
        <!-- Seta Voltar  -->
        <div class="seta__voltar"><a href="./"><img src="../../../Public/assets/icons/voltar.png"  alt=""></a></div>
        <div class="container">
          <!-- Formulário de Busca -->
          <form method="POST" id="formBusca">
            <div class="search-bar">
              <input type="text" id="busca" name="palavra" placeholder="Pesquisar por Administrador" />
            </div>
          </form>
          <!-- Tabela de Colaboradores -->
          <div class="table-container">
            <table class="collaborators-table">
              <thead>
                <tr>
                  <th class="usuario-col">Usuário</th>
                  <th>Nome</th>
                  <th class="email-col">E-mail</th>
                  <th class="fone-col">Telefone</th>
                  <th class="cargo-col">Cargo</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody id="tbody-colaboradores">
              </tbody>
            </table>
          </div>
          <?php include '../../../Public/include/Butons-forms.html'; ?>
        </div>  
      </div>  
    </main>

    <?php include "../../../Public/include/modais/modal-deletar.html"; ?>
    <?php include "../../../Public/include/modais/modal-sucesso.html"; ?>
    <?php include "../../../Public/include/modais/modal-error.html"; ?>


    <div class="bolas-fundo">
      <img src="../../../Public/assets/img-bolas/bola azul1.png" alt="Bola Fundo 1" class="bola-verde1">
      <img src="../../../Public/assets/img-bolas/bola azul2.png" alt="Bola Fundo 2" class="bola-verde2">
      <img src="../../../Public/assets/img-bolas/bola azu.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/js-buscar-adm.js" defer></script>
    <script type="text/javascript" src="../../../Public/js/js-adm/js-listar-adm.js" defer></script>
    <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
  </body>
  </html>
