<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adm - Bosque da Paz</title>
  <!-- <link rel="stylesheet" href="../../../Public/css/menu-home.css"> -->
  <link rel="stylesheet" href="../../../Public/css/css-adm/style-relatorio-expositor.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
</head>

<body>
  <?php include "../../../Public/assets/adm/menu-adm.html" ?>

  <main class="principal">
    <div class="box">
      <h2>RELATÓRIO DE EXPOSITOR</h2>
      <div class="container">
        <div class="search-bar">
          <label for="status">Procurar</label>
          <input type="text" id="status" placeholder="Expositor" />
          <button class="search-button">BUSCAR</button>
        </div>
        <div class="table-container">
          <table class="collaborators-table">
            <thead>
              <tr>
                <th class="usuario-col">Usuário</th>
                <th>Nome</th>
                <th class="email-col">E-mail</th>
                <th class="fone-col">Telefone</th>
                <th class="barraca-col">N. Barraca</th>
                <th>Status</th>
                <th>Editar</th>
              </tr>
            </thead>
            <tbody>
              <!-- Rascunho  -->
              <tr>
                <td class="usuario-col">01</td>
                <td>Carla Costa</td>
                <td class="email-col">carla.costa123@gmail.com</td>
                <td class="fone-col">(67) 98123-4567</td>
                <td class="barraca-col">6</td>
                <td><button class="status active">Ativo</button></td>
                <td class="edit">
                  <a href="edicao-expositor.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">02</td>
                <td>Juan Quintela</td>
                <td class="email-col">juan.quintela987@gmail.com</td>
                <td class="fone-col">(67) 98234-5678</td>
                <td class="barraca-col">12</td>
                <td><button class="status inactive">Inativo</button></td>
                <td class="edit">
                  <a href="edicao-expositor.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">03</td>
                <td>Julia Souza</td>
                <td class="email-col">julia.souza456@gmail.com</td>
                <td class="fone-col">(67) 98945-6789</td>
                <td class="barraca-col">10</td>

                <td><button class="status active">Ativo</button></td>
                <td class="edit">
                  <a href="edicao-expositor.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">13</td>
                <td>Pedro Alves</td>
                <td class="email-col">pedro.alves789@gmail.com</td>
                <td class="fone-col">(67) 98845-6789</td>
                <td class="barraca-col">6</td>

                <td><button class="status inactive">Inativo</button></td>
                <td class="edit">
                  <a href="edicao-expositor.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">05</td>
                <td>Nara Helena</td>
                <td class="email-col">nara.helena126@gmail.com</td>
                <td class="fone-col">(67) 98345-6789</td>
                <td class="barraca-col">45</td>

                <td><button class="status active">Ativo</button></td>
                <td class="edit">
                  <a href="edicao-expositor.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">06</td>
                <td>Fernanda Santos</td>
                <td class="email-col">fernanda.santos126@gmail.com</td>
                <td class="fone-col">(67) 97345-6623</td>
                <td class="barraca-col">24</td>

                <td><button class="status active">Ativo</button></td>
                <td class="edit">
                  <a href="edicao-expositor.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">07</td>
                <td>Emanuelle Valadares</td>
                <td class="email-col">manu.vala777@gmail.com</td>
                <td class="fone-col">(67) 98885-6888</td>
                <td class="barraca-col">26</td>

                <td><button class="status inactive">Inativo</button></td>
                <td class="edit">
                  <a href="edicao-expositor.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">08</td>
                <td>Kauan Ribeiro</td>
                <td class="email-col">kauan.ribeiro753@gmail.com</td>
                <td class="fone-col">(67) 99942-1110</td>
                <td class="barraca-col">23</td>

                <td><button class="status active">Ativo</button></td>
                <td class="edit">
                  <a href="edicao-expositor.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">09</td>
                <td>Vini Count</td>
                <td class="email-col">count.vini99@gmail.com</td>
                <td class="fone-col">(67) 99210-2566</td>
                <td class="barraca-col">75</td>

                <td><button class="status inactive">Inativo</button></td>
                <td class="edit">
                  <a href="edicao-expositor.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">10</td>
                <td>Isabela Oliveira</td>
                <td class="email-col">isa.bela555@gmail.com</td>
                <td class="fone-col">(67) 96841-5517</td>
                <td class="barraca-col">2</td>

                <td><button class="status active">Ativo</button></td>
                <td class="edit">
                  <a href="edicao-expositor.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">11</td>
                <td>Kelvin Bach</td>
                <td class="email-col">kelvin.bach0208@gmail.com</td>
                <td class="fone-col">(67) 90208-5623</td>
                <td class="barraca-col">44</td>

                <td><button class="status inactive">Inativo</button></td>
                <td class="edit">
                  <a href="edicao-expositor.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td class="usuario-col">12</td>
                <td>Paulo Henrique</td>
                <td class="email-col">paulo.henrique33@gmail.com</td>
                <td class="fone-col">(67) 98345-6789</td>
                <td class="barraca-col">7</td>

                <td><button class="status active">Ativo</button></td>
                <td class="edit">
                  <a href="edicao-expositor.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="btns">
          <a href="gerenciar-relatorios.php" class="voltar">
            <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
          </a>
        </div>
      </div>
  </main>

  <div class="bolas-fundo">
    <img class="bola-azul1" src="../../../Public/imgs/imagens-bolas/azul-sem-fundo1.png" alt="">
    <img class="bola-azul2" src="../../../Public/imgs/imagens-bolas/azul-sem-fundo2.png" alt="">
    <img class="bola-azul3" src="../../../Public/imgs/imagens-bolas/azul-sem-fundo3.png" alt="">
  </div>

  <script src="../../../Public/js//js-adm/status-colaborador.js"></script>
</body>

</html>