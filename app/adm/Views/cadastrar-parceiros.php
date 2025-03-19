<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Página para gerenciar parceiros e suas informações.">
        <title>Cadastrar Parceiros</title>
        <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-parceiros.css"> 
        <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
        <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >

    </head>

    <body>
    <?php include "../../../Public/assets/adm/menu-adm.html"?>

        <main class="principal">

            <div class="box">

                <div class="title">
                    <h1 class="title-text">Cadastro de Parceiros</h1>
                </div>

                <div class="formularios">

                    <div class="form-pessoa">
                        <div class="input">
                            <label>Parceiro:</label>
                            <input type="text" name="" id="" placeholder="Digite o Nome" required>
                        </div>
                        <div class="input">
                            <label>E-mail:</label>
                            <input type="text" name="" id="" placeholder="Digite o e-mail" required>
                        </div>
                        
                        <div class="input">
                                <label for="optionInput3">Tipo:</label>
                                <!-- <input list="options3" id="optionInput3" name="option3" placeholder="Selecione"> -->

                                <select name="todas_categorias" id="todas_categorias" class="select">

                                    <option value="">selecione</option>
                                    <option value="artesanato">Fisica</option>
                                    <option value="gastronia">Jurídica</option>
                            
                                </select>
                            
                        </div>
                       
                        <div class="input">
                            <label>Logo:</label>
                            <input type="file" class="acao-input-edit" name="file" id="file" required>
                        </div>
                    
                    </div>

                    <div class="form-loja">

                        <div class="input">
                            <label>Telefone:</label>
                            <input type="text" name="" id="" placeholder="Digite seu Telefone" required>
                        </div>                    

                        <div class="input">
                            <label>Contato:</label>
                            <input type="text" name="" id="" placeholder="Digite o Nome de Contato" required>
                        </div>

                        <div class="input">
                            <label>CPF/CNPJ:</label>
                            <input type="text" name="" id="" placeholder="Digite o CPF/CNPJ" required>
                        </div>

                        <div class="input">
                            <label>CEP:</label>
                            <input type="text" name="" id="" placeholder="Digite o CEP" required>
                        </div>

                    </div>

                </div>

                <div class="form-finalizar">

                    <!-- <div class="edital-feira">
                        <button><a href="#">Edital da Feira</a></button>
                    </div> -->

                    
                    <div class="botoes-cancelar">
                        <button onclick="" class="btn-cancelar">Cancelar</button>
                    </div>

                    <div class="botoes-salvar">
                        <button class="salvar" for="modal-checkbox" id="salvar-btn">Salvar</button>
                    </div>

                    <div id="modal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <p>Deseja realmente salvar as alterações?</p>
                            <div class="modal-botoes">
                                <button class="btn-confirmar">Confirmar</button>
                                <button class="btn-cancelar-modal">Cancelar</button>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="form-termos">

                    <!-- <p class="termos">*Aceito os Termos do Edital:</p>

                    <div class="caixa-checkbox">
                        <input type="checkbox" id="checkbox-sim" class="caixa-checkbox-sim">
                        <label for="checkbox-sim" class="text-checkbox">- Sim</label>

                        <input type="checkbox" id="checkbox-nao" class="caixa-checkbox-nao">
                        <label for="checkbox-nao" class="text-checkbox">- Não</label>
                    </div> -->

                    <!-- <div class="expositor-kids">
                        <button><a href="#">Expositor Kids</a></button>
                    </div>
                    <div class="artistas">
                        <button><a href="#">Artistas</a></button>
                    </div> -->

                </div>

                <!-- fazendo div para responsividade -->

                <!-- div de edital da feira junto com o chekbox -->
                <!-- <div class="edital-resp">
                    <div class="edital-feira">
                        <button><a href="#">Edital da Feira</a></button>
                    </div>
                    
                    <p class="termos">*Aceito os Termos do Edital:</p>

                    <div class="caixa-checkbox">
                        <input type="checkbox" id="checkbox-sim" class="caixa-checkbox-sim">
                        <label for="checkbox-sim" class="text-checkbox">- Sim</label>

                        <input type="checkbox" id="checkbox-nao" class="caixa-checkbox-nao">
                        <label for="checkbox-nao" class="text-checkbox">- Não</label>
                    </div>
                </div> -->

                <!-- div para separar o expositor kids/artistas -->
                <!-- <div class="expo-resp">
                    <div class="expositor-kids">
                        <button><a href="#">Expositor Kids</a></button>
                    </div>
                    <div class="artistas">
                        <button><a href="#">Artistas</a></button>
                    </div>
                </div> -->

                <!-- div para salvar e cancelar -->
                    <div class="botoes">
                        <div class="botoes-cancelar">
                            <button onclick="" class="btn-cancelar">Cancelar<e/button>
                        </div>
                        
                        <div class="salvar-resp">
                            <div class="botoes-salvar">
                            <button class="salvar" for="modal-checkbox" id="salvar-btn">Salvar</button>
                        </div>               
                    </div>


            </div>
            <div class="btns">
                <a href="gerenciar-expositores.php" class="voltar">
                    <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>
            </div>
            
        </div>
        </main>

        <div class="bolas-fundo">

            <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
            <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
            <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
        </div>

        <script src="../../../Public/js/js-modais/modal-cadastro-expositor"></script>
</html>