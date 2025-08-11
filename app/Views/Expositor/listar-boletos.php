<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-listar-boletos.css">
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <title>Expositor - Bosque da Paz</title>
</head>
<body class="body-listb" >
    
    <?php include "../../../Public/include/home/menu-expositor.html" ?>

    <div class="listb-box">
        <h1 class="listb-title">Meus Boletos</h1>

        <section class="section-listb-tabela">
            <div class="listb-tabela-container">
                <table class="listb-table">
                    <thead class="listb-head">
                        <tr class="listb-row-name">
                            <th class="listb-header-name">Número</th>
                            <th class="listb-header-name">Vencimento</th>
                            <th class="listb-header-name">Referência</th>
                            <th class="listb-header-name">Valor</th>
                            <th class="listb-header-name">Status</th>
                            <th class="listb-header-name">Imprimir</th>
                        </tr>
                    </thead>
                    <tbody class="listb-body">
                        <tr class="listb-tr" >
                            <td class="listb-boleto-td"></td>
                            <td class="listb-boleto-td"></td>
                            <td class="listb-boleto-td"></td>
                            <td class="listb-boleto-td"></td>
                            <td class="listb-boleto-td"><button class="listb-btn-pago"></button></td>
                            <td class="listb-boleto-td"><a href="#" class="listb-link" ><i class="fa-solid fa-print"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        
        <a href="./" class="listb-voltar"><img src="../../../Public/assets/icons/voltar.png" alt=""></a>
    </div>
    <img class="listb-superior-esquerda" src="../../../Public/assets/img-bolas/img-superior-esquerda.svg" alt="">
    <img class="listb-superior-direita" src="../../../Public/assets/img-bolas/img-superior-direita.svg" alt="">
    <img class="listb-inferior" src="../../../Public/assets/img-bolas/img-inferior-boleto.svg" alt="">


    <script src="../../../Public/js/js-adm/js-gerenciar-boletos/ajax_listar_boletos_pessoais.js" defer></script>
    <script src="../../../Public/js/js-adm/varifica_login_expositor.js"></script>
    <script src="../../../Public/js/js-menu/js-menu-expositor.js"></script>
</body>
</html>
