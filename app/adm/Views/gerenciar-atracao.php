<!DOCTYPE html>
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
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>

    <main class="principal">
        <div class="box">
            <h2>GERENCIAR ATRAÇÃO</h2>
            <div class="container">
                <div class="search-bar">
                    <label for="status">Procurar</label>
                    <input type="text" id="status" placeholder="" />
                    <button class="search-button">BUSCAR</button>
                </div>
                <div class="table-container">
                    <table class="collaborators-table">
                        <thead>
                            <tr>
                                <th class="usuario-col">Nome da atração</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th class="fone-col">Editar</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 1; $i <= 12; $i++): ?>
                                <tr>
                                    <td class="usuario-col">Atração <?php echo $i; ?></td>
                                    <td>Data <?php echo $i; ?></td>
                                    <td><button class="status <?php echo ($i % 2 == 0) ? 'inactive' : 'active'; ?>"> <?php echo ($i % 2 == 0) ? 'Inativo' : 'Ativo'; ?></button></td>
                                    <td class="fone-col">
                                        <a href="editar-expositor.php">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td class="mais">
                                        <button class="open-modal" data-modal="modal-fotos">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>

                <button class="voltar">
                    <a href="Area-Adm.php" class="voltar-link">
                        <img src="../../../Public/imgs/img-area-contate/seta-voltar.png" class="btn-voltar">
                    </a>
                </button>
                <div class="b-voltar">
                </div>
                <div class="botoes">
                    <a href="../../../app/adm/Views/cadastrar-atracao.php"><button class="novo-evento">Nova atração</button></a>
                </div>
                <div class="modal" id="modal-fotos">
                    <div class="modal-content">
                        <span class="close-modal" data-modal="modal-fotos">&times;</span>
                        <h3>Adicionar Fotos ao Evento</h3>
                        <p>Limite de 5 Fotos por Evento</p>
                        <input type="file" multiple>
                        <button class="submit-fotos">Adicionar Fotos</button>
                    </div>
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
</body>

</html>