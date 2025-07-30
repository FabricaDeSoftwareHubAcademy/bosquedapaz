<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
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

                <form method="POST" action="../../../actions/action-procurar-expositor-boleto.php" class="search">
                    <div class="search-bar">
                        <input type="text" name="pesquisar-nome" id="searchInput" placeholder="Pesquisar por expositor" />
                        <button type="submit" name="botao-procurar" id="lupa" class="search-button">BUSCAR</button>
                    </div>
                </form>
            </div>
            <div class="container">
                <form method="POST" action="../../../actions/action-cadastrar-boletos.php" class="form" enctype="multipart/form-data">
                    <div class="form-content">
                        <div class="input">
                            <label class="label" for="expositor">Expositor:</label>
                            <input type="text" name="nome_exp" id="nome-exp" placeholder="Nome do Expositor" maxlength="50" required>
                        </div>

                        <div class="input">
                            <label for="cnpj-cpf" class="label">CPF:</label>
                            <input type="text" name="cpf_input" id="cnpj-cpf" placeholder="000.000.000-00" maxlength="14" required>
                        </div>

                        <div class="input">
                            <label class="label" for="valor">Valor:</label>
                            <input type="text" name="valor_input" id="valor" placeholder="R$ 0,00" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-input">
                        <div class="input">
                            <label>Arquivo em PDF:</label>
                            <input type="file" name="arquivo" id="arquivo" accept="application/pdf" required>
                        </div>

                        <div class="input">
                            <label for="referencia" class="label">Referência:</label>
                            <select class="select" name="referencia_input" id="referencia_select" required>
                                <option id="option-cb" value="Janeiro">Janeiro</option>
                                <option id="option-cb" value="Fevereiro">Fevereiro</option>
                                <option id="option-cb" value="Março">Março</option>
                                <option id="option-cb" value="Abril">Abril</option>
                                <option id="option-cb" value="Maio">Maio</option>
                                <option id="option-cb" value="Junho">Junho</option>
                                <option id="option-cb" value="Julho">Julho</option>
                                <option id="option-cb" value="Agosto">Agosto</option>
                                <option id="option-cb" value="Setembro">Setembro</option>
                                <option id="option-cb" value="Outubro">Outubro</option>
                                <option id="option-cb" value="Novembro">Novembro</option>
                                <option id="option-cb" value="Dezembro">Dezembro</option>
                            </select>
                        </div>

                        <div class="input">
                            <label for="vencimento" class="label">Vencimento:</label>
                            <input type="date" name="vencimento_input" id="val" placeholder="00/00/0000" required>
                        </div>
                    </div>

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

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="../../../Public/js/js-menu/js-menu.js" defer></script>
    <script src="../../../Public/js/js-adm/js-gerenciar-boletos/ajax_buscar_expositor.js" defer></script>
    <script src="../../../Public/js/js-adm/js-btns-padrao.js"></script>
    <script>
        $('#valor').mask('000.000.000.000.000,00', {
            reverse: true
        });
    </script>
    <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
</body>

</html>