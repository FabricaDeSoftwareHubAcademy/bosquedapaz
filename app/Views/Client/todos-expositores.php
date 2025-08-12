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
        <h1 class="title-all-expo dark">expositores</h1>
        <div class="conteiner-expositores">
            <div class="conteiner_filtros">
                <div class="search_expositor">
                    <label class="search_here">procure aqui:</label>
                    <input class="input_filtro" id="input_pesquisa" type="text" placeholder="Pesquisar por...">
                </div>
                <select name="selecao-categoria" id="select-cat" class="input_filtro">
                    
                </select>
            </div>

            <div class="all_cards" id="content_cards">

                    

            </div>
        </div>
    </main>

    <?php include '../../../Public/include/home/perfil-expositor.html' ?>

    <?php include "../../../Public/include/home/rodape.html"; ?>
    <?php include "../../../Public/include/vlibras.html" ?>
    <script src="../../../Public/js/js-home/todos-expositores.js"></script>
</body>

</html>