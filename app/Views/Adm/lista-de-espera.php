<?php ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../../Public/css/menu-adm.css" />
  <link rel="stylesheet" href="../../../Public/css/css-adm/style-lista-de-espera.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" />
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
          <input type="text" name="busca" placeholder="Expositor" value="<?= htmlspecialchars($busca) ?>" />
          <div class="div__button"><button class="button__buscar" type="submit">BUSCAR</button></div>
        </form>
        <!-- Área Table -->
        <div class="table__area">
          <!-- Table -->
          <table class="table">
            <thead>
              <tr>
                <th class="nome">Nome</th>
                <th class="email">Email</th>
                <th class="cat">Categoria</th>
                <th class="telefone">Telefone</th>
                <th class="perfil">Perfil</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($expositores)) : ?>
                <?php foreach ($expositores as $expositor) : ?>
                  <tr>
                    <td><?= htmlspecialchars($expositor['nome']) ?></td>
                    <td class="email"><?= htmlspecialchars($expositor['email']) ?></td>
                    <td><?= htmlspecialchars($expositor['categoria']) ?></td>
                    <td><?= htmlspecialchars($expositor['telefone']) ?></td>
                    <td class="perfil">
                      <a href="validar-expositor.php?id=<?= $expositor['id_expositor'] ?>">
                        <i class="bi bi-person-badge"></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else : ?>
                <tr>
                  <td colspan="5" style="text-align: center;">Nenhum expositor encontrado.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
        <!-- Seta Voltar -->
        <div class="btn-v">
          <a href="Area-Adm.php" class="voltar">
            <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar" />
          </a>
        </div>
      </div>
    </div>
  </main>

  <!-- Imagens Decorativas -->
  <div class="imgs__dec">
    <img class="img__dec1" src="../../../Public/imgs/imagens-bolas/azul-sem-fundo1.png" alt="" />
    <img class="img__dec2" src="../../../Public/imgs/imagens-bolas/azul-sem-fundo2.png" alt="" />
    <img class="img__dec3" src="../../../Public/imgs/imagens-bolas/azul-sem-fundo3.png" alt="" />
  </div>

  <script src="../../../Public/js/js-adm/status-colaborador.js"></script>



  <!-- ----------------------------< >-----------------------------  -->
  <!--  Modal -->
  <!-- modal 3 - recusar expositor  -->
  <div class="modal modal-recusar-expositor-3" id="modal_recusar_expositor_3">
      <div class="modal-content-recusar-expositor">
          <h1 class="modal-texto-recusar-expositor">Expositor Recusado.</h1>
          <div class="modal-botoes-recusar-expositor">
              <button class="botoes-modal-recusar-expositor botao-ok" id="botao_ok_recusar">Ok</button>
          </div>
      </div>
  </div>

  <!-- modal 3 - validar expositor  -->
  <div class="modal modal-validar-expositor-3" id="modal_validar_expositor_3">
      <div class="modal-content-validar-expositor">
          <h1 class="modal-texto-validar-expositor">Expositor Validado.</h1>
          <div class="modal-botoes-validar-expositor">
              <button class="botoes-modal-validar-expositor botao-ok" id="botao_ok_validar">Ok</button>
          </div>
      </div>
  </div>
  <!-- ---------------------------< >-----------------------------  -->

  <script src="../../../Public/js/js-menu/js-menu.js"></script>
</body>
</html>
