<?php require_once __DIR__ . '/../../../app/helpers/auth.php';?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página para gerenciar parceiros e suas informações.">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-listar-parceiros.css">
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php include "../../../Public/include/menu-adm.html" ?>
    <main class="principal">
        <div class="box">
            <h2>PARCEIROS</h2>
            <div class="container">
                <div class="search-bar">
                    <label for="status">Procurar</label>
                    <input type="text" id="status" placeholder="Parceiros" />
                    <button class="search-button">BUSCAR</button>
                </div>
                <div class="table-container">
                    <table class="collaborators-table">
                        <thead>
                            <tr>
                                <th class="usuario-col">Parceiro</th>
                                <th>Contato</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="usuario-col">Shopping Bosque dos Ipês</td>
                                <td>João</td>
                                <td>(67)99999-9999</td>
                                <td>bosquedosipes@bosque.com</td>
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a href="#modal-editar" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                </td>
                            </tr>                         
                            <tr>
                                <td class="usuario-col">Prefeitura de Campo Grande</td>
                                <td>Rosângela</td>
                                <td>(67)99999-9999</td>
                                <td>prefeituracgr@prefeitura.com</td>
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a href="#modal-editar" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuario-col">Sebrae</td>
                                <td>Greyce</td>
                                <td>(67)99999-9999</td>
                                <td>sebrae@sebrae.com</td>
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a href="#modal-editar" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuario-col">Senac</td>
                                <td>Amaury</td>
                                <td>(67)99999-9999</td>
                                <td>senac@senac.com</td>
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a href="#modal-editar" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuario-col">Sectur</td>
                                <td>Elizeu</td>
                                <td>(67)99999-9999</td>
                                <td>secur@sectur.com</td>
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a href="#modal-editar" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- <div class="btns">
            <a href="Area-Adm.php" class="voltar">
                <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
            </a>
        </div> -->
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/assets/img-bolas/bola-verde1.png" alt="Bola de Fundo 1" class="bola-verde1">
        <img src="../../../Public/assets/img-bolas/bola-verde2.png" alt="Bola de Fundo 2" class="bola-verde2">
        <img src="../../../Public/assets/img-bolas/bola-rosa.png" alt="Bola de Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js//js-adm/status-colaborador.js"></script>
    <script src="../../../Public/js/js-modais/js-abrir-modal.js" defer></script>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
</body>

</html>