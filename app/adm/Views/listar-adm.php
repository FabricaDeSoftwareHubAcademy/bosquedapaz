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

      <form action="" method="GET">
        <div class="search-bar">
          <label for="status">Procurar</label>
          <input type="text" id="status" name="busca" placeholder="Colaborador" />
          <button type="submit" class="search-button">BUSCAR</button>
        </div>
      </form>

        <div class="table-container">
          <table class="collaborators-table">
            <thead>
              <tr>
                <th class="usuario-col">Usuário</th>
                <th>Nome</th>
                <th class="email-col">E-mail</th>
                <th class="fone-col">Telefone</th>
                <th>Status</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="usuario-col">01</td>
                <td>Carla Costa</td>
                <td class="email-col">carla.costa123@gmail.com</td>
                <td class="fone-col">(67) 98123-4567</td>
                <td><button type="button" class="status active">Ativo</button></td>
                <td>
                  <a class="edit-icon" href="editar-adm.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button class=" open-modal" data-modal="modal-deleta">
                    <i class="fa-solid fa-trash" ></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">02</td>
                <td>Juan Quintela</td>
                <td class="email-col">juan.quintela987@gmail.com</td>
                <td class="fone-col">(67) 98234-5678</td>
                <td><button type="button" class="status inactive">Inativo</button></td>
                <td>
                  <a class="edit-icon" href="editar-adm.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button class=" open-modal" data-modal="modal-deleta">
                    <i class="fa-solid fa-trash" ></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">03</td>
                <td>Julia Souza</td>
                <td class="email-col">julia.souza456@gmail.com</td>
                <td class="fone-col">(67) 98945-6789</td>
                <td><button type="button" class="status active">Ativo</button></td>
                <td>
                  <a class="edit-icon" href="editar-adm.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button class=" open-modal" data-modal="modal-deleta">
                    <i class="fa-solid fa-trash" ></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">04</td>
                <td>Pedro Alves</td>
                <td class="email-col">pedro.alves789@gmail.com</td>
                <td class="fone-col">(67) 98845-6789</td>
                <td><button type="button" class="status inactive">Inativo</button></td>
                <td>
                  <a class="edit-icon" href="editar-adm.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button class=" open-modal" data-modal="modal-deleta">
                    <i class="fa-solid fa-trash" ></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">05</td>
                <td>Nara Helena</td>
                <td class="email-col">nara.helena126@gmail.com</td>
                <td class="fone-col">(67) 98345-6789</td>
                <td><button type="button" class="status active">Ativo</button></td>
                <td>
                  <a class="edit-icon" href="editar-adm.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button class=" open-modal" data-modal="modal-deleta">
                    <i class="fa-solid fa-trash" ></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">06</td>
                <td>Fernanda Santos</td>
                <td class="email-col">fernanda.santos126@gmail.com</td>
                <td class="fone-col">(67) 97345-6623</td>
                <td><button type="button" class="status active">Ativo</button></td>
                <td>
                  <a class="edit-icon" href="editar-adm.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button class=" open-modal" data-modal="modal-deleta">
                    <i class="fa-solid fa-trash" ></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">07</td>
                <td>Emanuelle Valadares</td>
                <td class="email-col">manu.vala777@gmail.com</td>
                <td class="fone-col">(67) 98885-6888</td>
                <td><button type="button" class="status inactive">Inativo</button></td>
                <td>
                  <a class="edit-icon" href="editar-adm.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button class=" open-modal" data-modal="modal-deleta">
                    <i class="fa-solid fa-trash" ></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">08</td>
                <td>Kauan Ribeiro</td>
                <td class="email-col">kauan.ribeiro753@gmail.com</td>
                <td class="fone-col">(67) 99942-1110</td>
                <td><button type="button" class="status active">Ativo</button></td>
                <td>
                  <a class="edit-icon" href="editar-adm.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button class=" open-modal" data-modal="modal-deleta">
                    <i class="fa-solid fa-trash" ></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">09</td>
                <td>Vini Count</td>
                <td class="email-col">count.vini99@gmail.com</td>
                <td class="fone-col">(67) 99210-2566</td>
                <td><button type="button" class="status inactive">Inativo</button></td>
                <td>
                  <a class="edit-icon" href="editar-adm.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button class=" open-modal" data-modal="modal-deleta">
                    <i class="fa-solid fa-trash" ></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">10</td>
                <td>Isabela Oliveira</td>
                <td class="email-col">isa.bela555@gmail.com</td>
                <td class="fone-col">(67) 96841-5517</td>
                <td><button type="button" class="status active">Ativo</button></td>
                <td>
                  <a class="edit-icon" href="editar-adm.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button class=" open-modal" data-modal="modal-deleta">
                    <i class="fa-solid fa-trash" ></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">11</td>
                <td>Kelvin Bach</td>
                <td class="email-col">kelvin.bach0208@gmail.com</td>
                <td class="fone-col">(67) 90208-5623</td>
                <td><button type="button" class="status inactive">Inativo</button></td>
                <td>
                  <a class="edit-icon" href="editar-adm.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button class=" open-modal" data-modal="modal-deleta">
                    <i class="fa-solid fa-trash" ></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">12</td>
                <td>Paulo Henrique</td>
                <td class="email-col">paulo.henrique33@gmail.com</td>
                <td class="fone-col">(67) 98345-6789</td>
                <td><button type="button" class="status active">Ativo</button></td>
                <td>
                  <a class="edit-icon" href="editar-adm.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button class="open-modal" data-modal="modal-deleta">
                    <i class="fa-solid fa-trash" ></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="btns">
            <a href="gerenciar-adm.php" class="voltar">
            <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
            </a>
        </div>  
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
        <!-- Modal confirmação -->
        <!-- <div class="mensagem-recusar" id="recusado-sucesso">
                    <div class="mensagem-content-recusar">
                        <h1 class="mensagem-texto-recusar">Concluído com sucesso!</h1>
                        <a href="#"><button class="botao-confirmar">Confirmar</button></a>
                    </div>
                </div> -->

    </main>
    <div class="bolas-fundo">
        <img src="../../../Public/imgs/img-listar-colaboradores/Elemento1.FolhaAzul.png" alt="FolhaAzul" class="folhaAzul1-yan">
        <img src="../../../Public/imgs/img-listar-colaboradores/Elemento2.FolhaAzul.png" alt="FolhaAzul2" class="folhaAzul2-yan">
        <img src="../../../Public/imgs/img-listar-colaboradores/Elemento3.ElipseAzul.png" alt="FolhaRosa" class="folhaRosa-yan">
    </div>

    <script src="../../../Public/js/js-modais/js-abrir-modal.js" defer></script>
</body>

</html>