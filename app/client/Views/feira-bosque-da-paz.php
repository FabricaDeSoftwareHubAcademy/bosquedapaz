<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-home/style-feira-bosque-da-paz.css">
    <link rel="stylesheet" href="../../../Public/css/css-modais/style-m-perfil-expositor.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
</head>
<!-- inicio body -->
<body class="home">
    <!-- incluindo o menu -->
    <?php include "../../../Public/assets/home/menu-home.html"; ?>
    <?php include "../../../Public/assets/home/carrossel-home.html"; ?>
        
    <!-- importando informações da feira -->
    <?php include "../../../Public/assets/home/info-sobre-feira.html"; ?>
    
    <!-- incluindo expositores -->
    <?php include "../../../Public/assets/home/lista-expositor.php"; ?>
    
    <!-- importando categoria -->
    <?php include "../../../Public/assets/home/categoria.html"; ?>

<!-- fim main -->

    <!-- importando avisos -->
    <?php include "../../../Public/assets/home/avisos.html"; ?>

    <!-- importando mapa -->
    <?php include "../../../Public/assets/home/mapa.html"; ?>
    <?php include "../../../Public/assets/home/parceiros.html"; ?>

    <!-- importando o rodape -->
    <?php include "../../../Public/assets/home/rodape.html"; ?>

    <script src="../../../Public/js/js-home/main.js" defer></script>
    <script src="../../../Public/js/js-home/carrossel.js" defer></script>
    <script src="../../../Public/js/js-modais/js-abrir-modal.js" defer></script>
    <script src="../../../Public/js/js-home/subir-num.js"></script>
</body>
</html>
