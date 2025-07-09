<?php require_once __DIR__ . '/../../../app/helpers/auth.php';?>


<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosque da Paz - ADM</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-gerenciar-atracao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
</head>

<body>
    <?php
    include "../../../Public/include/menu-adm.html";
    ?>

    <main class="principal">
        <div class="box">
            <h2 id="titulo-atracoes">Gerenciar Atrações</h2>
            <div class="container">
                <div class="search-bar">
                    <label for="busca">Procurar</label>
                    <input type="text" id="busca" placeholder="Buscar por nome da atração" />
                    <button class="search-button">BUSCAR</button>
                </div>
                <div class="table-container">
                    <table class="collaborators-table">
                        <thead>
                            <tr>
                                <th class="usuario-col">Nome da atração</th>
                                <th>Editar</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        
                        <tbody id="lista-atrações">
        <!-- Eventos serão adicionados aqui via JS -->
                            
                        </tbody>
                    </table>
                </div>

                <button class="voltar">
                    <a href="Area-Adm.php" class="voltar-link">
                        <img src="../../../Public/assets/icons/voltar.png" class="btn-voltar">
                    </a>
                </button>
                <div class="b-voltar"></div>

                <div class="botoes">
                    <button id="nova-atracao" class="novo-evento">Nova Atração</button>
                </div>
            </div>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/assets/img-bolas/bola-azul1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/assets/img-bolas/bola-azul2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/assets/img-bolas/bola-azul.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/js-gerenciar-atracao.js"></script>
</body>

</html>