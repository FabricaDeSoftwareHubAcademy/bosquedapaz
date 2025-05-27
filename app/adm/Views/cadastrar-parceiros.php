<?php

    require "../Controller/Parceiro.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $parceiro = new Parceiro();

        $parceiro->nome_parceiro = $_POST["nome_parceiro"];
        $parceiro->telefone = $_POST["telefone"];
        $parceiro->email = $_POST["email"];
        $parceiro->nome_contato = $_POST["nome_contato"];
        $parceiro->tipo = $_POST["tipo"];
        $parceiro->cpf_cnpj = $_POST["cpf_cnpj"];
        $parceiro->logo = $_POST["logo"];
        $parceiro->cep = $_POST["cep"];
        $parceiro->logradouro = $_POST["logradouro"];
        $parceiro->num_residencia = $_POST["num_residencia"];
        $parceiro->bairro = $_POST["bairro"];
        $parceiro->cidade = $_POST["cidade"];
        $parceiro->complemento = $_POST["complemento"];


        $parceiro->cadastrar();
    }
?>

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
            <h1>CADASTRO DE PARCEIROS</h1>
            <div class="form-box">
                <form action="" method="POST">
                    <div id="form1" class="form-grid">
                        <div class="input-group">
                            <label>Parceiro:</label>
                            <input type="text" id="nome_parceiro" name="nome_parceiro" placeholder="Digite o Nome" required>
                        </div>
                        <div class="input-group">
                            <label>Telefone:</label>
                            <input type="text" id="telefone" name="telefone" placeholder="Digite o Telefone" required>
                        </div>
                        <div class="input-group">
                            <label>E-mail:</label>
                            <input type="email" id="email" name="email" placeholder="Digite o e-mail" required>
                        </div>
                        <div class="input-group">
                            <label>Contato:</label>
                            <input type="text" id="nome_contato" name="nome_contato" placeholder="Digite o Contato" required>
                        </div>
                        <div class="input-group">
                            <label>Tipo:</label>
                            <select id="tipo" name="tipo" required>
                                <option value="" disabled selected>Selecione o tipo</option>
                                <option value="juridica">Jurídica</option>
                                <option value="fisica">Física</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label>CPF/CNPJ:</label>
                            <input type="text" id="cpf_cnpj" name="cpf_cnpj" placeholder="Digite o CPF/CNPJ" required>
                        </div>
                        <div class="input-group">
                            <label>Logo:</label>
                            <input type="file" id="logo" name="logo" required>
                        </div>
                        <div class="input-group">
                            <label>CEP:</label>
                            <input type="text" id="cep" name="cep" placeholder="Digite o CEP" required>
                        </div>
                        <div class="input-group">
                            <label>Logradouro:</label>
                            <input type="text" id="logradouro" name="logradouro" placeholder="Digite o Logradouro" required>
                        </div>
                        <div class="input-group">
                            <label>Número:</label>
                            <input type="text" id="num_residencia" name="num_residencia" placeholder="Digite o Número da Residência" required>
                        </div>
                        <div class="input-group">
                            <label>Bairro:</label>
                            <input type="text" id="bairro" name="bairro" placeholder="Digite o Bairro" required>
                        </div>
                        <div class="input-group">
                            <label>Cidade:</label>
                            <input type="text" id="cidade" name="cidade" placeholder="Digite a Cidade" required>
                        </div>
                        <div class="input-group">
                            <label>Complemento:</label>
                            <input type="text" id="complemento" name="complemento" placeholder="Digite o Complemento" required>
                        </div>
                    </div>

                    <div class="btn-cancelar-salvar">
                        <button type="button" class="btn btn-cancelar">
                        <a href="./Area-Adm.php">Cancelar</a>
                        </button>
                        <button type="submit" name="REQUEST_METHOD" class="btn open-modal" data-modal="modal-deleta">Salvar</button>
                    </div>
                </form>

            </div>

            <div class="btns">
                <a href="gerenciar-eventos.php" class="voltar">
                    <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>
            </div>
        </div>

        <dialog id="modal-deleta" class="modal-deleta">
          <div class="acao-recusar">
            <div class="acao-content-recusar">
                <h1 class="acao-texto-recusar">Salvo com sucesso</h1>
                <div class="acao-botoes-recusar">
                  <button class="close-modal" data-modal="modal-deleta">confirmar</button>
                </div>
            </div>
          </div>
        </dialog>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js" defer></script>
    <script src="../../../Public/js/js-adm/preview-img.js" defer></script>
    <script src="../../../Public/js/js-modais/js-abrir-modal.js" defer></script>
</body>

</html>
