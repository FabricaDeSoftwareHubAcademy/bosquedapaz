<?php include "../../../Public/assets/adm/menu-adm.html"?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Página para gerenciar parceiros e suas informações.">
        <title>Parceiros</title>
        <link rel="stylesheet" href="../../../Public/css/css-adm/tela-parceiros.css">
        <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    </head>

    <body>
    <header class="cabecalho">
        <main class="principal">
            <div class="box">
                <h2>PARCEIROS</h2>
                <div class="container">
                    <div class="search-bar">
                      <label for="status">Procurar</label>
                      <input type="text" id="status" placeholder="Parceiros" />
                      <button class="search-button">BUSCAR</button>
                    </div>
                
                    <table class="collaborators-table">
                      <thead>
                        <tr>
                          <th class="usuario-col">ID</th>
                          <th>Nome</th>
                          <th class="email-col">Descrição</th>
                          <th>Status</th>
                          <th>Editar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Rascunho  -->
                       
                        <tr>
                            <td class="usuario-col">1</td>
                            <td>SENAC Serviço Nacional de Aprendizagem Comercial</td>
                            <td class="email-col"></td>                       
                            <td><button class="status active">Ativo</button></td>
                            <td>
                              <a href="edicao-expositor.html">
                                  <i class="fa-solid fa-pen-to-square"></i>
                              </a>
                            </td>
                          </tr>
                        <tr>
                        <tr>
                            <td class="usuario-col">2</td>
                            <td>Shopping Bosque dos Ipês</td>
                            <td class="email-col"></td>
                            <td><button class="status active">Ativo</button></td>
                            <td>
                              <a href="edicao-expositor.html">
                                  <i class="fa-solid fa-pen-to-square"></i>
                              </a>
                            </td>
                          </tr>
                        <tr>
                            <td class="usuario-col">3</td>
                            <td>SEBRAE Serviço Brasileiro de Apoio às Micro e Pequenas Empresas</td>
                            <td class="email-col"></td>
                            <td><button class="status inactive">Inativo</button></td>
                            <td>
                              <a href="edicao-expositor.html">
                                  <i class="fa-solid fa-pen-to-square"></i>
                              </a>
                            </td>
                          </tr>
                        <tr>
                            <td class="usuario-col">4</td>
                            <td>Prefeitura Municipal De Campo Grande MS</td>
                            <td class="email-col"></td>
                            <td><button class="status active">Ativo</button></td>
                            <td>
                              <a href="edicao-expositor.html">
                                  <i class="fa-solid fa-pen-to-square"></i>
                              </a>
                            </td>
                          </tr>
                            <td class="usuario-col">5</td>
                            <td>SECTUR Campo Grande</td>
                            <td class="email-col"></td>
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