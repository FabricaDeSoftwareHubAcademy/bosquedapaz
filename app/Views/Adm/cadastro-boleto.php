<!DOCTYPE html>
<html lang="pt/br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastro-boleto.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <script src="../../../Public/js/js-adm/input-cadastro-boleto.js" defer></script>
    <title>Cadastro de Boletos</title>
</head>

<body>
    <?php include "../../../Public/include/menu-adm.html" ?>

    <!-- formas -->
    <section class="section-cb">
        <div class="box-cb"></div>
        <div class="forma-1-cb">
            <img src="../../../Public/imgs/edicoes-passadas-img/edpassForma1.svg" alt="elemento1">
        </div>
        <div class="forma-3-cb">
            <img src="../../../Public/imgs/edicoes-passadas-img/edpassForma3.svg" alt="elemento3">
        </div>
        <div class="forma-4-cb">
            <img src="../../../Public/imgs/edicoes-passadas-img/edpassForma4.svg" alt="elemento4">
        </div>


        <a href="Area-Adm.php" class="btn-voltar-cb">
            <img src="../../../Public/imgs/edicoes-passadas-img/voltar.svg" alt="">
        </a>

        <section>

            <main class="main-cb">
                <nav class="area-form-cb">
                    <h1 class="title-cb">CADASTRO DE BOLETO</h1>
                    <form method="POST" action="../../../actions/actions-boletos/action-buscar-expositor.php" class="pesquisa-cb">
                        <input type="hidden" class="input-cb" name="id_expositor" type="text" placeholder="Pesquisar nome do expositor">
                        <input class="input-cb" name="nome" type="text" placeholder="Pesquisar nome do expositor">
                        <button type="submit" class="bola-cb" style="cursor: pointer;"></button>
                    </form>
                    <form method="POST" action="../../../actions/actions-boletos/action-cadastrar-boleto.php" class="form-cb">
                        <input type="hidden" class="input-cb" name="id_expositor" type="text" placeholder="Pesquisar nome do expositor">
                        <div class="area-div-1-cb">
                            <div class="form-group-cb">
                                <label class="label-cb">Expositor:</label>
                                <input type="text" name="nome-exp" id="nome-exp" class="form-cb-input" placeholder="Nome do Expositor" required>
                            </div>

                            <div class="form-group-cb">
                                <label class="label-cb">Arquivo em PDF:</label>
                                <label for="arq-cb" class="custom-file-label">
                                    <span id="file-text">Selecionar Arquivo em PDF</span>
                                    <img class="img-cb" src="../../../Public/imgs/edicoes-passadas-img/Upload.svg" alt="">
                                </label>
                                <input type="file" name="arq-cb" id="arq-cb" accept=".pdf">
                            </div>

                            <div class="form-group-cb">
                                <label class="label-cb">Valor:</label>
                                <input type="text" name="valor-cb" id="valor-cb" class="form-cb-input" placeholder="R$ 00,00">
                            </div>
                        </div>

                        <div class="area-div-2-cb">
                            <div class="form-group-cb">
                                <label class="label-cb">CPF/CNPJ:</label>
                                <input type="text" name="cpf-cb" id="cpf-cb" class="form-cb-input" placeholder="000.000.000-00  |  00.000.000/0000-00">
                            </div>

                            <div class="form-group-cb">
                                <label class="label-cb">Referência:</label>
                                <select name="referencia" id="referencia_select" class="form-cb-input" required>
                                    <option value="">Selecione um mês</option>
                                    <option value="Janeiro">Janeiro</option>
                                    <option value="Fevereiro">Fevereiro</option>
                                    <option value="Março">Março</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Maio">Maio</option>
                                    <option value="Junho">Junho</option>
                                    <option value="Julho">Julho</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Setembro">Setembro</option>
                                    <option value="Outubro">Outubro</option>
                                    <option value="Novembro">Novembro</option>
                                    <option value="Dezembro">Dezembro</option>
                                </select>
                            </div>

                            <div class="form-group-cb">
                                <label class="label-cb">Vencimento:</label>
                                <input type="date" name="val-cb" id="val-cb" class="form-cb-input" placeholder="00/00/0000" required>
                            </div>
                        </div>

                        <div class="area-btn-cb">
                            <button id="cancelar" class="btn-cancelar-cb">Cancelar</button>
                            <button type="submit" name="botao-cadastrar" id="Salvar" class="btn-salvar-cb">Salvar</button>
                        </div>
                    </form>
                </nav>

            </main>
            <script src="../../../Public/js/js-menu/js-menu.js"></script>
</body>

</html>