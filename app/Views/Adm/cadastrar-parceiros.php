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
                                <input type="text" id="nome_parceiro" name="nome_parceiro" placeholder="Digite o nome" required>
                            </div>
                            <div class="input-group">
                                <label for="telefone">Telefone:</label>
                                <input type="text" id="telefone" name="telefone" placeholder="Digite o telefone" required>
                            </div>
                            <div class="input-group">
                                <label for="logo">Logo:</label>
                                <input type="file" id="logo" name="logo" required>
                            </div>                                
                            <div class="input-group">
                                <label for="num_residencia">Número:</label>
                                <input type="text" id="num_residencia" name="num_residencia" placeholder="Digite o número da residência" required>
                            </div>                          
                            <div class="input-group">
                                <label for="cidade">Cidade:</label>
                                <input type="text" id="cidade" name="cidade" placeholder="Digite a cidade" required>
                            </div>                       
                        </div>
                        <div id="form2" class="form-grid">
                            <div class="input-group">
                                <label for="email">E-mail:</label>
                                <input type="email" id="email" name="email" placeholder="Digite o e-mail" required>
                            </div>
                            <div class="input-group">
                                <label for="cpf_cnpj">CPF/CNPJ:</label>
                                <input type="text" id="cpf_cnpj" name="cpf_cnpj" placeholder="Digite o CPF ou CNPJ" required>
                            </div>
                            <div class="input-group">
                                <label for="cep">CEP:</label>
                                <input type="text" id="cep" name="cep" placeholder="Digite o CEP" required>
                            </div>
                            <div class="input-group">
                                <label for="complemento">Complemento:</label>
                                <input type="text" id="complemento" name="complemento" placeholder="Digite o complemento" required>
                            </div>
                            <div class="input-group">
                                <label for="cidade">Estado:</label>
                                <input type="text" id="estado" name="estado" placeholder="Digite o estado" required>
                            </div>  
                        </div>
                        <div id="form3" class="form-grid">
                            <div class="input-group">
                                <label for="nome_contato">Contato:</label>
                                <input type="text" id="nome_contato" name="nome_contato" placeholder="Digite o nome do contato" required>
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
                                <label for="logradouro">Logradouro:</label>
                                <input type="text" id="logradouro" name="logradouro" placeholder="Digite o logradouro" required>
                            </div>   
                            <div class="input-group">
                                <label for="bairro">Bairro:</label>
                                <input type="text" id="bairro" name="bairro" placeholder="Digite o bairro" required>
                            </div>  
                        </div>
                        <div class="btn-cancelar-salvar">
                                <button type="button" class="btn btn-cancelar">
                                    <a href="./Area-Adm.php">Cancelar</a>
                                </button>
                                <button type="submit" id="botao_cadastrar" name="REQUEST_METHOD" class="btn open-modal" data-modal="modal-deleta">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="btns">
                <a href="gerenciar-eventos.php" class="voltar">
                    <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de Voltar" class="btn-voltar">
                </a>
            </div>
        </div>

        <!-- Modal -->
        <dialog id="modal-deleta" class="modal-deleta">
            <div class="acao-recusar">
                <div class="acao-content-recusar">
                    <h1 class="acao-texto-recusar">Salvo com sucesso!</h1>
                    <div class="acao-botoes-recusar">
                        <button class="close-modal" data-modal="modal-deleta">Confirmar</button>
                    </div>
                </div>
            </div>
        </dialog>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Bola de Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Bola de Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola de Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js" defer></script>
    <script src="../../../Public/js/js-adm/preview-img.js" defer></script>
    <script src="../../../Public/js/js-modais/js-abrir-modal.js" defer></script>
    <script src="../../../Public/js/js-adm/cadastrar-parceiro.js" defer></script>
    
</body>

</html>
