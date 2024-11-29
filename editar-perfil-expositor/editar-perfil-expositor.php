<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar perfil</title>
    <link rel="stylesheet" href="../menu/menu-adm.css">
    <link rel="stylesheet" href="css/style-perfil-expositor.css">
    <link rel="stylesheet" href="css/elem-perfil-expo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "../menu/menu.html"; ?>

    <!-- inicio da parte principal da pagina -->
    <main class="principal">
        
        <!-- box principal -->
        <div class="box">
            <div class="parte-superior">
                <img src="img/img-banner.png" alt="imagem do banner" class="img-banner">
            </div>
            
            <div class="informacoes">
                <div class="lado lado-esquerdo">
                    <div class="content-fp">
                        <img src="img/foto-perfil.png" alt="foto de perfil" class="foto-perfil">
                        <h1 class="nome">Nome da Empresa</h1>
                    </div>
                    <div class="content-sob-empre">
                        <h2 class="text sobre-empresa">Sobre Empresa</h2>
                        <p class="text-sob-empre">Nossa jornada começou com uma simples ideia: tornar os momentos especiais de nossos pets ainda mais memoráveis. Sabemos que nossos cães são parte fundamental de nossas vidas e acreditamos que eles merecem um tratamento especial, especialmente em seu dia especial.</p>
                    </div>
                    <div class="content-num-barr">
                        <h2 class="text num-barraca">Numero da Barraca</h2>
                        <p class="text-num-barr">N° 86</p>
                    </div>
                    <div class="content-cor-r">
                        <h2 class="text cor-rua">Cor da Rua</h2>
                        <p class="text-cor-r">cor</p>
                    </div>
                    <!-- <div class="content-metod-pag">
                        <h2 class="text metod-pag">Método Pagamento</h2>
                        <p>PIX</p>
                        <p>Catão de Credito</p>
                        <p>Cartao de Debito</p>
                    </div> -->
                </div>

                <div class="lado lado-direito">
                    <div class="content-info-p">
                        <h2 class="text info-pessoais">Informações Pessoais</h2>
                        <ul class="list-cont">
                            <li class="li-cont"><i class="fa-brands fa-instagram icon"></i> @cakepetcg</li>
                            <li class="li-cont"><i class="fa-solid fa-phone icon"></i> (67) 99914-5079</li>
                            <li class="li-cont"><i class="fa-regular fa-envelope icon"></i> cakepetcg@contato.com</li>
                        </ul>
                    </div>
                    <h2 class="text galeria">Galeria de Imagens</h2>
                    <img src="img/img-galeria.png" alt="imagem" class="img-caleria">
                    <div class="btns">
                        <button class="btn-volt btn-ac">Voltar</button>
                        <button class="btn-edit btn-ac">Editar</button>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- bolas de fundo -->
    <div class="bolas-fundo">
        <img src="img/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="img/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="img/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <!-- link do JavaScript -->
    <script src="js/main.js"></script>
</body>
</html>