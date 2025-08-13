<?php
include_once('../../helpers/csrf.php');
$tolken = getTolkenCsrf();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <title>Adm - Bosque da Paz</title>
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastro-boleto.css">
    <script src="../../../Public/js/js-adm/input-cadastro-boleto.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <?php include "../../../Public/include/menu-adm.html" ?>

    <main class="principal">
        <div class="box">
            <div class="input-busca">
                <div class="title">
                    <h1 class="title-text">CADASTRO DE BOLETOS</h1>
                </div>
                <div class="search-bar">
                    <input class="input-busca" type="text" id="pesquisar-nome" placeholder="Pesquisar por expositor" />
                    <button type="button" id="lupa" class="search-button">BUSCAR</button>
                    <div id="sugestoes-expositor" class="sugestoes-container" style="display: none;"></div>
                </div>


            </div>

            <div class="container">
                <form method="POST" id="form-cadastrar-boleto" action="../../../actions/action-cadastrar-boletos.php" class="form" enctype="multipart/form-data">
                    <div class="form-content">
                        <div class="input">
                            <label class="label" for="expositor">Expositor:</label>
                            <input type="text" name="nome_exp" id="nome-exp" placeholder="Nome do Expositor" maxlength="50" readonly>
                        </div>

                        <div class="input">
                            <label for="cnpj-cpf" class="label">CPF:</label>
                            <input type="text" name="cpf_input" id="cnpj-cpf" placeholder="000.000.000-00" maxlength="14" readonly>
                        </div>

                        <div class="input">
                            <label class="label" for="valor">Valor:</label>
                            <input type="text" name="valor_input" id="valor_input" placeholder="R$ 0,00" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-input">
                        <div class="input">
                            <label>Arquivo em PDF:</label>
                            <input type="file" name="arquivo" id="arquivo" accept="application/pdf" required>
                        </div>

                        <div class="input">
                            <label for="vencimento" class="label">Vencimento:</label>
                            <input type="date" name="vencimento_input" id="vencimento_input" placeholder="00/00/0000" required>
                        </div>

                        <div class="input input-referencia">
                            <label for="referencia_input" class="label">Referência:</label>
                            <span class="input-prefix">Mês de Referência:</span>
                            <input class="select" name="referencia_input" id="referencia_input" type="text" readonly>
                        </div>


                    </div>
                    <input type="hidden" id="id_expositor" name="id_expositor" value="">
                    <?php echo $tolken; ?>
                    <input type="hidden" name="salvar" value="1">
                    <?php include '../../../Public/include/Butons-forms.html'; ?>
                </form>
            </div>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/assets/img-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/assets/img-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/assets/img-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-modais/js-modal-confirmar.js" defer></script>
    <script src="../../../Public/js/js-modais/js-modal-sucesso.js"></script>
    <script src="../../../Public/js/js-modais/js-modal-deletar.js"></script>
    <script src="../../../Public/js/js-modais/js-modal-carregar.js"></script>
    <?php include '../../../Public/include/modais/modal-confirmar.html'; ?>
    <?php include '../../../Public/include/modais/modal-sucesso.html'; ?>
    <?php include '../../../Public/include/modais/modal_carregando.html'; ?>
    <?php include '../../../Public/include/modais/modal-error.html'; ?>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="../../../Public/js/js-menu/js-menu.js" defer></script>
    <script src="../../../Public/js/js-adm/js-gerenciar-boletos/ajax_buscar_expositor.js" defer></script>
    <script src="../../../Public/js/js-adm/js-btns-padrao.js"></script>
    <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
    <script src="../../../Public/js/js-adm/js-cadastrar-boletos.js" defer></script>

    <script>
        $('#valor').mask('000.000.000.000.000,00', {
            reverse: true
        });
    </script>
</body>

</html>