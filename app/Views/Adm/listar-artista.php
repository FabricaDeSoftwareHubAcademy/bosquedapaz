<?php require_once __DIR__ . '/../../../app/helpers/auth.php';?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adm - Bosque da Paz</title>
  <script src="../../../Public/js/js-adm/status-colaborador.js" defer></script>
  <script src="../../../Public/js/js-modais/js-abrir-modal.js" defer></script>
  <link rel="stylesheet" href="../../../Public/css/css-adm/style-listar-expositor.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
  <?php include "../../../Public/include/menu-adm.html" ?>
  <script src="../js/main.js"></script>

  <main class="principal">
    <div class="box">
      <h2>LISTAR ARTISTA</h2>
      <div class="container">

        <div class="search-bar">
          <label for="status">Procurar</label>
          <input type="text" id="status" placeholder="Artista" />
          <button class="search-button">BUSCAR</button>
        </div>

        <div class="table-container">
          <table class="collaborators-table">
            <thead>
              <tr>
                <th>Nome</th>
                <th class="email-col-th">E-mail</th>
                <th class="fone-col">Telefone</th>
                <th class="barraca-col">Linguagem Artística</th>
                <th class="barraca-col">Valor Cachê</th>
                <th>Tempo Apresentação</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody id="tbody-artistas">
              <!-- gerado por js -->
            </tbody>
          </table>
        </div>

        <div class="btns">
          <a href="Area-Adm.php" class="voltar">
            <img src="../../../Public/assets/icons/voltar.png" alt="Botão de voltar" class="btn-voltar">
          </a>
        </div>
      </div>

  </main>

  <td><button class="status inactive">Inativo</button></td>
  <td><button class="status active">Ativo</button></td>



  <div class="bolas-fundo">
    <img src="../../../Public/assets/img-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
    <img src="../../../Public/assets/img-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
    <img src="../../../Public/assets/img-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
  </div>

  <script src="../../../Public/js/js-menu/js-menu.js"></script>
  <script src="../../../Public/js/js-adm/js-listar-artista.js"></script>

  <dialog id="modal-confirmar-status" class="modal-loading">
    <div class="content-modal">
      <div class="content-text">
        <div class="deletar-text" id="mensagem-confirmar-status"></div>
      </div>
      <div class="content-btns">
        <button class="btn-modal-deletar deletar-modal-salvar" id="btn-confirmar-status">Sim</button>
        <button class="btn-modal-deletar deletar-modal-cancelar" id="btn-cancelar-status">Não</button>
      </div>
    </div>
  </dialog>


</body>

</html>