<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Página para gerenciar parceiros e suas informações.">
        <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
        <title>Parceiros</title>
        <link rel="stylesheet" href="../../../Public/css/css-adm/style-listar-parceiros.css">
        <link rel="stylesheet" href="../../../Public/css/menu-adm.css">;
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />     
    </head>

    <body>
        <?php include "../../../Public/assets/adm/menu-adm.html"?>
        <header class="cabecalho">
            <main class="principal">
                <div class="box">
                    <h2>NOSSOS PARCEIROS</h2>
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
                                <th>Status</th>
                                <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody> 
                            <tr>
                                <td class="usuario-col">1</td>
                                <td>SENAC-Serviço Nacional de Aprendizagem Comercial</td>                    
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a href="#modal-editar" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                    <a href="#modal-recusar" class="delete-icon">
                                        <i class="fa-solid fa-trash open-modal" data-modal="delete-modal"></i>
                                    </a>
                                </td>
                            </tr>
                                <tr>
                                <tr>
                                    <td class="usuario-col">2</td>
                                    <td>Shopping Bosque dos Ipês</td>
                                    <td><button class="status active">Ativo</button></td>
                                    <td>
                                        <a href="#modal-editar" class="edit-icon">
                                            <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                        </a>
                                        <a href="#modal-recusar" class="delete-icon">
                                            <i class="fa-solid fa-trash open-modal" data-modal="delete-modal"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="usuario-col">3</td>;
                                    <td>SEBRAE-Serviço Brasileiro de Apoio às Micro e Pequenas Empresas</td>
                                    <td><button class="status inactive">Inativo</button></td>
                                    <td>
                                        <a href="#modal-editar" class="edit-icon">
                                            <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                        </a>    
                                        <a href="#modal-recusar" class="delete-icon">
                                            <i class="fa-solid fa-trash open-modal" data-modal="delete-modal"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="usuario-col">4</td>
                                    <td>Prefeitura Municipal De Campo Grande MS</td>
                                    <td><button class="status active">Ativo</button></td>
                                    <td>
                                        <a href="#modal-editar" class="edit-icon">
                                            <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                        </a>
                                        <a href="#modal-recusar" class="delete-icon">
                                            <i class="fa-solid fa-trash open-modal" data-modal="delete-modal"></i>
                                        </a>
                                    </td>
                                </tr>
                                    <td class="usuario-col">5</td>
                                    <td>SECTUR Campo Grande</td>
                                    <td><button class="status active">Ativo</button></td>
                                    <td>
                                        <a href="#modal-editar" class="edit-icon">
                                            <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                        </a>
                                        <a href="#modal-recusar" class="delete-icon">
                                            <i class="fa-solid fa-trash open-modal" data-modal="delete-modal"></i>
                                        </a>    
                                    </td>
                                </tr>  
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="btns">
                    <a href="gerenciar-parceiros.php" class="voltar">
                    <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                    </a>
                </div> 

                <!-- Modal de Editar -->
                <div class="acao-editar" id="modal-editar">
                    <div class="acao-content-editar">
                        <h1 class="acao-texto-editar">Editar parceiro</h1>
                        <input class="acao-input-edit" type="text" value="SENAC-Serviço Nacional de Aprendizagem Comercial">
                        <input class="acao-input-edit" type="text" value="SENAC-Serviço Nacional de Aprendizagem Comercial">
                        <input class="acao-input-edit" type="text" value="SENAC-Serviço Nacional de Aprendizagem Comercial">
                        <input class="acao-input-edit" type="text" value="SENAC-Serviço Nacional de Aprendizagem Comercial">
                        <div class="acao-botoes-editar">
                            <a href=""><button class="botao-cancelar">Cancelar</button></a>
                            <a href="#recusado-sucesso"><button class="botao-confirmar">Salvar</button></a>
                        </div>
                    </div>
                </div>

                <!-- Modal de Delete -->
                <div class="acao-recusar" id="modal-recusar">
                    <div class="acao-content-recusar">
                        <h1 class="acao-texto-recusar">Deseja excluir o expositor?</h1>
                        <div class="acao-botoes-recusar">
                            <a href=""><button class="botao-cancelar">Cancelar</button></a>
                            <a href="#recusado-sucesso"><button class="botao-confirmar">Excluir</button></a>
                        </div>
                    </div>
                </div>

                <!-- Modal confirmação -->
                <div class="mensagem-recusar" id="recusado-sucesso">
                    <div class="mensagem-content-recusar">
                        <h1 class="mensagem-texto-recusar">Concluído com sucesso!</h1>
                        <a href="#"><button class="botao-confirmar">Confirmar</button></a>
                    </div>
                </div>

         
            </main>

                <div class="bolas-fundo">
                    <img class="bola-azul1"   src="../img/Elemento1.FolhaAzul.png" alt="">
                    <img class="bola-azul2"   src="../img/Elemento2.FolhaAzul.png" alt="">
                    <img class="bola-azul3"   src="../img/Elemento3.ElipseAzul.png" alt="">
                </div>

        <script src="../../../Public/js//js-adm/status-colaborador.js"></script>
        <!-- <script src="../../../Public/js/js-modais/js-abrir-modal.js" defer></script> -->
    </body>

   
</html>