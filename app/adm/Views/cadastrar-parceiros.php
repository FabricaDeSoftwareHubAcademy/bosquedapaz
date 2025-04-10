<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página para gerenciar parceiros e suas informações.">
    <title>Cadastrar Parceiros</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-parceiros.css">
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">

</head>

<body>
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>

    <main class="principal">

        <div class="box">

            <div class="title">
                <h1 class="title-text">CADASTRO DE PARCEIRO</h1>
            </div>

            <form class="formularios" method="POST">

                <div class="form-pessoa">
                    <div class="input">
                        <label>Parceiro:</label>
                        <input type="text" name="nome" id="" placeholder="Digite o Nome:" required>
                    </div>

                    <div class="input">
                        <label>E-mail:</label>
                        <input type="text" name="e-mail" id="" placeholder="Digite o e-mail:" required>
                    </div>

                    <div class="input">
                        <label for="optionInput3">Tipo:</label>

                        <select name="todas_categorias" id="todas_categorias" class="select">

                            <option value="">selecione</option>
                            <option value="artesanato">Fisica</option>
                            <option value="gastronia">Jurídica</option>

                        </select>

                    </div>

                    <div class="input-group">
                        <label>Logo:</label>
                        <input type="file" name="file[]" id="file" multiple="multiple">
                    </div>
                </div>

                <div class="form-loja">
                    
                    <div class="input">
                        <label>Telefone:</label>
                        <input type="text" name="telefone" id="" placeholder="Digite seu Telefone" required>
                    </div>
                    
                    <div class="input">
                        <label>Contato:</label>
                        <input type="text" name="contato" id="" placeholder="Digite o Nome do Contato " required>
                    </div>
                    
                    <div class="input">
                        <label>CPF/CNPJ:</label>
                        <input type="text" name="cpf/cnpj" id="" placeholder="Digite o CPF/CNPJ" required>
                    </div>  
                    <div class="input">
                        <label>CEP:</label>
                        <input type="text" name="instagram" id="" placeholder="Digite o CEP" required>
                    </div>  
                </div>

                <div class="btn-finalizar">
                    <button name="salvar" class="btn btn-salvar">SALVAR</button>
                    <button class="btn-cancelar"><a href="Area-Adm.php">CANCELAR</a></button>
                </div>
            </form>

            <div class="btns">
                <a href="Area-Adm.php" class="voltar">
                    <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>
            </div>

        </div>
        </div>
        
    </main>

    <div class="bolas-fundo">

        <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-modais/modal-cadastro-expositor"></script>


</body>

</html>