<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicial</title>
    <link rel="stylesheet" href="css/styles-home/style.css">
    <link rel="stylesheet" href="css/css-modais/css-m-perfil-expositor.css">
</head>
<!-- inicio body -->
<body class="home">
    <!-- incluindo o menu -->
    <?php include "assets/home/menu-home.html"; ?>
    <?php include "assets/home/carrossel-home.html"; ?>
    
    <!-- inicio main -->
    <main>
        
        <!-- importando informações da feira -->
        <?php include "assets/home/info-sobre-feira.html"; ?>
        
        <!-- importando categoria -->
        <?php include "assets/home/categoria.html"; ?>


        <!-- incluindo expositores -->
        <?php include "assets/home/lista-expositor.php"; ?>

    </main>
<!-- fim main -->

    <!-- importando avisos -->
    <?php include "assets/home/avisos.html"; ?>

    <!-- importando mapa -->
    <?php include "assets/home/mapa.html"; ?>

    <!-- importando o rodape -->
    <?php include "assets/home/rodape.html"; ?>

    <script src="js/js-home/main.js" defer></script>
    <script src="js/js-home/carrossel.js" defer></script>
    <script src="js/js-modais/js-abrir-modal.js" defer></script>
</body>
</html>