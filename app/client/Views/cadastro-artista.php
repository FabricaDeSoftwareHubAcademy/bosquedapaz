

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosque da paz</title>
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="stylesheet" href="../../../Public/css/css-adm/cadastro-expositor.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="../Public/js/js-adm/js-cadastro-expositor.js"></script>

    <!-- <style>
    
        .select-opc {
            width: 40vh;
            height: 47px;
            margin: 10px;
            padding-left: 10px;
            border-radius: 5px;
            border: none;
            border-bottom: 2px solid #9d9fa1;
            border-right: 2px solid #9d9fa1;
        }

        label {
           
            display: block; 

        }

        
    </style> -->

</head>

<body>
<?php include "../../../Public/assets/adm/menu-adm.html"?>

    <main class="principal">

        <div class="box">

            <div class="title">
                <h1 class="title-text">CADASTRO DE ARTISTAS</h1>
            </div>

            <div class="formularios">

                <div class="form-pessoa">
                    <div class="input">
                        <label>Nome completo:</label>
                        <input type="text" name="" id="" placeholder="Digite seu nome completo" required>
                    </div>
                    <div class="input">
                        <label>Nome artistico:</label>
                        <input type="text" name="" id="" placeholder="Digite seu nome artistico " required>
                    </div>
                    
                    <div class="input">
                        <label>E-mail:</label>
                        <input type="text" name="" id="" placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="input">
                        <label>Whatsapp:</label>
                        <input type="text" name="" id="" placeholder="Número de whatsapp" required>
                    </div>
                   
                    <div class="input">
                        <label>Qual sua linguagem artística?</label>
                        <select name="todas_categorias" id="todas_categorias" class="select">
                            <option value="">Selecione</option>
                            <option value="teatro">Teatro</option>
                            <option value="danca">Dança</option>
                            <option value="circo">Circo</option>
                            <option value="musica">Música</option>
                        </select>
                    </div>
                </div>

                
                <div class="form-expo">

                    <div id="estilo_musica_container">
                        <label>Qual o estilo de música você segue?</label>
                        <select name="estilo_musica" id="estilo_musica" class="select">
                            <option value="">Selecione</option>
                            <option value="rock">Rock</option>
                            <option value="pop">Pop</option>
                            <option value="sertanejo">Sertanejo</option>
                            <option value="eletronica">Eletrônica</option>
                        </select>
                    </div>

                

                    <div class="input">
                        <label for="optionInput3">Qual seu publico alvo?</label>
    
                        <select name="todas_categorias" id="todas_categorias" class="select">

                            <option value="">selecione</option>
                            <option value="artesanato">Adulto</option>
                            <option value="gastronia">Infantil</option>
                            <option value="antiguidade">Misto</option>
                           
                        </select>
                        
                    </div>

                    <div class="input">
                        <label>Link:</label>
                        <input type="text" name="" id="" placeholder="link instagram" required>
                    </div>




                    <label for="tipo-expo">Tempo médio da sua apresentação?</label>
                    <div class="custom-dropdown">
                        <!-- <input type="text" id="tipo-expo" name="tipo-expo" placeholder="Selecione" autocomplete="off"> -->
                        <select name="todas_categorias" id="todas_categorias" class="select">

                            <option value="">selecione</option>
                            <option value="trailer">30min</option>
                            <option value="food-truck">50min</option>
                            <option value="barrca">60min</option>

                        </select>
                    </div>

                    <label for="energia">Qual valor do cache?</label>
                    <div class="custom-dropdown">
                        <select name="todas_categorias" id="todas_categorias" class="select">  

                            <option value="">selecione</option>
                            <option value="sim">Até R$200</option>
                            <option value="nao">Até R$500</option>
                            <option value="nao">Até R$1.000</option>
                        

                        </select>
                    </div>

                    <!-- <label for="equipamentos">Voltagens dos equipamentos</label>
                    <div class="custom-dropdown">
                        <select name="todas_categorias" id="todas_categorias" class="select">

                            <option value="">selecione</option>
                            <option value="110v">110v</option>
                            <option value="220v">220v</option>
                            
                        </select>
                    </div> -->
                    <!-- <div class="input-group">
                        <label>Escolher Imagem:</label>
                        <input type="file" name="file" id="file"
                            required>
                    </div> -->
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