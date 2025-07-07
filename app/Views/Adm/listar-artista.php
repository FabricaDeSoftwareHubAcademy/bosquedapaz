


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
            <tbody>
              <tr>
                <td>Carla Costa</td>
                <td class="email-col">carla.costa123@gmail.com</td>
                <td class="fone-col">(67) 98123-4567</td>
                <td class="barraca-col">Música</td>
                <td class="barraca-col">R$ 500,00</td>
                <td>30 min</td>
                <td><button class="status active">Ativo</button></td>
              </tr>

              <tr>
                <td>Juan Quintela</td>
                <td class="email-col">juan.quintela987@gmail.com</td>
                <td class="fone-col">(67) 98234-5678</td>
                <td class="barraca-col">Dança</td>
                <td class="barraca-col">R$ 700,00</td>
                <td>20 min</td>
                <td><button class="status inactive">Inativo</button></td>
              </tr>

              <tr>
                <td>Julia Souza</td>
                <td class="email-col">julia.souza456@gmail.com</td>
                <td class="fone-col">(67) 98945-6789</td>
                <td class="barraca-col">Teatro</td>
                <td class="barraca-col">R$ 400,00</td>
                <td>45 min</td>
                <td><button class="status active">Ativo</button></td>
              </tr>

              
            </tbody>
          </table>


        </div>
        <div class="btns">
          <a href="Area-Adm.php" class="voltar">
            <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
          </a>
        </div>
      </div>
      <dialog id="edit-modal" class="modal-edit">
        <h2>Confirmar Exclusão</h2>
        <p>Tem certeza que deseja fazer isso?</p>
        <div>
          <button id="edit-cancel" class="cancel-btn close-modal" data-modal="edit-modal">Cancelar</button>
          <button id="edit-confirm" class="confirm-btn close-modal" data-modal="edit-modal">Confirmar</button>
        </div>
      </dialog>
  </main>

  <td><button class="status inactive">Inativo</button></td>
  <td>
    <a class="edit-icon" href="editar-expositor.php">
      <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a class="delete-icon">
      <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
    </a>
  </td>
  </tr>
  <tr>

    <td>Nara Helena</td>
    <td class="email-col">nara.helena126@gmail.com</td>
    <td class="fone-col">(67) 98345-6789</td>
    <td class="barraca-col">45</td>

    <td><button class="status active">Ativo</button></td>
    <td>
      <a class="edit-icon" href="editar-expositor.php">
        <i class="fa-solid fa-pen-to-square"></i>
      </a>
      <a class="delete-icon">
        <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
      </a>
    </td>
  </tr>
  <tr>

    <td>Fernanda Santos</td>
    <td class="email-col">fernanda.santos126@gmail.com</td>
    <td class="fone-col">(67) 97345-6623</td>
    <td class="barraca-col">24</td>

    <td><button class="status active">Ativo</button></td>
    <td>
      <a class="edit-icon" href="editar-expositor.php">
        <i class="fa-solid fa-pen-to-square"></i>
      </a>
      <a class="delete-icon">
        <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
      </a>
    </td>
  </tr>
  <tr>

    <td>Emanuelle Valadares</td>
    <td class="email-col">manu.vala777@gmail.com</td>
    <td class="fone-col">(67) 98885-6888</td>
    <td class="barraca-col">26</td>

    <td><button class="status inactive">Inativo</button></td>
    <td>
      <a class="edit-icon" href="editar-expositor.php">
        <i class="fa-solid fa-pen-to-square"></i>
      </a>
      <a class="delete-icon">
        <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
      </a>
    </td>
  </tr>
  <tr>

    <td>Kauan Ribeiro</td>
    <td class="email-col">kauan.ribeiro753@gmail.com</td>
    <td class="fone-col">(67) 99942-1110</td>
    <td class="barraca-col">23</td>

    <td><button class="status active">Ativo</button></td>
    <td>
      <a class="edit-icon" href="editar-expositor.php">
        <i class="fa-solid fa-pen-to-square"></i>
      </a>
      <a class="delete-icon">
        <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
      </a>
    </td>
  </tr>
  <tr>

    <td>Vini Count</td>
    <td class="email-col">count.vini99@gmail.com</td>
    <td class="fone-col">(67) 99210-2566</td>
    <td class="barraca-col">75</td>

    <td><button class="status inactive">Inativo</button></td>
    <td>
      <a class="edit-icon" href="editar-expositor.php">
        <i class="fa-solid fa-pen-to-square"></i>
      </a>
      <a class="delete-icon">
        <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
      </a>
    </td>
  </tr>
  <tr>

    <td>Isabela Oliveira</td>
    <td class="email-col">isa.bela555@gmail.com</td>
    <td class="fone-col">(67) 96841-5517</td>
    <td class="barraca-col">2</td>

    <td><button class="status active">Ativo</button></td>
    <td>
      <a class="edit-icon" href="editar-expositor.php">
        <i class="fa-solid fa-pen-to-square"></i>
      </a>
      <a class="delete-icon">
        <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
      </a>
    </td>
  </tr>
  <tr>

    <td>Kelvin Bach</td>
    <td class="email-col">kelvin.bach0208@gmail.com</td>
    <td class="fone-col">(67) 90208-5623</td>
    <td class="barraca-col">44</td>

    <td><button class="status inactive">Inativo</button></td>
    <td>
      <a class="edit-icon" href="editar-expositor.php">
        <i class="fa-solid fa-pen-to-square"></i>
      </a>
      <a class="delete-icon">
        <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
      </a>
    </td>
  </tr>
  <tr>

    <td>Paulo Henrique</td>
    <td class="email-col">paulo.henrique33@gmail.com</td>
    <td class="fone-col">(67) 98345-6789</td>
    <td class="barraca-col">7</td>

    <td><button class="status active">Ativo</button></td>
    <td>
      <a class="edit-icon" href="editar-expositor.php">
        <i class="fa-solid fa-pen-to-square"></i>
      </a>
      <a class="delete-icon">
        <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
      </a>
    </td>
  </tr>
  </tbody>
  </table>
  </div>
  <div class="btns">
    <a href="gerenciar-expositores.php" class="voltar">
      <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
    </a>
  </div>
  </div>
  <dialog id="edit-modal" class="modal-edit">
    <h2>Confirmar Exclusão</h2>
    <p>Tem certeza que deseja fazer isso?</p>
    <div>
      <button id="edit-cancel" class="cancel-btn close-modal" data-modal="edit-modal">Cancelar</button>
      <button id="edit-confirm" class="confirm-btn close-modal" data-modal="edit-modal">Confirmar</button>
    </div>
  </dialog>
  </main>
  <div class="bolas-fundo">
    <img src="../../../Public/imgs/imagens-bolas/bola azul1.png" alt="Bola Fundo 1" class="bola-verde1">
    <img src="../../../Public/imgs/imagens-bolas/bola azul2.png" alt="Bola Fundo 2" class="bola-verde2">
    <img src="../../../Public/imgs/imagens-bolas/bola azu.png" alt="Bola Fundo 3" class="bola-rosa">
  </div>

  <script src="../../../Public/js/js-menu/js-menu.js"></script>

</body>

</html>