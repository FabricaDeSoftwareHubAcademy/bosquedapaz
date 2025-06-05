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
                <form action="#" method="POST">
                    <div id="form1">
                        <div class="data-imagem">
                            <div class="input-group">
                                <label>Parceiro:</label>
                                <input type="text" id="data-inicio" placeholder="Digite o Nome" name="data-inicio" value="">
                            </div>
                            <div class="input-group">
                                <label>Telefone:</label>
                                <input type="text" placeholder="Digite seu Telefone" name="file" id="file"
                                    required>
                            </div>
                        </div>
                        <img class="preview" src="" alt="" id="preview-image">
                    </div>
                </form>
                <form action="#" method="POST">
                    <div id="form1">
                        <div class="data-imagem">
                            <div class="input-group">
                                <label>E-mail:</label>
                                <input type="text" id="data-inicio" placeholder="Digite o e-mail" name="data-inicio" value="">
                            </div>
                            <div class="input-group">
                                <label>Contato:</label>
                                <input type="text" name="file" placeholder="Digite o Nome de Contato" id="file"
                                    required>
                            </div>
                        </div>
                        <img class="preview" src="" alt="" id="preview-image">
                    </div>
                </form>
                <form action="#" method="POST">
                    <div id="form1">
                        <div class="data-imagem">
                            <!-- <div class="input-group">
                                <label>Tipo:</label>
                                <input type="text" id="data-inicio" name="data-inicio" value="">
                            </div> -->
                            <div class="input-group">
                                <label for="tipo-parceiro">Tipo:</label>
                                <select id="tipo-parceiro" name="tipo" required>
                                    <option value="" disabled selected>Selecione o tipo</option>
                                    <option value="juridica">Jurídica</option>
                                    <option value="fisica">Física</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <label>CPF/CNPJ:</label>
                                <input type="text" name="file" placeholder="Digite o CPF/CNPJ" id="file"
                                    required>
                            </div>
                        </div>
                        <img class="preview" src="" alt="" id="preview-image">
                    </div>
                </form>
                <form action="#" method="POST">
                    <div id="form1">
                        <div class="data-imagem">
                            <div class="input-group">
                                <label>Logo:</label>
                                <input type="file" name="file" id="file"
                                    required>
                            </div>
                            <div class="input-group">
                                <label>CEP:</label>
                                <input type="text" placeholder="Digite o CEP"name="file" id="file"
                                    required>
                            </div>
                        </div>
                        <img class="preview" src="" alt="" id="preview-image">
                    </div>
                </form>
                
            </div>
            <div class="btns">
                <a href="Area-Adm.php" class="voltar">
                    <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>

                <div class="btn-cancelar-salvar">
                    <button class="btn btn-cancelar">
                        <a href="./Area-Adm.php">Cancelar</a>
                    </button>

                    <button class="open-modal" data-modal="modal-deleta">
                        Salvar
                    </button>
                        
                </div>
            </div>
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
