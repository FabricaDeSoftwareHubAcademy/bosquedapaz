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
                <form action="" method="" id="formulario-filtragem-de-data" class="formulario-filtragem-de-data">
                    <div class="campos-de-filtro">
                        <label for="" id="label-filtragem-de-data">Data Inicial</label>
                        <input type="date" name="" id="input-filtragem-de-data">
                    </div>
                    <div class="campos-de-filtro">
                        <label for="" id="label-filtragem-de-data">Data Final</label>
                        <input type="date" name="" id="input-filtragem-de-data">
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
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
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
                    <tr class="tr-tabela-de-dados">
                        <td class="td-tabela-de-dados">Empresa Alfa</td>
                        <td class="td-tabela-de-dados">10/06/2025</td>
                        <td class="td-tabela-de-dados">JUN/2025</td>
                        <td class="td-tabela-de-dados">R$ 2.500,00</td>
                        <td class="td-tabela-de-dados"><button class="botao-status status-pago">Pago</button></td>
                    </tr>
                    <tr class="tr-tabela-de-dados">
                        <td class="td-tabela-de-dados">Comercial Beta</td>
                        <td class="td-tabela-de-dados">15/06/2025</td>
                        <td class="td-tabela-de-dados">JUN/2025</td>
                        <td class="td-tabela-de-dados">R$ 3.000,00</td>
                        <td class="td-tabela-de-dados"><button class="botao-status status-pendente">Pendente</button></td>
                    </tr>
                    <tr class="tr-tabela-de-dados">
                        <td class="td-tabela-de-dados">Loja Gama</td>
                        <td class="td-tabela-de-dados">20/06/2025</td>
                        <td class="td-tabela-de-dados">JUN/2025</td>
                        <td class="td-tabela-de-dados">R$ 1.750,00</td>
                        <td class="td-tabela-de-dados"><button class="botao-status status-pendente">Pendente</button></td>
                    </tr>
                    <tr class="tr-tabela-de-dados">
                        <td class="td-tabela-de-dados">Delta Ltda</td>
                        <td class="td-tabela-de-dados">25/06/2025</td>
                        <td class="td-tabela-de-dados">JUN/2025</td>
                        <td class="td-tabela-de-dados">R$ 4.100,00</td>
                        <td class="td-tabela-de-dados"><button class="botao-status status-pago">Pago</button></td>
                    </tr>
                    <tr class="tr-tabela-de-dados">
                        <td class="td-tabela-de-dados">Zeta Digital</td>
                        <td class="td-tabela-de-dados">01/07/2025</td>
                        <td class="td-tabela-de-dados">JUL/2025</td>
                        <td class="td-tabela-de-dados">R$ 2.850,00</td>
                        <td class="td-tabela-de-dados"><button class="botao-status status-pendente">Pendente</button></td>
                    </tr>
                    <tr class="tr-tabela-de-dados">
                        <td class="td-tabela-de-dados">Omega Corp</td>
                        <td class="td-tabela-de-dados">08/07/2025</td>
                        <td class="td-tabela-de-dados">JUL/2025</td>
                        <td class="td-tabela-de-dados">R$ 3.600,00</td>
                        <td class="td-tabela-de-dados"><button class="botao-status status-pendente">Pendente</button></td>
                    </tr>
                    <tr class="tr-tabela-de-dados">
                        <td class="td-tabela-de-dados">Teta Ventures</td>
                        <td class="td-tabela-de-dados">12/07/2025</td>
                        <td class="td-tabela-de-dados">JUL/2025</td>
                        <td class="td-tabela-de-dados">R$ 2.200,00</td>
                        <td class="td-tabela-de-dados"><button class="botao-status status-pago">Pago</button></td>
                    </tr>
                    <tr class="tr-tabela-de-dados">
                        <td class="td-tabela-de-dados">Sigma Store</td>
                        <td class="td-tabela-de-dados">18/07/2025</td>
                        <td class="td-tabela-de-dados">JUL/2025</td>
                        <td class="td-tabela-de-dados">R$ 3.150,00</td>
                        <td class="td-tabela-de-dados"><button class="botao-status status-pendente">Pendente</button></td>
                    </tr>
                    <tr class="tr-tabela-de-dados">
                        <td class="td-tabela-de-dados">Kappa Móveis</td>
                        <td class="td-tabela-de-dados">22/07/2025</td>
                        <td class="td-tabela-de-dados">JUL/2025</td>
                        <td class="td-tabela-de-dados">R$ 1.980,00</td>
                        <td class="td-tabela-de-dados"><button class="botao-status status-pago">Pago</button></td>
                    </tr>
                    <tr class="tr-tabela-de-dados">
                        <td class="td-tabela-de-dados">Lambda Equipamentos Palmeirenses Paulistoes</td>
                        <td class="td-tabela-de-dados">28/07/2025</td>
                        <td class="td-tabela-de-dados">JUL/2025</td>
                        <td class="td-tabela-de-dados">R$ 4.750,00</td>
                        <td class="td-tabela-de-dados"><button class="botao-status status-pendente">Pendente</button></td>
                    </tr>
                </tbody>
            </table>
        </section>


        <!-- decorações -->
        <section class="area-decoracoes">
            <div>
                <img src="../../../Public/imgs/imgs-validar-expositor/decoracao1-validar-expositor.svg" alt="" class="decoracao decoracao-1">
            </div>

            <div>
                <img src="../../../Public/imgs/imgs-validar-expositor/decoracao2-validar-expositor.svg" alt="" class="decoracao decoracao-2">
            </div>

            <div>
                <img src="../../../Public/imgs/imgs-validar-expositor/decoracao3-validar-expositor.svg" alt="" class="decoracao decoracao-3">
            </div>

            <a href="Area-adm.php">
                <img src="../../../Public/imgs/img-area-contate/seta-voltar.png" class="decoracao botao-voltar">
            </a>
        </section>
        <script src="../../../Public/js/js-menu/js-menu.js"></script>
</body>

</html>