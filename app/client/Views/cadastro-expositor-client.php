<?php
require_once '../Controller/Pessoa.php';
require_once '../Controller/Expositor.php';
require_once '../Controller/Categoria.php';

$categoriaModel = new Categoria();

$lista = $categoriaModel->listar();

// Verifica se é POST
if (isset($_POST['REQUEST_METHOD'])) {

    $expositor = new Expositor();

    $expositor->setNome($_POST['nome']);
    $expositor->setWhats($_POST['whatsapp']);
    $expositor->setEmail($_POST['email']);
    $expositor->setTelefone($_POST['whatsapp']);
    $expositor->setNome_marca($_POST['marca']);
    // verificar o input de voltagem
    $expositor->setVoltagem($_POST['voltagem']);
    // verificar o input de energia
    $expositor->setEnergia($_POST['energia']);
    $expositor->setContato2($_POST['whatsapp']);
    // verificar o input de descricao
    // $expositor->setDescricao('teste');
    // verificar o input de metodo pagamento
    // $expositor->setMetodos_pgto('DINHEIRO SEMPRE');
    $expositor->setProduto($_POST['produto']);
    // verificar o input cor rua
    // $expositor->setCor_rua('vermelha');
    // verificar o input id_categoria
    $expositor->setId_categoria($_POST['id_categoria']);
    // verificar o input id_imagem
    $expositor->setImagens($_POST['files']);

    $res = $expositor->cadastrar();

    if ($res) {
        header("Location: cadastro-expositor-client.php");
        echo '<script> alert("cadastrou") </script>';
    } else {
        echo '<script> alert(" não cadastrou") </script>';
    }
    exit;
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-home/style-menu.css">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-cadastrar-expositor.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
</head>

<body>
    <?php include "../../../Public/assets/home/menu-home.html" ?>


    <main class="principal">

        <div class="box">

            <div class="title">
                <h1 class="title-text">CADASTRO DE EXPOSITORES</h1>
            </div>

            <form class="formularios" method="POST">

                <div class="form-pessoa">
                    <div class="input">
                        <label>Nome completo:</label>
                        <input type="text" name="nome" id="" placeholder="Digite seu nome completo" required>
                    </div>
                    <div class="input">
                        <label>Whatsapp:</label>
                        <input type="text" name="whatsapp" id="" placeholder="Número de whatsapp" required>
                    </div>

                    <div class="input">
                        <label>E-mail:</label>
                        <input type="text" name="email" id="" placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="input">
                        <label>Qual Cidade Reside:</label>
                        <input type="text" name="cidade" id="" placeholder="Digite sua cidade">
                    </div>
                </div>

                <div class="form-loja">
                    <div class="input">
                        <label>Produto:</label>
                        <input type="text" name="produto" id="" placeholder="Digite seu produto" required>
                    </div>

                    <div class="input">
                        <label>Marca:</label>
                        <input type="text" name="marca" id="" placeholder="Digite a marca " required>
                    </div>

                    <div class="input">
                        <label for="optionInput3">Categorias</label>
                        <select name="id_categoria" id="categorias" class="select" require>
                            <option value="">Selecione</option>
                            <?php foreach($lista as $categoria) : ?>
                                <option value="<?= $categoria['id_categoria'] ?>"><?= $categoria['descricao'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="input">
                        <label>Link:</label>
                        <script>
                            link
                        </script>
                        <input type="text" name="" id="" placeholder="link instagram" required>
                    </div>
                </div>


                <div class="form-expo">
                    <label for="tipo-expo">Tipo de exposição:</label>
                    <div class="custom-dropdown">
                        <select name="" id="" class="select">
                            <option value="">Selecione</option>
                            <option value="trailer">Trailer</option>
                            <option value="food-truck">Food truck</option>
                            <option value="barraca">Barraca</option>
                        </select>
                    </div>

                    <label for="energia">Precisa de energia?</label>
                    <div class="custom-dropdown">
                        <select name="energia" id="energia" class="select">

                            <option value="">Selecione</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>


                        </select>
                    </div>

                    <label for="equipamentos">Voltagens dos equipamentos</label>
                    <div class="custom-dropdown">
                        <select name="voltagem" id="voltagem" class="select">

                            <option value="">selecione</option>
                            <option value="110v">110v</option>
                            <option value="220v">220v</option>

                        </select>
                    </div>
                    <div class="input-group">
                        <label>Escolher Imagens:</label>
                        <input type="file" name="files[]" id="files" multiple="multiple">
                    </div>

                </div>
                                
                <div class="btn-finalizar">
                    <button name="REQUEST_METHOD" class="btn btn-salvar">salvar</button>
                    <button class="btn btn-cancelar"><a href="cadastrar-expositor.php">cancelar</a></button>
                </div>
            </form>

            <div class="btns">
                <a href="escolher-cadastro.php" class="voltar">
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