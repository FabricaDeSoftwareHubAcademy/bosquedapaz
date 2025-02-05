<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Expositor</title>
    <link rel="stylesheet" href="../../../Public/css/menu-home.css">
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-relatorio-expositor.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="cabecalho">
        <!-- inicio menu -->
            <nav class="menu">
    
                <div class="logo"><!-- logo -->
                    <a href="index.html"><img src="../img/logo.png" alt="Logo"></a>
                </div>
    
                <div class="nav-bar"> <!-- navegação -->
                    <ul>
                        <li><a href="#">Início</a></li>
                        <li><a href="#">Parceiros</a></li>
                        <li><a href="#">Fale Conosco</a></li>
                        <li><a href="#">Quem Somos?</a></li>
                    </ul>
                    
                    <div class="pesquisar-login">
                        <div class="pesquisar"> <!-- area de pesquisa -->
                            <input class="input" type="text" placeholder="Pesquisar por...">
                            <div class="bola"  onclick="inputShow2()">
                            </div>
                        </div>
                        <div class="login"> <!-- area login -->
                            <a href="#"><img src="../img/login.png" alt="Login"></a>
                        </div>
                    </div>
                </div>
    
                <div class="pequisa-mobile">
                    <div class="pesquisa"> <!-- area de pesquisa -->
                        <input class="input" type="text" placeholder="Pesquisar por...">
                        <div class="bola"  onclick="inputShow()">
                        </div>
                    </div>
                    <div class="menu-icon">
                        <button onclick="menuShow()"><img class="icon" src="../img/menu.png" alt="Menu"></button>
                    </div>
                </div>
            </nav>
            <!-- fim menu -->
    
            <!-- mobile menu -->
            <div class="mobile-menu"> <!-- navegação -->
                <ul class="nav-item">
                    <li class="nav-item"><a href="#">Início</a></li>
                    <li class="nav-item"><a href="#">Parceiros</a></li>
                    <li class="nav-item"><a href="#">Fale Conosco</a></li>
                    <li class="nav-item"><a href="#">Quem Somos?</a></li>
                </ul>
    
                <div class="btn-login"> <!-- area login -->
                    <button class="btnlogin">Login</button>
                </div>
            </div>
            <!-- mobile menu -->
        </header>

        <main class="principal">
            <div class="box">
                <h2>RELATÓRIO EXPOSITOR</h2>
                <div class="container">
                    <div class="search-bar">
                      <label for="status">Procurar</label>
                      <input type="text" id="status" placeholder="Expositor" />
                      <button class="search-button">BUSCAR</button>
                    </div>
                
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
                          <td>Carla  Costa</td>
                          <td class="email-col">carla.costa123@gmail.com</td>
                          <td class="fone-col">(67) 98123-4567</td>
                          <td class="barraca-col">6</td>
                          <td><button class="status active">Ativo</button></td>
                          <td>
                              <a href="editar-adm.html">
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
                          <td>
                              <a href="edicao-expositor.html">
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
                          <td>
                              <a href="edicao-expositor.html">
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
                            <td>
                              <a href="edicao-expositor.html">
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
                            <td>
                              <a href="edicao-expositor.html">
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
                            <td>
                              <a href="edicao-expositor.html">
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
                            <td>
                              <a href="edicao-expositor.html">
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
                            <td>
                              <a href="edicao-expositor.html">
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
                            <td>
                              <a href="edicao-expositor.html">
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
                            <td>
                              <a href="edicao-expositor.html">
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
                            <td>
                              <a href="edicao-expositor.html">
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
                            <td>
                              <a href="edicao-expositor.html">
                                  <i class="fa-solid fa-pen-to-square"></i>
                              </a>
                            </td>
                          </tr>  
                      </tbody>
                    </table>
            <div class="btns">
                <a href="Area-Adm.php" class="voltar">
                <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>
            </div>  
            </div>
        </main>

            <div class="bolas-fundo">
                <img class="bola-azul1"   src="../img/Elemento1.FolhaAzul.png" alt="">
                <img class="bola-azul2"   src="../img/Elemento2.FolhaAzul.png" alt="">
                <img class="bola-azul3"   src="../img/Elemento3.ElipseAzul.png" alt="">
            </div>

    <script src="../../../Public/js//js-adm/status-colaborador.js"></script>
</body>
</html>