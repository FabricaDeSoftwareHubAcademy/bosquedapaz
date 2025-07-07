<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bloco principal -->
    <title>Gerenciamento de Boletos</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-gerenciar-boletos.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- bloco principal -->
</head>

<body class="body-gerenciar-boletos">
    <?php include "../../../Public/include/menu-adm.html" ?>
    <div class="box-all">
        <h1 class="titulo-box">Gerenciamento de Boletos</h1>
        <!-- filtragem de dados -->
        <section class="area-filtro-de-dados">
            <div class="filtrar-por-nome">
                <label for="" id="label-filtragem-de-nome">Pesquisar por Nome</label>
                <input type="text" name="campo-filtragem-de-nome" id="input-filtragem-de-nome" placeholder="Nome do Expositor">
            </div>

            <div class="linha-de-separacao"></div>

            <div class="filtrar-por-data">
                <form action="" method="POST" id="formulario-filtragem-de-data" class="formulario-filtragem-de-data">
                    <div class="campos-de-filtro">
                        <label for="" id="label-filtragem-de-data">Data Inicial</label>
                        <input type="date" name="data_inicial" id="input-filtragem-de-data">
                    </div>
                    <div class="campos-de-filtro">
                        <label for="" id="label-filtragem-de-data">Data Final</label>
                        <input type="date" name="data_final" id="input-filtragem-de-data">
                    </div>
                    <div class="botao-pesquisar">
                        <label for="" id="label-botao-de-filtragem">Ações</label>
                        <button type="submit" name="botao-filtrar-data" id="botao-de-filtragem">Pesquisar</button>
                    </div>
                </form>
            </div>

            <div class="linha-de-separacao"></div>

            <div class="filtrar-por-status">
                <label for="" id="label-filtragem-de-status">Pesquisar por Status</label>
                <select name="campo-filtragem-de-status" id="campo-filtragem-de-status">
                    <option value="">Todos os Status</option>
                    <option value="Pago">Pago</option>
                    <option value="Pendente">Pendente</option>
                </select>
            </div>
        </section>

        <!-- tabela de dados -->
        <section class="area-tabela-de-dados">
            <table class="table-tabela-de-dados">
                <thead class="thead-tabela-de-dados">
                    <tr class="tr-tabela-de-dados">
                        <th class="th-tabela-de-dados">Expositor</th>
                        <th class="th-tabela-de-dados">Vencimento</th>
                        <th class="th-tabela-de-dados">Referência</th>
                        <th class="th-tabela-de-dados">Valor</th>
                        <th class="th-tabela-de-dados">Status</th>
                    </tr>
                </thead>
                <tbody class="tbody-tabela-de-dados">

                </tbody>
            </table>
        </section>

        <div id="modalConfirmacao" class="modal-confirmacao" style="display: none;">
            <div class="modal-confirmacao-conteudo">
                <p>Deseja realmente alterar o status?</p>
                <div class="modal-confirmacao-botoes">
                    <button id="confirmarAlteracao" class="modal-confirmacao-botao botao-sim">Sim</button>
                    <button id="cancelarAlteracao" class="modal-confirmacao-botao botao-nao">Não</button>
                </div>
            </div>
        </div>


        <!-- decorações -->
        <section class="area-decoracoes">
            <div>
                <img src="../../../Public/assets/faleconosco-decoracao3.png" alt="" class="decoracao decoracao-1">
            </div>

            <div>
                <img src="../../../Public/assets/faleconosco-decoracao1.png" alt="" class="decoracao decoracao-2">
            </div>

            <div>
                <img src="../../../Public/assets/faleconosco-decoracao2.png" alt="" class="decoracao decoracao-3">
            </div>

            <a href="Area-adm.php">
                <img src="../../../Public/assets/faleconosco-voltar.png" class="decoracao botao-voltar">
            </a>
        </section>
        <script src="../../../Public/js/js-adm/js-gerenciar-boletos/ajax_listar_boletos.js"></script>
        <script src="../../../Public/js/js-adm/js-gerenciar-boletos/ajax_alterar_status.js"></script>
        <script src="../../../Public/js/js-menu/js-menu.js"></script>
</body>

</html>