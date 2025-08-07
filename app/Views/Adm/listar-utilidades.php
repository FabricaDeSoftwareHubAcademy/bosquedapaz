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
        <link rel="stylesheet" href="../../../Public/css/css-adm/style-listar-utilidades.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    
    <body>
        <?php include "../../../Public/include/menu-adm.html" ?>
        <main class="principal">
        <div class="box">
            <h2>UTILIDADES PÚBLICAS</h2>
            <div class="container">
                <div class="search-bar">
                    <label for="status">Procurar</label>
                    <input type="text" id="status" placeholder="Utilidade pública" />
                    <?php echo $tolken; ?>
                    <button class="search-button">BUSCAR</button>
                    <div id="results-container"></div>
                </div>
                <div class="table-container">
                    <table class="collaborators-table">
                        <thead>
                            <tr>
                                <th class="usuario-col">Nome</th>
                                <th>Data Início</th>
                                <th>Data Fim</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="corpo_table">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="btns">
            <a href="Area-adm.php" class="voltar">
                <img src="../../../Public/assets/icons/voltar.svg" alt="Botão de voltar" class="btn-voltar">
            </a>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/assets/img-bolas/bola-azul1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/assets/img-bolas/bola-azul2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/assets/img-bolas/bola-azul.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <?php include "../../../Public/include/modais/modal-confirmar.html"?>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/listar-utilidades-publicas.js" defer></script>
    <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
</body>

</html>