<?php include "../../../Public/assets/adm/menu-adm.html"?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Página para gerenciar parceiros e suas informações.">
        <title>Listar Categorias</title>
        <link rel="stylesheet" href="../../../Public/css/css-adm/tela-parceiros.css">
        <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
    <header class="cabecalho">
        <main class="principal">
            <div class="box">
                <h2>CATEGORIAS</h2>
                <div class="container">
                    <div class="search-bar">
                        <label for="status">Procurar</label>
                        <input type="text" id="status" placeholder="Categorias" />
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
                            <td>Artesanato</td>                    
                            <td><button class="status active">Ativo</button></td>
                            <td>
                                <a href="editar-categorias.php" class="edit-icon">
                                    <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                </a>
                                <a class="delete-icon">
                                    <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
                                </a>
                            </td>
                        </tr>
                            <tr>
                            <tr>
                                <td class="usuario-col">2</td>
                                <td>Antiguidade</td>
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a href="editar-categorias.php" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                    <a class="delete-icon">
                                        <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuario-col">3</td>
                                <td>Colecionismo</td>
                                <td><button class="status inactive">Inativo</button></td>
                                <td>
                                    <a href="editar-categorias.php" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>    
                                    <a class="delete-icon">
                                        <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuario-col">4</td>
                                <td>Cosmetologia</td>
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a href="editar-categorias.php" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                    <a class="delete-icon">
                                        <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
                                    </a>
                                </td>
                            </tr>
                                <td class="usuario-col">5</td>
                                <td>Gastronomia</td>
                                <td><button class="status inactive">Inativo</button></td>
                                <td>
                                    <a href="editar-categorias.php" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                    <a class="delete-icon">
                                        <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                            <td class="usuario-col">6</td>
                            <td>Literatura</td>                    
                            <td><button class="status active">Ativo</button></td>
                            <td>
                                <a href="editar-categorias.php" class="edit-icon">
                                    <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                </a>
                                <a class="delete-icon">
                                    <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="usuario-col">7</td>
                            <td>Moda Autoral</td>                    
                            <td><button class="status active">Ativo</button></td>
                            <td>
                                <a href="editar-categorias.php" class="edit-icon">
                                    <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                </a>
                                <a class="delete-icon">
                                    <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="usuario-col">8</td>
                            <td>Plantas</td>                    
                            <td><button class="status inactive">Inativo</button></td>
                            <td>
                                <a href="editar-categorias.php" class="edit-icon">
                                    <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                </a>
                                <a class="delete-icon">
                                    <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="usuario-col">9</td>
                            <td>Sustentabilidade</td>                    
                            <td><button class="status active">Ativo</button></td>
                            <td>
                                <a href="editar-categorias.php" class="edit-icon">
                                    <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                </a>
                                <a class="delete-icon">
                                    <i class="fa-solid fa-trash open-modal" data-modal="edit-modal"></i>
                                </a>
                            </td>
                        </tr>  
                        </tbody>
                    </table>
            <div class="btns">
                <a href="gerenciar-parceiros.php" class="voltar">
                <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>
            </div> 

            <dialog id="edit-modal" class="modal-edit">
                <h2>Confirmar alteração</h2>
                <input type="text" value="SENAC Serviço Nacional de Aprendizagem Comercial">
                <p>Tem certeza que deseja fazer isso?</p>
                <div>
                    <button id="edit-cancel" class="cancel-btn close-modal" data-modal="edit-modal">Cancelar</button>
                    <button id="edit-confirm" class="confirm-btn close-modal" data-modal="edit-modal">Confirmar</button>
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