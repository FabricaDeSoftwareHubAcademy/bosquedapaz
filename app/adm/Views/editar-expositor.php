<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-editar-expo-adm.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php include "../../../Public/assets/adm/menu-adm.html"?>

    <main class="principal">


        <div class="box">
            <div class="title">
                <h1 class="title-text">EDITAR EXPOSITOR</h1>
            </div>
            <div class="caixa-formulario">
                <div class="img-expo">
                    <img src="../../../Public/imgs/img-editar-exositor-adm/MOCA.png" alt="" class="img-expositor">
                </div>

                <div class="input-formulario">
                    <label>Nome Completo:</label>
                    <input type="text" name="" id="" value="Carla dias">
                    <label>Nome da Marca/Loja</label>
                    <input type="text" name="" id="" value="Carla Artesanatos e Ciah">
                    <label>Categoria</label>
                    <input type="text" name="" id="" value="Artesanato">
                </div>

                <div class="input-formulario2">
                    <label>Usuário</label>
                    <input type="text" name="" id="" value="01">
                    <label>NºBarraca:</label>
                    <input type="text" name="" id="" value="01">
                    <label>Whatsapp para Contato</label>
                    <input type="text" name="" id="" value="(67)9934ki25674">
                </div>

                <div class="input-formulario3">
                    <label>Tipo de exposição:</label>
                    <input type="text" name="" id="" value="trailer">
                    <label for="energia">Precisa de energia?</label>
                    <input type="text" name="" id="" value="Não">
                    <label for="energia">Voltagens dos equipamentos</label>
                    <input type="text" name="" id="" value="110v">
                </div>

            </div>
            </div>


            <div class="form-status">
                <div class="imagens">
                    <p class="text-img">Imagens:</p>

                    <div class="img-produtos">
                        <img src="../../../Public/imgs/img-editar-exositor-adm/img-produtos1.png" alt=""
                            class="img-produto1">
                        <img src="../../../Public/imgs/img-editar-exositor-adm/img-produtos2.png" alt=""
                            class="img-produto2">
                        <img src="../../../Public/imgs/img-editar-exositor-adm/img-produtos3.png" alt=""
                            class="img-produto3">
                        <img src="../../../Public/imgs/img-editar-exositor-adm/img-produtos4.png" alt=""
                            class="img-produto4">
                        <img src="../../../Public/imgs/img-editar-exositor-adm/img-produtos5.png" alt=""
                            class="img-produto5">
                    </div>

                </div>
                <div class="status">

                    <p class="status">Inativar/Ativar</p>
                    <label class="toggle-btn">
                        <input type="checkbox">
                        <div class="btn-status">
                            <div class="ativar"></div>
                        </div>
                    </label>
                </div>
            </div>

            


            <div class="form-finalizar">

                <div class="botao-cancelar">
                    <button>
                        <a href="#">Cancelar</a>
                    </button>
                </div>
                <div class="botao-salvar">
                    <button>
                        <a href="#">Salvar</a>
                    </button>
                </div>

                
    
            </div>

            
            <div class="btns">
                <a href="listar-expositor.php" class="voltar">
                <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>
            </div>
        </div>

    </main>
    <div class="bolas-fundo">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="bola fundo 1" class="bola-azul1">
        <img src="../../../Public/imgs/imagens-bolas/bola azul1.png" alt="bola fundo 2" class="bola-fundo2">
        <img src="../../../Public/imgs/imagens-bolas/bola azul2.png" alt="bola fundo 3" class="bola-fundo3">
    </div>

</body>

</html>