<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-cadastrar-expositor.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <?php include "../../../Public/include/home/menu-home.html" ?>

    <main class="principal">
        <form class="form-cadastro" id="formCadastro" enctype="multipart/form-data">
            <h1 class="title-cadastro">Cadastro expositor</h1>
            <div class="conteiner_inputs">

                <div class="conteiner-input">
                    <div class="content-input">
                        <label class="label-input">Nome completo:</label>
                        <input class="input" type="text" name="" id="" placeholder="Seu nome" required>
                    </div>
                    <div class="content-input">
                        <label class="label-input">Nome da marca:</label>
                        <input class="input" type="text" name="" id="" placeholder="Nome da sua marca" required>
                    </div>
                </div>

                <div class="conteiner-input">
                    <div class="content-input">
                        <label class="label-input">Email:</label>
                        <input class="input" type="email" name="" id="" placeholder="Exemplo@gmail.com" required>
                    </div>
                    <div class="content-input">
                        <label class="label-input">Logo da Marca:</label>
                        <input class="input" type="file" name="" id="" required>
                    </div>
                </div>

                <div class="conteiner-input">
                    <div class="content-input">
                        <label class="label-input">Qual cidade reside:</label>
                        <input class="input" type="text" name="" id="" placeholder="EX: Campo Grande" required>
                    </div>
                    <div class="content-input">
                        <label class="label-input">Número de whatsapp:</label>
                        <input class="input" type="tel" name="" id="" placeholder="EX: 67 9 xxxx-xxxx" required>
                    </div>
                    <div class="content-input">
                        <label class="label-input">Rede social:</label>
                        <input class="input" type="text" name="" id="" placeholder="link ou @usuário" required>
                    </div>
                </div>

                <div class="conteiner-input">
                    <div class="content-input">
                        <label class="label-input">Qual seu produto:</label>
                        <input class="input" type="text" name="" id="" placeholder="EX: Açai" required>
                    </div>
                    <div class="content-input">
                        <label class="label-input">Qual sua categoria:</label>
                        <select class="input" name="" id="" required>
                            <option value="">a</option>
                            <option value="">b</option>
                            <option value="">c</option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>

                <div class="conteiner-input conteiner-area">
                    <div class="content-input input-area">
                        <label class="label-input">Se precisa de energia, descreva quais voltagens e equipamentos: Importante</label>
                        <textarea class="textarea" name="" id="" placeholder="EX: 127v/220v, freezer, geladeira"></textarea>
                    </div>
                    <div class="content-input input-area">
                        <label class="label-input">Se possui um trailer, foodtruck ou barraca de comida, quais as medidas exatas dele? Importante</label>
                        <textarea class="textarea" name="" id="" placeholder="EX: 2Ms X 3Ms"></textarea>
                    </div>
                </div>

                <div class="conteiner-input">
                    <div class="content-input maior">
                        <label class="label-input">Descreva a sua marca:</label>
                        <textarea class="textarea" name="" id="" required></textarea>
                    </div>
                    <div class="content-input">
                        <label class="label-input">Envie 6 fotos do seu produto para avaliação: importante</label>
                        <input class="input" type="file" name="" id="" required>
                    </div>
                </div>
            </div>
            <?php include "../../../Public/include/Butons-forms.html" ?>
        </form>
        <div class="bolas">
            <img src="../../../Public/assets/img-bolas/bola-verde1.png" class="bola-verde1">
            <img src="../../../Public/assets/img-bolas/bola-verde2.png" class="bola-verde2">
            <img src="../../../Public/assets/img-bolas/bola-rosa.png" class="bola-rosa">
        </div>
    </main>


    <script src="../../../Public/js/js-menu/js-menu.js" defer></script>
    <!-- <script src="../../../Public/js/js-adm/js-cadastrar-expositor.js" defer></script> -->

</body>

</html>