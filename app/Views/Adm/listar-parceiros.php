<?php 
include_once('../../helpers/csrf.php');
$tolken = getTolkenCsrf();
?>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

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
                    <?php echo $tolken;?>
                    <button class="search-button">BUSCAR</button>
                </div>

                <div class="table-container">
                    <table class="collaborators-table">
                        <thead>
                            <tr>
                                <th class="usuario-col">Parceiro</th>
                                <th>Contato</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <!-- status active -->
                        <!-- status inactive -->
                    </table>
                </div>
            </div>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/assets/img-bolas/bola-verde1.png" alt="Bola de Fundo 1" class="bola-verde1">
        <img src="../../../Public/assets/img-bolas/bola-verde2.png" alt="Bola de Fundo 2" class="bola-verde2">
        <img src="../../../Public/assets/img-bolas/bola-rosa.png" alt="Bola de Fundo 3" class="bola-rosa">
    </div>

    <div id="modalConfirmacao" class="modal-confirmacao" style="display: none;">
        <div class="modal-confirmacao-conteudo">
            <p>Deseja realmente alterar o status?</p>
            <div class="modal-confirmacao-botoes">
                <button id="confirmarAlteracao" class="modal-confirmacao-botao botao-sim">Sim</button>
                <button id="cancelarAlteracao" class="modal-confirmacao-botao botao-nao">Não</button>
            </div>
        </div>
    </div>
    <?php include "../../../Public/include/modais/modal-confirmar.html" ?>
    <!-- <script src="../../../Public/js//js-adm/status-colaborador.js"></script> -->
    <script src="../../../Public/js/js-modais/js-abrir-modal.js" defer></script>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/js-listar-parceiros/listar_parceiros.js"></script>
    <script src="../../../Public/js/js-adm/js-listar-parceiros/alterar_status.js"></script>
    <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
</body>

</html>