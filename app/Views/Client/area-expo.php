<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosque da Paz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="../../../Public/css/css-home/style-area-expositor.css">
</head>

<body>
    <?php include "../../../Public/include/home/menu-expositor.html"; ?>

    <main class="content-principal" id="principal">
        <h1 class="title">Área do Expositor</h1>

        <div class="conteiner-cards">
            <a href="../../../app/Views/Client/listar-boletos.php" class="link-card">
                <div class="card-conteiner">
                    <div class="card-content">
                        <img src="../../../Public/imgs/img-area-adm/Vector%20Relatorio.png" alt="">
                        <p class="text-card">meus boletos</p>
                    </div>
                </div>
            </a>
            <a href="../../../app/Views/Client/edicao-perfil-expositor.php" class="link-card">
                <div class="card-conteiner">
                    <div class="card-content">
                        <img src="../../../Public/imgs/img-area-adm/Vector Expositores.png" alt="">
                        <p class="text-card">editar perfil</p>
                    </div>
                </div>
            </a>
        </div>
    </main>

    <img src="../../../Public/imgs/imagens-bolas/imagem-superior-esquerdo.svg" class="img-1">
    <img src="../../../Public/imgs/imagens-bolas/imagem-superior-direito.svg" class="img-2">
    <img src="../../../Public/imgs/imagens-bolas/imagem-inferior-direito.svg" class="img-3">
</body>
</html>