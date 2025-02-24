<?php include "../../../Public/assets/adm/menu-adm.html"?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Página para gerenciar parceiros e suas informações.">
        <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
        <title>Parceiros</title>
        <link rel="stylesheet" href="../../../Public/css/css-adm/style-listar-parceiros.css">
        <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        
    </head>

    <body>
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
                                <a class="edit-icon">
                                    <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                </a>
                                <a class="delete-icon">
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
                                    <a class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                    <a class="delete-icon">
                                        <i class="fa-solid fa-trash open-modal" data-modal="delete-modal"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuario-col">3</td>
                                <td>SEBRAE-Serviço Brasileiro de Apoio às Micro e Pequenas Empresas</td>
                                <td><button class="status inactive">Inativo</button></td>
                                <td>
                                    <a class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>    
                                    <a class="delete-icon">
                                        <i class="fa-solid fa-trash open-modal" data-modal="delete-modal"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuario-col">4</td>
                                <td>Prefeitura Municipal De Campo Grande MS</td>
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                    <a class="delete-icon">
                                        <i class="fa-solid fa-trash open-modal" data-modal="delete-modal"></i>
                                    </a>
                                </td>
                            </tr>
                                <td class="usuario-col">5</td>
                                <td>SECTUR Campo Grande</td>
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                    <a class="delete-icon">
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

            <!-- Modal de Edição -->
            <dialog id="edit-modal" class="modal-edit">
                <h2>Confirmar Alteração</h2>
                <input type="text" value="SENAC-Serviço Nacional de Aprendizagem Comercial">
                <p>Tem certeza que deseja editar este parceiro?</p>
                <div>
                    <button id="edit-cancel" class="cancel-btn close-modal" data-modal="edit-modal">Cancelar</button>
                    <button id="edit-confirm" class="confirm-btn close-modal" data-modal="edit-modal">Confirmar</button>
                </div>
            </dialog>

            <!-- Modal de Exclusão -->
            <dialog id="delete-modal" class="modal-delete">
                <h2>Confirmar Exclusão</h2>
                <p>Tem certeza que deseja excluir este parceiro? Esta ação não pode ser desfeita.</p>
                <div>
                    <button id="delete-cancel" class="cancel-btn close-modal" data-modal="delete-modal">Cancelar</button>
                    <button id="delete-confirm" class="confirm-btn close-modal" data-modal="delete-modal">Confirmar</button>
                </div>
            </dialog>


         
            
        </main>

            <div class="bolas-fundo">
                <img class="bola-azul1"   src="../img/Elemento1.FolhaAzul.png" alt="">
                <img class="bola-azul2"   src="../img/Elemento2.FolhaAzul.png" alt="">
                <img class="bola-azul3"   src="../img/Elemento3.ElipseAzul.png" alt="">
            </div>

    <script src="../../../Public/js//js-adm/status-colaborador.js"></script>
    <script src="../../../Public/js/js-modais/js-abrir-modal.js" defer></script>
</body>
</html>