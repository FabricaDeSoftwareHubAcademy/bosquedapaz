

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Expositor</title>
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="stylesheet" href="../../../Public/css/css-adm/cadastro-expositor.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="../js/main.js"></script>
</head>

<body>
<?php include "../../../Public/assets/adm/menu-adm.html"?>

    <main class="principal">

        <div class="box">

            <div class="title">
                <h1 class="title-text">CADASTRO DE EXPOSITORES</h1>
            </div>

            <div class="formularios">

                <div class="caixa-formulario">
                    <div class="input1">
                        <label>Nome completo:</label>
                        <input type="text" name="" id="" placeholder="Digite seu nome completo" required>
                    </div>
                    <div class="input2">
                        <label>E-mail:</label>
                        <input type="text" name="" id="" placeholder="E-mail completo" required>
                    </div>
                    
                    <div class="input3">
                        <label>Nome da Marca/Loja:</label>
                        <input type="text" name="" id="" placeholder="Digite o nome da sua marca ou loja" required>
                    </div>
                    <div class="input4">
                        <label>Qual Cidade Reside:</label>
                        <input type="text" name="" id="" placeholder="Digite sua cidade" required>
                    </div>
                   
                </div>

                <div class="caixa-contato">
                    <div class="cpf">
                        <label>CPF/CNPJ:</label>
                        <input type="text" name="" id="" placeholder="CPF/CNPJ " required>
                    </div>

                    <div class="whats-ctt">
                        <label>Whatsapp para Contato:</label>
                        <input type="text" name="" id="" placeholder="(67)" required>
                    </div>

                    <div class="categoria-prod">
                        <label for="optionInput3">Categorias</label>
                        <input list="options3" id="optionInput3" name="option3" placeholder="Selecione">
    
                        <datalist id="options3">
                            <option value="gastronomia">
                            <option value="artesanato">
                            <option value="moda">
                        </datalist>
                    </div>

                    

                </div>

                <div class="form-opc">
                    <div class="input5">
                        <label>Descrição:</label>
                        <input type="text" name="" id="" placeholder="Digite uma descrição sobre seu trabalho" required>
                    </div>
                    <label for="optionInput1">Se você possui um trailer, foodtruck ou barraca:<br>
                        Qual a medida EXATA dele?</label>
                    <input list="options1" id="optionInput1" name="option1" placeholder="Selecione">

                    <datalist id="options1">
                        <option value="3m²">
                        <option value="5m²">
                        <option value="10m²">
                    </datalist>

                    <label for="optionInput2">Precisa de energia para vender seus produtos?<br>
                        Se sim, para quais voltagens e quais equipamentos:</label>
                    <input list="options2" id="optionInput2" name="option2" placeholder="selecione">

                    <datalist id="options2">
                        <option value="300Kw">
                        <option value="500Kw">
                        <option value="1000Kw">
                    </datalist>

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

                <div class="expositor-kids">
                    <button><a href="#">Expositor Kids</a></button>
                </div>
                <div class="artistas">
                    <button><a href="#">Artistas</a></button>
                </div>

            </div>

            <!-- fazendo div para responsividade -->

            <!-- div de edital da feira junto com o chekbox -->
            <div class="edital-resp">
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
            </div>

            <!-- div para separar o expositor kids/artistas -->
            <div class="expo-resp">
                <div class="expositor-kids">
                    <button><a href="#">Expositor Kids</a></button>
                </div>
                <div class="artistas">
                    <button><a href="#">Artistas</a></button>
                </div>
            </div>

            <!-- div para salvar e cancelar -->
            <div class="botoes">
                <div class="botoes-cancelar">
                    <button onclick="" class="btn-cancelar">Cancelar</button>
                </div>
                
                <div class="salvar-resp">
                    <div class="botoes-salvar">
                    <button class="salvar" for="modal-checkbox" id="salvar-btn">Salvar</button>
                </div>

                <input type="checkbox" id="modal-checkbox" hidden>
                <div class="modal-container">
                    <div class="modal-content">
                        <h1>Confirmar?</h1>
                        <div class="botoes">
                            <label for="modal-checkbox" class="salvar"><label for="">Salvar</label></label>
                            <label for="modal-checkbox" class="cancelar"><label for="">Cancelar</label></label>
                        </div>
                    </div>
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