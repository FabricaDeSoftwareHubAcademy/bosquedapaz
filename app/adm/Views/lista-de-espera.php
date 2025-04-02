<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-lista-de-espera.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <title>Adm - Bosque da Paz</title>
</head>

<body class="corpo-lisEsp">
    <?php include "../../../Public/assets/adm/menu-adm.html"; ?>

    <section class="area-LisEsp-principal">
        <div class="b-LisEsp1">
            <img src="../../../Public/imgs/imgs-lista-de-espera/b-LisEsp1.svg" alt="">
        </div>

        <div class="b-LisEsp2">
            <img src="../../../Public/imgs/imgs-lista-de-espera/b-LisEsp2.svg" alt="">
        </div>

        <div class="b-LisEsp3">
            <img src="../../../Public/imgs/imgs-lista-de-espera/b-LisEsp4.svg" alt="">
        </div>

        <div class="box-LisEsp-mat">
            <div class="seta-LisEsp3-res">
                <a href="../../../app/adm/Views/Area-Adm.php"><img src="../../../Public/imgs/imgs-lista-de-espera/seta-lispe.png" alt=""></a>
            </div>

            <h1>LISTA DE ESPERA</h1>
            <div class="search-bar">
                <label for="status">Procurar</label>
                <input type="text" id="status" placeholder="Expositor" />
                <button class="search-button">BUSCAR</button>
            </div>

            <div class="area-table-lisEsp">
                <table class="table-lisEsp">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Categoria</th>
                            <th class="email">Email</th>
                            <th class="perfil">Perfil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#">Lucas Martins</a></td>
                            <td><a href="#">111.222.333-44</a></td>
                            <td><a href="#">Expositor</a></td>
                            <td><a href="#">lucas.martins@email.com</a></td>
                            <td id="td-icon"><a href="#"><i class="bi bi-person-badge"></i></a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Mariana Oliveira</a></td>
                            <td><a href="#">555.666.777-88</a></td>
                            <td><a href="#">Expositor</a></td>
                            <td><a href="#">mariana.oliveira@email.com</a></td>
                            <td><a href="#"><i class="bi bi-person-badge"></i></a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Pedro Souza</a></td>
                            <td><a href="#">333.444.555-66</a></td>
                            <td><a href="#">Expositor</a></td>
                            <td><a href="#">pedro.souza@email.com</a></td>
                            <td><a href="#"><i class="bi bi-person-badge"></i></a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Juliana Lima</a></td>
                            <td><a href="#">444.555.666-77</a></td>
                            <td><a href="#">Expositor</a></td>
                            <td><a href="#">juliana.lima@email.com</a></td>
                            <td><a href="#"><i class="bi bi-person-badge"></i></a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Ricardo Almeida</a></td>
                            <td><a href="#">555.333.222-11</a></td>
                            <td><a href="#">Expositor</a></td>
                            <td><a href="#">ricardo.almeida@email.com</a></td>
                            <td><a href="#"><i class="bi bi-person-badge"></i></a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Fernanda Costa</a></td>
                            <td><a href="#">666.777.888-99</a></td>
                            <td><a href="#">Expositor</a></td>
                            <td><a href="#">fernanda.costa@email.com</a></td>
                            <td><a href="#"><i class="bi bi-person-badge"></i></a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Gabriel Pires</a></td>
                            <td><a href="#">777.888.999-00</a></td>
                            <td><a href="#">Expositor</a></td>
                            <td><a href="#">gabriel.pires@email.com</a></td>
                            <td><a href="#"><i class="bi bi-person-badge"></i></a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Aline Rocha</a></td>
                            <td><a href="#">888.999.000-11</a></td>
                            <td><a href="#">Expositor</a></td>
                            <td><a href="#">aline.rocha@email.com</a></td>
                            <td><a href="#"><i class="bi bi-person-badge"></i></a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Bruna Silva</a></td>
                            <td><a href="#">999.000.111-22</a></td>
                            <td><a href="#">Expositor</a></td>
                            <td><a href="#">bruna.silva@email.com</a></td>
                            <td><a href="#"><i class="bi bi-person-badge"></i></a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Felipe Santos</a></td>
                            <td><a href="#">000.111.222-33</a></td>
                            <td><a href="#">Expositor</a></td>
                            <td><a href="#">felipe.santos@email.com</a></td>
                            <td><a href="#"><i class="bi bi-person-badge"></i></a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Fernanda Costa</a></td>
                            <td><a href="#">666.777.888-99</a></td>
                            <td><a href="#">Expositor</a></td>
                            <td><a href="#">fernanda.costa@email.com</a></td>
                            <td><a href="#"><i class="bi bi-person-badge"></i></a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Fernanda Costa</a></td>
                            <td><a href="#">666.777.888-99</a></td>
                            <td><a href="#">Expositor</a></td>
                            <td><a href="#">fernanda.costa@email.com</a></td>
                            <td><a href="#"><i class="bi bi-person-badge"></i></a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Fernanda Costa</a></td>
                            <td><a href="#">666.777.888-99</a></td>
                            <td><a href="#">Expositor</a></td>
                            <td><a href="#">fernanda.costa@email.com</a></td>
                            <td><a href="#"><i class="bi bi-person-badge"></i></a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Fernanda Costa</a></td>
                            <td><a href="#">666.777.888-99</a></td>
                            <td><a href="#">Expositor</a></td>
                            <td><a href="#">fernanda.costa@email.com</a></td>
                            <td><a href="#"><i class="bi bi-person-badge"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="seta-LisEsp3">
                <a href="Area-Adm.php" class="voltar-link">
                    <img src="../../../Public/imgs/img-area-contate/seta-voltar.png" class="btn-voltar">
                </a>
            </div>
        </div>
    </section>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
</body>

</html>