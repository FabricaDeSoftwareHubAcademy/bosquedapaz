<?php 
include_once('../../helpers/csrf.php');
$tolken = getTolkenCsrf();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página para gerenciar parceiros e suas informações.">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-parceiros.css">
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    
    <?php include "../../../Public/include/menu-adm.html" ?>
   
    <main class="principal">
        <div class="box">
            <h1>CADASTRO DE PARCEIROS</h1>
            <div class="form-box">
                <form id="form_cadastrar_parceiro" method="POST">
                    <div class="form-container">
                        <div id="form1" class="form-grid">
                            <div class="input-group">
                                <label for="nome_parceiro">Parceiro:</label>
                                <input type="text" id="nome_parceiro" name="nome_parceiro" placeholder="Digite o nome" maxlength="20" required>
                            </div>
                            <div class="input-group">
                                <label for="telefone">Telefone:</label>
                                <input type="text" id="telefone" name="telefone" placeholder="Digite o telefone" maxlength="15" required>
                            </div>
                            <div class="input-group">
                                <label for="cep">CEP:</label>
                                <input type="text" id="cep" name="cep" placeholder="Digite o CEP"  maxlength="9" required>
                            </div>
                            <div class="input-group">
                                <label for="complemento">Complemento:</label>
                                <input type="text" id="complemento" name="complemento" placeholder="Digite o complemento" maxlength="30" required>
                            </div>                                             
                            <div class="input-group">
                                <label for="cidade">Estado:</label>
                                <input type="text" id="estado" name="estado" placeholder="Digite o estado" maxlength="20" required>
                            </div>                    
                        </div>
                        <div id="form2" class="form-grid">
                            <div class="input-group">
                                <label for="email">E-mail:</label>
                                <input type="email" id="email" name="email" placeholder="Digite o e-mail" maxlength="100" required>
                            </div>
                            <div class="input-group">
                                <label for="cpf_cnpj">CPF/CNPJ:</label>
                                <input type="text" id="cpf_cnpj" name="cpf_cnpj" placeholder="Digite o CPF ou CNPJ" maxlength="18" required>
                            </div>
                            <div class="input-group">
                                <label for="logradouro">Logradouro:</label>
                                <input type="text" id="logradouro" name="logradouro" placeholder="Digite o logradouro" maxlength="20" required>
                            </div>                                        
                            <div class="input-group">
                                <label for="bairro">Bairro:</label>
                                <input type="text" id="bairro" name="bairro" placeholder="Digite o bairro" maxlength="30" required>
                            </div>                               
                            <div class="input-group">
                                <label for="logo">Logo:</label>
                                <input type="file" id="logo" name="logo" accept="image/*" required>
                                <img id="preview-logo" src="#" alt="Pré-visualização da logo" style="max-width: 300px; margin-top: 10px; display: none;" />
                            </div>  
                        </div>
                        <div id="form3" class="form-grid">
                            <div class="input-group">
                                <label for="nome_contato">Contato:</label>
                                <input type="text" id="nome_contato" name="nome_contato" placeholder="Digite o nome do contato" maxlength="30" required>
                            </div>
                            <div class="input-group">
                                <label for="tipo">Tipo:</label>
                                <select id="tipo" name="tipo" required>
                                    <option value="" disabled selected>Selecione o tipo</option>
                                    <option value="juridica">Jurídica</option>
                                    <option value="fisica">Física</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label for="num_residencia">Número:</label>
                                <input type="text" id="num_residencia" name="num_residencia" placeholder="Digite o número da residência" maxlength="5" required>
                            </div> 
                            <div class="input-group">
                                <label for="cidade">Cidade:</label>
                                <input type="text" id="cidade" name="cidade" placeholder="Digite a cidade" maxlength="20" required>
                            </div>  
                        </div>

                        <?php echo $tolken; ?>
                        
                        <?php include "../../../Public/include/Butons-forms.html" ?>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include "../../../Public/include/modais/modal-confirmar.html" ?>
    <?php include "../../../Public/include/modais/modal-sucesso.html" ?>
    <?php include "../../../Public/include/modais/modal-error.html" ?>
    
    <div class="bolas-fundo">
        <img src="../../../Public/assets/img-bolas/bola-verde1.png" alt="Bola de Fundo 1" class="bola-verde1">
        <img src="../../../Public/assets/img-bolas/bola-verde2.png" alt="Bola de Fundo 2" class="bola-verde2">
        <img src="../../../Public/assets/img-bolas/bola-rosa.png" alt="Bola de Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js" defer></script>
    <script src="../../../Public/js/js-adm/preview-img.js" defer></script>
    <script src="../../../Public/js/js-modais/js-abrir-modal.js" defer></script>
    <script src="../../../Public/js/js-adm/cadastrar-parceiro.js" defer></script>
    <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
</body>

</html>
