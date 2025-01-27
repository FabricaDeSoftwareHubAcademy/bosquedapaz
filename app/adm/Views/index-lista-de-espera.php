<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="stylesheet" href="../../../Public/css/css-adm/lista-de-espera.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Lista de Colaborador</title>
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
        <div class="seta-LisEsp3">
            <a href="../../../app/adm/Views/Area-Adm.php"><img src="../../../Public/imgs/imgs-lista-de-espera/seta-lispe.png" alt=""></a>
        </div>

        <div class="box-LisEsp-mat">
        
        <div class="seta-LisEsp3-res">
            <a href="../../../app/adm/Views/Area-Adm.php"><img src="../../../Public/imgs/imgs-lista-de-espera/seta-lispe.png" alt=""></a>
        </div>
            

            <h1>Lista de Espera</h1>
            <div class="area-pesquisa-lisEsp">
                <input type="text" id="search" name="q" placeholder="Pesquisar..." />
                <button>BUSCAR</button>
            </div>

            <table class="table-lisEsp">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Categoria</th>
                        <th>Email</th>
                        <th>Perfil</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <a href="#">
                            <td>Lucas Martins</td>
                            <td>111.222.333-44</td>
                            <td>Expositor</td>
                            <td>lucas.martins@email.com</td>
                            <td><i class="bi bi-search"></i></td>
                        </a>
                    </tr>
                    <tr>
                        <a href="#">
                            <td>Mariana Oliveira</td>
                            <td>555.666.777-88</td>
                            <td>Expositor</td>
                            <td>mariana.oliveira@email.com</td>
                            <td><i class="bi bi-search"></i></td>
                        </a>
                    </tr>
                    <tr>
                        <a href="#">
                            <td>Pedro Souza</td>
                            <td>333.444.555-66</td>
                            <td>Expositor</td>
                            <td>pedro.souza@email.com</td>
                            <td><i class="bi bi-search"></i></td>
                        </a>
                    </tr>
                    <tr>
                        <a href="#">
                            <td>Juliana Lima</td>
                            <td>444.555.666-77</td>
                            <td>Expositor</td>
                            <td>juliana.lima@email.com</td>
                            <td><i class="bi bi-search"></i></td>
                        </a>
                    </tr>
                    <tr>
                        <a href="#">
                            <td>Ricardo Almeida</td>
                            <td>555.333.222-11</td>
                            <td>Expositor</td>
                            <td>ricardo.almeida@email.com</td>
                            <td><i class="bi bi-search"></i></td>
                        </a>
                    </tr>
                    <tr>
                        <a href="#">
                            <td>Fernanda Costa</td>
                            <td>666.777.888-99</td>
                            <td>Expositor</td>
                            <td>fernanda.costa@email.com</td>
                            <td><i class="bi bi-search"></i></td>
                        </a>
                    </tr>
                    <tr>
                        <a href="#">
                            <td>Gabriel Pires</td>
                            <td>777.888.999-00</td>
                            <td>Expositor</td>
                            <td>gabriel.pires@email.com</td>
                            <td><i class="bi bi-search"></i></td>
                        </a>
                    </tr>
                    <tr>
                        <a href="#">
                            <td>Aline Rocha</td>
                            <td>888.999.000-11</td>
                            <td>Expositor</td>
                            <td>aline.rocha@email.com</td>
                            <td><i class="bi bi-search"></i></td>
                        </a>
                    </tr>
                    <tr>
                        <a href="#">
                            <td>Bruna Silva</td>
                            <td>999.000.111-22</td>
                            <td>Expositor</td>
                            <td>bruna.silva@email.com</td>
                            <td><i class="bi bi-search"></i></td>
                        </a>
                    </tr>
                    <tr>
                        <a href="#">
                            <td>Felipe Santos</td>
                            <td>000.111.222-33</td>
                            <td>Expositor</td>
                            <td>felipe.santos@email.com</td>
                            <td><i class="bi bi-search"></i></td>
                        </a>
                    </tr>
                    <tr>
                        <a href="#">
                            <td>Luana Ferreira</td>
                            <td>111.222.333-44</td>
                            <td>Expositor</td>
                            <td>luana.ferreira@email.com</td>
                            <td><i class="bi bi-search"></i></td>
                        </a>
                    </tr>
                    <tr>
                        <a href="#">
                            <td>Tiago Pereira</td>
                            <td>222.333.444-55</td>
                            <td>Expositor</td>
                            <td>tiago.pereira@email.com</td>
                            <td><i class="bi bi-search"></i></td>
                        </a>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>


</body>

</html>