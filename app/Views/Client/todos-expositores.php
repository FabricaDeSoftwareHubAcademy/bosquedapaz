<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Bosque da Paz</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-lista-expositor.css">
    <link rel="stylesheet" href="../../../Public/css/css-modais/perfil-expositor.css">

    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>

    <?php include "../../../Public/include/home/menu-home.html"; ?>

    <main class="content-principal">
        <h1 class="title-all-expo">expositores</h1>
        <div class="select-area">
            <select name="selecao-categoria" id="select-cat" class="select-cat">
                <option value="inicio" class="opcoes-cat" id="opcoes_categoria">Todas as Categorias</option>
                <option value="artesanato" class="opcoes-cat">Artesanato</option>
                <option value="tempora" class="opcoes-cat">tempora</option>
                <option value="autem" class="opcoes-cat">autem</option>
                <option value="iusto" class="opcoes-cat">iusto</option>
                <option value="colecionismo" class="opcoes-cat">Colecionismo</option>
            </select>
            <div class="vir-aqui" id="artesanato"></div>
            <div class="procurar">
                <h3 class="title-pes">Pesquisar por expositor:</h3>
                <div class="pesquisa-expo"> <!-- area de pesquisa -->
                    <input class="input-pes" id="input_pesquisa" type="text" placeholder="Pesquisar por...">
                </div>
            </div>
        </div>
        <div class="area-all-cards" id="content-cards">
            
        </div>
    </main>

    <?php include '../../../Public/include/home/perfil-expositor.html' ?>

    <?php include "../../../Public/include/home/rodape.html"; ?>
    <script src="../../../Public/js/js-home/todos-expositores.js"></script>
    <?php include "../../../Public/include/vlibras.html" ?>
</body>

</html>