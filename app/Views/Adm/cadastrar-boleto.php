<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <title>Cadastro de Boleto</title>
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastro-boleto.css">
    <script src="../../../Public/js/js-adm/input-cadastro-boleto.js" defer></script>

</head>

<body>
    <?php include "../../../Public/include/menu-adm.html" ?>

    <main class="principal">
        <div class="box">
            <div class="container">
                <div class="title">
                    <h1>CADASTRO DE BOLETO</h1>
                </div>

                <div class="search">
                    <input type="text" id="searchInput" placeholder="Pesquisar por expositor...">
                    <label for="searchInput" class="label">
                        <span class="material-symbols-outlined" id="lupa"> search </span>
                    </label>
                </div>
            </div>

            <form method="POST" enctype="multipart/form-data">

                <div class="form-content">

                    <div class="input">
                        <label class="label" for="expositor">Expositor:</label>
                        <input type="text" name="nome-exp" id="nome-exp" class="form-input" placeholder="Nome do Expositor" required>
                    </div>

                    <div class="input">
                        <label for="cpf" class="label">CPF:</label>
                        <input type="text" name="cpf" id="cpf" class="form-input" placeholder="000.000.000-00" required>
                    </div>
                    
                    <div class="input">
                        <label class="label" for="valor">Valor:</label>
                        <input type="text" name="valor" id="valor" class="form-input" placeholder="R$ 0,00" autocomplete="off" required>
                    </div>
                    
                    
                    <div class="input">
                        <label class="label">Arquivo em PDF:</label>
                        <label for="arquivo" class="custom-file-label">
                            <span id="file-text">Selecionar Arquivo em PDF</span>
                            <img src="../../../Public/imgs/Upload.svg" alt="">
                        </label>
                        <input type="file" name="arquivo" id="arquivo" accept=".pdf" class="form-input" required>
                    </div>

                    <div class="input">
                        <label for="referencia" class="label">Referência:</label>
                        <select name="input_select" id="referencia_select" class="form-input" required>
                            <option id="option-cb" value="">Janeiro</option>
                            <option id="option-cb" value="">Fevereiro</option>
                            <option id="option-cb" value="">Março</option>
                            <option id="option-cb" value="">Abril</option>
                            <option id="option-cb" value="">Maio</option>
                            <option id="option-cb" value="">Junho</option>
                            <option id="option-cb" value="">Julho</option>
                            <option id="option-cb" value="">Agosto</option>
                            <option id="option-cb" value="">Setembro</option>
                            <option id="option-cb" value="">Outubro</option>
                            <option id="option-cb" value="">Novembro</option>
                            <option id="option-cb" value="">Dezembro</option>
                        </select>
                    </div>

                    <div class="input">
                        <label for="vencimento" class="label">Vencimento</label>
                        <input type="date" name="val" id="val" class="form-input" placeholder="00/00/0000" required>
                    </div>
                </div>

                <div id="btns-forms-padrao" class="btns-forms-padrao">
                    <a href="./Area-Adm.php" class="link-area-adm">
                        <div id="btn-voltar" class="btn-voltar">
                            <i id="seta" class="bi bi-arrow-left-short seta"></i>
                        </div>
                    </a>

                    <div id="btns-salvar-cancelar" class="btns-salvar-cancelar">
                        <div class="envolta-btn"><button type="reset" class="btn-acoes btn-reset" id="btn-reset">Cancelar</button></div>
                        <div class="envolta-btn"><button type="submit" class="btn-acoes btn-salvar" id="btn-salvar" name="salvar" value="salvar">Salvar</button></div>
                    </div>
                </div>
            </form>
        </div>

    </main>

    <div class="formas">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Forma 1" class="forma1">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Forma 2" class="forma2">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Forma3" class="forma3">
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="../../../Public/js/js-menu/js-menu.js" defer></script>
    <script src="../../../Public/js/js-adm/js-btns-padrao.js"></script>
    <script>
        $('#valor').mask('000.000.000.000.000,00', {
            reverse: true
        });
    </script>
</body>

</html>