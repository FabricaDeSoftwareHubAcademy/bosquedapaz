<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Boletos </title>
    <script src="../../../Public/js/js-adm/atualizar-status.js" defer></script>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-gerenciar-boletos.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
</head>

<body class="boleto-body">
<?php include "../../../Public/assets/adm/menu-adm.html"?>

    <div class="boleto-box">
        <section class="boletao-secao-titulo">
            <h1 class="boleto-titulo">Gerenciamento de Boletos</h1>
        </section>

        <section class="boleto-secao-filtros">
            <form action="" class="form-boleto-filtros-container">
                <div class="boleto-filtro-expositor">
                    <label for="">Expositor</label>
                    <input type="text" name="nome_expositor" id="filtro_expositor" class="filtro-expositor" placeholder="Procure por um expositor">
                </div>

                <div class="linha-espaco"></div>

                <div class="boleto-filtro-datas">
                    <div class="boleto-filtro-data-area">
                        <label for="">Data Inicial</label>
                        <input type="date" name="data_inicio" id="filtro_data_inicial" class="filtro-data-inicial">
                    </div>
                    <div class="boleto-filtro-data-area">
                        <label for="">Data Final</label>
                        <input type="date" name="data_fim" id="filtro_data_final" class="filtro-data-final">
                    </div>
                    <div class="boleto-filtro-data-pesquisar">
                        <label for="">Aplicar</label>
                        <button type="submit" class="botao-data-pesquisar">Buscar</button>
                    </div>
                </div>

                <div class="linha-espaco"></div>

                <div class="boleto-filtro-status">
                    <label for="">Status</label>
                    <select name="status" id="filtro_status" class="filtro-status">
                        <option value="">Procurar por Status</option>
                        <option value="pago">Pago</option>
                        <option value="pendente">Pendente</option>
                    </select>
                </div>
            </form>
        </section>

        <section class="boleto-secao-tabela">
            <div class="boleto-tabela-container">
                <table class="boleto-tabela-lista">
                    <thead>
                        <tr>
                            <th>Expositor</th>
                            <th>Vencimento</th>
                            <th>Referência</th>
                            <th>Valor</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="boleto-tabela-lista">
                        <tr>
                            <td>José Arigão Silva</td>
                            <td>12/04/2025</td>
                            <td>ref001</td>
                            <td>R$ 250,00</td>
                            <td><button class="boleto-botao-pago">Pago</button></td>
                        </tr>
                        <tr>
                            <td>Carlos Andrade Bezerra</td>
                            <td>13/04/2025</td>
                            <td>ref001</td>
                            <td>R$ 250,00</td>
                            <td><button class="boleto-botao-pendente">Pendente</button></td>
                        </tr>
                        <tr>
                            <td>Ana Julia Medeiros</td>
                            <td>14/04/2025</td>
                            <td>ref001</td>
                            <td>R$ 250,00</td>
                            <td><button class="boleto-botao-pendente">Pago</button></td>
                        </tr>
                        <tr>
                            <td>Rafaela Silva Andrade</td>
                            <td>17/04/2025</td>
                            <td>ref001</td>
                            <td>R$ 250,00</td>
                            <td><button class="boleto-botao-pendente">Pago</button></td>
                        </tr>
                        <tr>
                            <td>Mariana Cavalcante Dias</td>
                            <td>18/04/2025</td>
                            <td>ref001</td>
                            <td>R$ 250,00</td>
                            <td><button class="boleto-botao-pago">Pago</button></td>
                        </tr>
                        <tr>
                            <td>Tiago Barros da Silva</td>
                            <td>22/04/2025</td>
                            <td>ref001</td>
                            <td>R$ 250,00</td>
                            <td><button class="boleto-botao-pago">Pago</button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Alvez de Souza</td>
                            <td>24/04/2025</td>
                            <td>ref001</td>
                            <td>R$ 250,00</td>
                            <td><button class="boleto-botao-pendente">Pago</button></td>
                        </tr>
                        <tr>
                            <td>Ademar Santos Severino</td>
                            <td>27/04/2025</td>
                            <td>ref001</td>
                            <td>R$ 250,00</td>
                            <td><button class="boleto-botao-pago">Pago</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <div class="boleto-bola1">
        <img src="../../../Public/imgs/img-area-adm/bola-1.png" alt="">
    </div>

    <div class="boleto-bola2">
        <img src="../../../Public/imgs/img-area-adm/bola-2.png" alt="">
    </div>

    <div class="boleto-bola3">
        <img src="../../../Public/imgs/img-area-adm/bola-3.png" alt="">
    </div>

    <a href="Area-adm.php" class="boleto-seta-voltar">
        <img src="../../../Public/imgs/img-area-contate/seta-voltar.png" class="btn-voltar">
    </a>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>

</body>