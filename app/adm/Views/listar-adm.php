<?php 
// require_once '../../../app/adm/Controller/Colaborador.php';

// $busca = isset($_GET['busca']) ? $_GET['busca'] : null;
// $adm = new Colaborador();
// $colaboradores = $adm->listar($busca);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <script src="../../../Public/js/js-adm/status-colaborador.js" defer></script>
    <script src="../../../Public/js/js-modais/js-abrir-modal.js" defer></script>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-listar-adm.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>
  <?php include "../../../Public/assets/adm/menu-adm.html" ?>

  <main class="principal">
    <div class="box">
      <h2>LISTAR ADM</h2>
      <div class="container">
        <!-- Formulário de Busca -->
        <form id="formBusca">
          <div class="search-bar">
            <label for="busca">Procurar</label>
            <input type="text" id="busca" name="busca" placeholder="Colaborador" />
            <button type="submit" class="search-button">BUSCAR</button>
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
                <th>Ações</th>
              </tr>
            </thead>
            <tbody id="tbody-colaboradores">
              <?php if (!empty($colaboradores)) : ?>
                <?php foreach ($colaboradores as $colaborador) : ?>
                  <tr>
                    <td class="usuario-col"><?php echo htmlspecialchars($colaborador['id_colaborador']); ?></td>
                    <td><?php echo htmlspecialchars($colaborador['nome']); ?></td>
                    <td class="email-col"><?php echo htmlspecialchars($colaborador['email']); ?></td>
                    <td class="fone-col"><?php echo htmlspecialchars($colaborador['telefone']); ?></td>
                    <td class="cargo-col"><?php echo htmlspecialchars($colaborador['cargo']); ?></td>
                    <td>
                      <button type="button" class="status active">Ativo</button>
                    </td>
                    <td>
                      <a class="edit-icon" href="editar-adm.php?id=<?php echo $colaborador['id_colaborador']; ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <button class="open-modal" data-modal="modal-deleta" data-id="<?php echo $colaborador['id_colaborador']; ?>">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else : ?>
                <tr>
                  <td colspan="6">Nenhum colaborador encontrado.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <!-- modal excluir -->
        <dialog id="modal-deleta" class="modal-deleta">
          <div class="acao-recusar">
            <div class="acao-content-recusar">
                <h1 class="acao-texto-recusar">Deseja excluir o ADM?</h1>
                <div class="acao-botoes-recusar">
                  <button class="close-modal" data-modal="modal-deleta">cancelar</button>
                  <button class="close-modal" data-modal="modal-deleta">confirmar</button>
                </div>
            </div>
          </div>
        </dialog>
      </div>  
    </div>  
    <div class="setaV-cadastro">
      <a href="../../../app/adm/Views/Area-Adm.php"><img src="../../../Public/imgs/imgs-lista-de-espera/seta-lispe.png" alt=""></a>
    </div>
  </main>
  <div class="bolas-fundo">
    <img src="../../../Public/imgs/imagens-bolas/bola azul1.png" alt="Bola Fundo 1" class="bola-verde1">
    <img src="../../../Public/imgs/imagens-bolas/bola azul2.png" alt="Bola Fundo 2" class="bola-verde2">
    <img src="../../../Public/imgs/imagens-bolas/bola azu.png" alt="Bola Fundo 3" class="bola-rosa">
  </div>

  <script src="../../../Public/js/js-adm/listar-adm.js" defer></script>
</body>
</html>
