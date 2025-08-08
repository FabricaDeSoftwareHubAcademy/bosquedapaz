<?php 
include_once('../../helpers/csrf.php');
$tolken = getTolkenCsrf();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-gerenciar-eventos.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include "../../../Public/include/menu-adm.html" ?>

    <main class="principal">
        <div class="box">
            <h2>Gerenciar Eventos</h2>
            <div class="container">
                <div class="search-bar">
                    <label>Procurar</label>
                    <input type="text" id="buscar" placeholder="" />
                    <button class="search-button">BUSCAR</button>
                </div>
                <div class="table-container">
                    <table class="collaborators-table">
                        <thead>
                            <tr>
                                <th class="usuario-col">Nome do Evento</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th class="fone-col">Editar</th>
                                <th class="fone-col">Atrações</th>
                                <th>Fotos</th>
                            </tr>
                        </thead>
                            <tbody id="lista-eventos">
                            <!--JS -->
                            </tbody>
                    </table>
                </div>

                <button class="voltar">
                    <a href="./" class="voltar-link">
                        <img src="../../../Public/assets/icons/voltar.png" class="btn-voltar">
                    </a>
                </button>
                <div class="b-voltar">
                </div>
                <div class="botoes">
                    <a href="../../../app/Views/adm/cadastrar-evento.php"><button class="novo-evento">Novo Evento</button></a>
                </div>
                <div class="modal" id="modal-fotos">
                    <div class="modal-content">
                        <span class="close-modal" data-modal="modal-fotos">&times;</span>

                        <h3>Adicionar Fotos ao Evento</h3>
                        <p>Limite de 5 Fotos por Evento</p>
                        <form method="POST" class="form-img">
                            <input type="file" multiple>
                            <?php echo $tolken; ?>
                            <button class="submit-fotos">Adicionar Fotos</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/assets/img-bolas/bola-azul1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/assets/img-bolas/bola-azul2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/assets/img-bolas/bola-azul.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-adm/status-colaborador.js"></script>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/status-evento.js"></script>
    <script src="../../../Public/js/js-adm/modal-gerenciar-eventos.js" defer></script>
    <script src="../../../Public/js/js-adm/js-gerenciar-evento.js" defer></script>
    <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
</body>

</html>
