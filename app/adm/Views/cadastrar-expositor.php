

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-expositor.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
</head>

<body>
<?php include "../../../Public/assets/adm/menu-adm.html"?>


    <main class="principal">

        <div class="box">

            <div class="title">
                <h1 class="title-text">CADASTRO DE EXPOSITORES</h1>
            </div>

            <form class="formularios">

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
                        <!-- <input list="options3" id="optionInput3" name="option3" placeholder="Selecione"> -->
    
                        <select name="todas_categorias" id="categorias" class="select">

                            <option value="">Selecione</option>
                            <option value="artesanato">Artesanato</option>
                            <option value="gastronia">Gastronia</option>
                            <option value="antiguidade">Antiguidade/Colecionismo</option>
                            <option value="antiguidade">Plantas</option>
                            <option value="antiguidade">Hortifruti</option>
                            <option value="antiguidade">Moda autoral</option>
                            <option value="antiguidade">Literatura</option>
                            <option value="antiguidade">Cosmético</option>
                            <option value="antiguidade">Sustentabilidade (brechó)</option>
                            <option value="antiguidade">Empreendedorismo (industrializado)</option>
                           
                        </select>
                        
                    </div>

                    <div class="input">
                        <label>Link:</label>
                        <script>link</script>
                        <input type="text" name="" id="" placeholder="link instagram" required>
                    </div>

                    

                </div>

                
                <div class="form-expo">
                    <label for="tipo-expo">Tipo de exposição:</label>
                    <div class="custom-dropdown">
                        <!-- <input type="text" id="tipo-expo" name="tipo-expo" placeholder="Selecione" autocomplete="off"> -->
                        <select name="" id="" class="select">

                            <option value="">Selecione</option>
                            <option value="trailer">Trailer</option>
                            <option value="food-truck">Food truck</option>
                            <option value="barrca">Barrca</option>

                        </select>
                    </div>

                    <label for="energia">Precisa de energia?</label>
                    <div class="custom-dropdown">
                        <select name="" id="" class="select">  

                            <option value="">Selecione</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        

                        </select>
                    </div>

                    <label for="equipamentos">Voltagens dos equipamentos</label>
                    <div class="custom-dropdown">
                        <select name="" id="" class="select">

                            <option value="">selecione</option>
                            <option value="110v">110v</option>
                            <option value="220v">220v</option>
                            
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Escolher Imagem:</label>
                        <input type="file" name="file" id="file"
                            required>
                    </div>
                </div>



               

            </form>

            <form action="" method="post" class="finalizar">
                <div class="btn-finalizar">
                    <button class="btn btn-cancelar"><a href="">cancelar</a></button>
                    <button class="btn btn-salvar"><a href="">salvar</a></button>
                </div>
            </form>

            <div class="btns">
                <a href="gerenciar-expositores.php" class="voltar">
                    <img class="img-voltar" src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
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

    <script src="../../../Public/js/js-modais/modal-cadastro-expositor.js"></script>

    
</body>

</html>