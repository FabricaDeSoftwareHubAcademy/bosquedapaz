<?php
require_once '../../../actions/atracao/listar_atracao.php';

?>


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
    include "../../../Public/assets/adm/menu-adm.html"; 
    require_once '../../../app/adm/Controller/Atracao.php';

    $atracao = new Atracao();
    $lista = $atracao->listar();
    ?>

    <main class="principal">
        <div class="box">
            <h2>GERENCIAR ATRAÇÃO</h2>
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
                                <th>Descrição</th>
                                <th>Evento</th>
                                <th>Editar</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista as $a): ?>
                                <tr>
                                    <td><?= htmlspecialchars($a->getNome()) ?></td>
                                    <td><?= htmlspecialchars($a->getDescricao()) ?></td>
                                    <td><?= htmlspecialchars($a->getIdEvento()) ?></td>
                                    <td>
                                        <a href="editar-atracao.php?id=<?= $a->getId() ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <?php if (!empty($a->getFoto())): ?>
                                            <img src="../../../Public/uploads/atracoes/<?= htmlspecialchars($a->getFoto()) ?>" alt="Foto da Atração" width="50">
                                        <?php else: ?>
                                            Sem imagem
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <button class="voltar">
                    <a href="Area-Adm.php" class="voltar-link">
                        <img src="../../../Public/imgs/img-area-contate/seta-voltar.png" class="btn-voltar">
                    </a>
                </button>
                <div class="b-voltar"></div>

                <div class="botoes">
                    <a href="cadastrar-atracao.php"><button class="novo-evento">Nova atração</button></a>
                </div>
            </div>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/imgs/imagens-bolas/bola azul1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola azul2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola azu.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-adm/status-colaborador.js"></script>
    <script src="../../../Public/js/js-adm/modal-gerenciar-eventos.js" defer></script>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
</body>

</html>