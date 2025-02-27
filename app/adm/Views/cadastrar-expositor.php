

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosque da paz</title>
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-expositor.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="../Public/js/js-adm/js-cadastrar-expositor.js"></script>

</head>

<body>
<?php include "../../../Public/assets/adm/menu-adm.html"?>

    <main class="principal">

        <div class="box">

            <div class="title">
                <h1 class="title-text">CADASTRO DE EXPOSITORES</h1>
            </div>

            <div class="formularios">

                <div class="form-pessoa">
                    <div class="input">
                        <label>Nome completo:</label>
                        <input type="text" name="" id="" placeholder="Digite seu nome completo" required>
                    </div>
                    <div class="input">
                        <label>Whatsapp:</label>
                        <input type="text" name="" id="" placeholder="Número de whatsapp" required>
                    </div>
                    
                    <div class="input">
                        <label>E-mail:</label>
                        <input type="text" name="" id="" placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="input">
                        <label>Qual Cidade Reside:</label>
                        <input type="text" name="" id="" placeholder="Digite sua cidade" required>
                    </div>
                   
                </div>

                <div class="form-loja">
                    <div class="input">
                        <label>Produto:</label>
                        <input type="text" name="" id="" placeholder="Digite seu produto" required>
                    </div>

                    <div class="input">
                        <label>Marca:</label>
                        <input type="text" name="" id="" placeholder="Digite a marca " required>
                    </div>

                    <div class="input">
                        <label for="optionInput3">Categorias</label>
                        <input list="options3" id="optionInput3" name="option3" placeholder="Selecione">
    
                        <datalist id="options3">
                            <option value="gastronomia">
                            <option value="artesanato">
                            <option value="moda">
                        </datalist>
                    </div>

                    <div class="input">
                        <label>Link:</label>
                        <input type="text" name="" id="" placeholder="link instagram" required>
                    </div>

                    

                </div>

                
                <div class="form-expo">
                    <label for="tipo-expo">Tipo de exposição:</label>
                    <div class="custom-dropdown">
                        <input type="text" id="tipo-expo" name="tipo-expo" placeholder="Selecione" autocomplete="off">
                        <ul class="dropdown-list" id="tipo-expo-list">
                            <li onclick="selecionarOpcao(this, 'tipo-expo')">Trailer</li>
                            <li onclick="selecionarOpcao(this, 'tipo-expo')">Food Truck</li>
                            <li onclick="selecionarOpcao(this, 'tipo-expo')">Barraca</li>
                        </ul>
                    </div>

                    <label for="energia">Precisa de energia?</label>
                    <div class="custom-dropdown">
                        <input type="text" id="energia" name="energia" placeholder="Selecione" autocomplete="off">
                        <ul class="dropdown-list" id="energia-list">
                            <li onclick="selecionarOpcao(this, 'energia')">Sim</li>
                            <li onclick="selecionarOpcao(this, 'energia')">Não</li>
                        </ul>
                    </div>

                    <label for="equipamentos">Voltagens dos equipamentos</label>
                    <div class="custom-dropdown">
                        <input type="text" id="equipamentos" name="equipamentos" placeholder="Selecione" autocomplete="off">
                        <ul class="dropdown-list" id="equipamentos-list">
                            <li onclick="selecionarOpcao(this, 'equipamentos')">110kw</li>
                            <li onclick="selecionarOpcao(this, 'equipamentos')">220kw</li>
                        </ul>
                    </div>
                    <div class="input-group">
                        <label>Escolher Imagem:</label>
                        <input type="file" name="file" id="file"
                            required>
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
                        <button onclick="" class="btn-cancelar">Cancelar</button>
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

</body>

</html>