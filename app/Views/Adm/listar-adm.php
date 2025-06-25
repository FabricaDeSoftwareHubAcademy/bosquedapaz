<?php require_once __DIR__ . '/../../../app/helpers/auth.php';?>


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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

  <style>
    /* Estilos básicos para modais */
    .modal-overlay {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0,0,0,0.5);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }
    .modal {
      background: white;
      padding: 1.5rem;
      border-radius: 8px;
      max-width: 400px;
      text-align: center;
    }
    .modal button {
      margin: 0 10px;
      padding: 0.5rem 1.2rem;
      font-size: 1rem;
      cursor: pointer;
    }
    .modal.show {
      display: flex !important;
    }
  </style>

</head>
<body>
  <?php include "../../../Public/include/menu-adm.html" ?>

  <main class="principal">
    <div class="box">
      <h2>LISTAR ADM</h2>
      <!-- Seta Voltar  -->
      <div class="seta__voltar"><a href="Area-Adm.php"><img src="../../../Public/assets/icons/voltar.png"  alt=""></a></div>
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
      </div>  
    </div>  
  </main>

  <!-- MODAL 1: Confirmar mudança -->
  <div id="modal-confirm" class="modal-overlay">
    <div class="modal">
      <p id="modal-confirm-msg">Deseja realmente ativar/inativar este ADM?</p>
      <button id="modal-confirm-sim">Sim</button>
      <button id="modal-confirm-nao">Não</button>
    </div>
  </div>

  <!-- MODAL 2: Sucesso -->
  <div id="modal-success" class="modal-overlay">
    <div class="modal">
      <p id="modal-success-msg">Status alterado com sucesso!</p>
      <button id="modal-success-ok">OK</button>
    </div>
  </div>

  <div class="bolas-fundo">
    <img src="../../../Public/assets/img-bolas/bola azul1.png" alt="Bola Fundo 1" class="bola-verde1">
    <img src="../../../Public/assets/img-bolas/bola azul2.png" alt="Bola Fundo 2" class="bola-verde2">
    <img src="../../../Public/assets/img-bolas/bola azu.png" alt="Bola Fundo 3" class="bola-rosa">
  </div>

  <script src="../../../Public/js/js-menu/js-menu.js"></script>
  <script src="../../../Public/js/js-adm/js-buscar-adm.js" defer></script>
  <script src="../../../Public/js/js-adm/status-colaborador.js" defer></script>
  <script type="text/javascript" src="../../../Public/js/js-adm/js-listar-adm.js" defer></script>
</body>
</html>
