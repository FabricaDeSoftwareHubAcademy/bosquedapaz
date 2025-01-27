<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosque da Paz</title>
    <script src="../../../Public/js/js-adm/status-colaborador.js" defer></script>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-listar-colaboradores.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>
  <?php include "../../../Public/assets/adm/menu-adm.html"?>
    <!-- <header class="menu-adm">
        <div class="logo">
            <img src="../../../Public/imgs/img-listar-colaboradores/logo.png" alt="Logo da Feira" class="img-logo">
        </div>

        <nav class="nav-bar">
            <ul class="nav-list">
                <li class="nav-item"><a href="#">Área Administrativa</a></li>
                <li class="nav-item"><a href="#">Eventos</a>
                    <ul class="submenu">
                        <li><a href="" class="item-submenu">Cadastrar Evento</a></li>
                        <li><a href="" class="item-submenu">Gerenciar Evento</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#">Expositores</a>
                    <ul class="submenu">
                        <li><a href="" class="item-submenu">Cadastrar Expositor</a></li>
                        <li><a href="" class="item-submenu">Cadastrar Expositor Kids</a></li>
                        <li><a href="" class="item-submenu">Cadastrar Artista</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#">Carrossel</a>
                    <ul class="submenu">
                        <li><a href="" class="item-submenu">Cadastrar Carrosel</a></li>
                        <li><a href="" class="item-submenu">Editar Carrosel</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#">Categorias</a>
                    <ul class="submenu">
                        <li><a href="" class="item-submenu">Todas Categorias</a></li>
                        <li><a href="" class="item-submenu">Cadastrar Categorias</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#">Relatórios</a>
                    <ul class="submenu">
                        <li><a href="" class="item-submenu">Relatório de usuários</a></li>
                        <li><a href="" class="item-submenu">Validação de expositores</a></li>
                        <li><a href="" class="item-submenu">Relatório de expositores</a></li>
                        <li><a href="" class="item-submenu">Relatório de eventos</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#">Parceiros</a>
                    <ul class="submenu">
                        <li><a href="" class="item-submenu">Cadastrar parceiros</a></li>
                        <li><a href="" class="item-submenu">Editar parceiros</a></li>
                    </ul>
                </li>
            </ul>
            <button class="btn-login"><a href="">Login</a></button>
        </nav>

        <div class="sandwich-menu" onclick="mostrarMenu()">
            <img src="../../../Public/imgs/img-listar-colaboradores/menu.png" alt="menu" class="menu">
        </div>

        <div class="login">
            <img src="../../../Public/imgs/img-listar-colaboradores/login.png" alt="Botão de login" class="img-login">
        </div>
    </header> -->
    
    <main class="principal">
        <div class="box">
            <h2>LISTAR COLABORADORES</h2>
            <div class="container">
                <div class="search-bar">
                  <label for="status">Procurar</label>
                  <input type="text" id="status" placeholder="Colaborador" />
                  <button class="search-button">BUSCAR</button>
                </div>
            
                <table class="collaborators-table">
                  <thead>
                    <tr>
                      <th class="usuario-col">Usuário</th>
                      <th>Nome</th>
                      <th class="email-col">E-mail</th>
                      <th class="fone-col">Telefone</th>
                      <th>Status</th>
                      <th>Editar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Rascunho  -->
                    <tr>
                      <td class="usuario-col">01</td>
                      <td>Carla  Costa</td>
                      <td class="email-col">carla.costa123@gmail.com</td>
                      <td class="fone-col">(67) 98123-4567</td>
                      <td><button class="status active">Ativo</button></td>
                      <td>
                          <a href="editar-adm.php">
                              <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="usuario-col">02</td>
                      <td>Juan Quintela</td>
                      <td class="email-col">juan.quintela987@gmail.com</td>
                      <td class="fone-col">(67) 98234-5678</td>
                      <td><button class="status inactive">Inativo</button></td>
                      <td>
                          <a href="editar-adm.php">
                              <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="usuario-col">03</td>
                      <td>Julia Souza</td>
                      <td class="email-col">julia.souza456@gmail.com</td>
                      <td class="fone-col">(67) 98945-6789</td>
                      <td><button class="status active">Ativo</button></td>
                      <td>
                          <a href="editar-adm.php">
                              <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                      </td>
                    </tr>
                    <tr>
                        <td class="usuario-col">04</td>
                        <td>Pedro Alves</td>
                        <td class="email-col">pedro.alves789@gmail.com</td>
                        <td class="fone-col">(67) 98845-6789</td>
                        <td><button class="status inactive">Inativo</button></td>
                        <td>
                          <a href="editar-adm.php">
                              <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                        </td>
                      </tr>
                    <tr>
                        <td class="usuario-col">05</td>
                        <td>Nara Helena</td>
                        <td class="email-col">nara.helena126@gmail.com</td>
                        <td class="fone-col">(67) 98345-6789</td>
                        <td><button class="status active">Ativo</button></td>
                        <td>
                          <a href="editar-adm.php">
                              <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                        </td>
                      </tr>
                    <tr>
                        <td class="usuario-col">06</td>
                        <td>Fernanda Santos</td>
                        <td class="email-col">fernanda.santos126@gmail.com</td>
                        <td class="fone-col">(67) 97345-6623</td>
                        <td><button class="status active">Ativo</button></td>
                        <td>
                          <a href="editar-adm.php">
                              <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                        </td>
                      </tr>
                    <tr>
                        <td class="usuario-col">07</td>
                        <td>Emanuelle Valadares</td>
                        <td class="email-col">manu.vala777@gmail.com</td>
                        <td class="fone-col">(67) 98885-6888</td>
                        <td><button class="status inactive">Inativo</button></td>
                        <td>
                          <a href="editar-adm.php">
                              <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                        </td>
                      </tr>
                    <tr>
                        <td class="usuario-col">08</td>
                        <td>Kauan Ribeiro</td>
                        <td class="email-col">kauan.ribeiro753@gmail.com</td>
                        <td class="fone-col">(67) 99942-1110</td>
                        <td><button class="status active">Ativo</button></td>
                        <td>
                          <a href="editar-adm.php">
                              <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                        </td>
                      </tr>
                    <tr>
                        <td class="usuario-col">09</td>
                        <td>Vini Count</td>
                        <td class="email-col">count.vini99@gmail.com</td>
                        <td class="fone-col">(67) 99210-2566</td>
                        <td><button class="status inactive">Inativo</button></td>
                        <td>
                          <a href="editar-adm.php">
                              <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                        </td>
                      </tr>
                    <tr>
                        <td class="usuario-col">10</td>
                        <td>Isabela Oliveira</td>
                        <td class="email-col">isa.bela555@gmail.com</td>
                        <td class="fone-col">(67) 96841-5517</td>
                        <td><button class="status active">Ativo</button></td>
                        <td>
                          <a href="editar-adm.php">
                              <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                        </td>
                      </tr>
                    <tr>
                        <td class="usuario-col">11</td>
                        <td>Kelvin Bach</td>
                        <td class="email-col">kelvin.bach0208@gmail.com</td>
                        <td class="fone-col">(67) 90208-5623</td>
                        <td><button class="status inactive">Inativo</button></td>
                        <td>
                          <a href="editar-adm.php">
                              <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                        </td>
                      </tr>
                    <tr>
                        <td class="usuario-col">12</td>
                        <td>Paulo Henrique</td>
                        <td class="email-col">paulo.henrique33@gmail.com</td>
                        <td class="fone-col">(67) 98345-6789</td>
                        <td><button class="status active">Ativo</button></td>
                        <td>
                          <a href="editar-adm.php">
                              <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                        </td>
                      </tr>  
                  </tbody>
                </table>
        <div class="btns">
            <a href="gerenciar-adm.php" class="voltar">
            <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
            </a>
        </div>  
        </div>
    </main>
    <div class="bolas-fundo">
        <img src="../../../Public/imgs/img-listar-colaboradores/Elemento1.FolhaAzul.png" alt="FolhaAzul" class="folhaAzul1-yan">
        <img src="../../../Public/imgs/img-listar-colaboradores/Elemento2.FolhaAzul.png" alt="FolhaAzul2" class="folhaAzul2-yan">
        <img src="../../../Public/imgs/img-listar-colaboradores/Elemento3.ElipseAzul.png" alt="FolhaRosa" class="folhaRosa-yan">
    </div>
    
</body>
</html>