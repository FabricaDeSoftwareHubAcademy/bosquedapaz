<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosque da Paz - ADM</title>
    <!-- <link rel="stylesheet" href="../../../Public/css/menu-home.css"> -->
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-gerenciar-eventos.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
</head>
<body>
<?php include "../../../Public/assets/adm/menu-adm.html"?>

        <main class="principal">
            <div class="box">
                <h2>Gerenciar Eventos</h2>
                <div class="container">
                    <div class="search-bar">
                      <label for="status">Procurar</label>
                      <input type="text" id="status" placeholder="Expositor" />
                      <button class="search-button">BUSCAR</button>
                    </div>
                
                    <table class="collaborators-table">
                    <thead>
    <tr>
        <th class="usuario-col">Nome do Evento</th>
        <th>Data</th>
        <th>Status</th>
        <th class="email-col">Email</th>
        <th class="fone-col">Telefone</th>
        <th class="barraca-col">Fotos</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td class="usuario-col">01</td>
        <td>Carla Costa</td>
        <td><button class="status active">Ativo</button></td>
        <td class="email-col">carla.costa123@gmail.com</td>
        <td class="fone-col">(67) 98123-4567</td>
        <td class="barraca-col">
            <a href="edicao-expositor.php">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </td>
    </tr>
    <tr>
        <td class="usuario-col">02</td>
        <td>Juan Quintela</td>
        <td><button class="status inactive">Inativo</button></td>
        <td class="email-col">juan.quintela987@gmail.com</td>
        <td class="fone-col">(67) 98234-5678</td>
        <td class="barraca-col">
            <a href="edicao-expositor.php">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </td>
    </tr>
    <tr>
        <td class="usuario-col">03</td>
        <td>Julia Souza</td>
        <td><button class="status active">Ativo</button></td>
        <td class="email-col">julia.souza456@gmail.com</td>
        <td class="fone-col">(67) 98945-6789</td>
        <td class="barraca-col">
            <a href="edicao-expositor.php">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </td>
    </tr>
    <tr>
        <td class="usuario-col">04</td>
        <td>Pedro Alves</td>
        <td><button class="status inactive">Inativo</button></td>
        <td class="email-col">pedro.alves789@gmail.com</td>
        <td class="fone-col">(67) 98845-6789</td>
        <td class="barraca-col">
            <a href="edicao-expositor.php">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </td>
    </tr>
    <tr>
        <td class="usuario-col">05</td>
        <td>Nara Helena</td>
        <td><button class="status active">Ativo</button></td>
        <td class="email-col">nara.helena126@gmail.com</td>
        <td class="fone-col">(67) 98345-6789</td>
        <td class="barraca-col">
            <a href="edicao-expositor.php">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </td>
    </tr>
    <tr>
        <td class="usuario-col">06</td>
        <td>Fernanda Santos</td>
        <td><button class="status active">Ativo</button></td>
        <td class="email-col">fernanda.santos126@gmail.com</td>
        <td class="fone-col">(67) 97345-6623</td>
        <td class="barraca-col">
            <a href="edicao-expositor.php">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </td>
    </tr>
    <tr>
        <td class="usuario-col">07</td>
        <td>Emanuelle Valadares</td>
        <td><button class="status inactive">Inativo</button></td>
        <td class="email-col">manu.vala777@gmail.com</td>
        <td class="fone-col">(67) 98885-6888</td>
        <td class="barraca-col">
            <a href="edicao-expositor.php">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </td>
    </tr>
    <tr>
        <td class="usuario-col">08</td>
        <td>Kauan Ribeiro</td>
        <td><button class="status active">Ativo</button></td>
        <td class="email-col">kauan.ribeiro753@gmail.com</td>
        <td class="fone-col">(67) 99942-1110</td>
        <td class="barraca-col">
            <a href="edicao-expositor.php">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </td>
    </tr>
    <tr>
        <td class="usuario-col">09</td>
        <td>Vini Count</td>
        <td><button class="status inactive">Inativo</button></td>
        <td class="email-col">count.vini99@gmail.com</td>
        <td class="fone-col">(67) 99210-2566</td>
        <td class="barraca-col">
            <a href="edicao-expositor.php">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </td>
    </tr>
    <tr>
        <td class="usuario-col">10</td>
        <td>Isabela Oliveira</td>
        <td><button class="status active">Ativo</button></td>
        <td class="email-col">isa.bela555@gmail.com</td>
        <td class="fone-col">(67) 96841-5517</td>
        <td class="barraca-col">
            <a href="edicao-expositor.php">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </td>
    </tr>
    <tr>
        <td class="usuario-col">11</td>
        <td>Kelvin Bach</td>
        <td><button class="status inactive">Inativo</button></td>
        <td class="email-col">kelvin.bach0208@gmail.com</td>
        <td class="fone-col">(67) 90208-5623</td>
        <td class="barraca-col">
            <a href="edicao-expositor.php">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </td>
    </tr>
    <tr>
        <td class="usuario-col">12</td>
        <td>Paulo Henrique</td>
        <td><button class="status active">Ativo</button></td>
        <td class="email-col">paulo.henrique33@gmail.com</td>
        <td class="fone-col">(67) 98345-6789</td>
        <td class="barraca-col">
            <a href="edicao-expositor.php">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </td>
    </tr>
</tbody>


                    </table>
            <div class="btns">
                <a href="gerenciar-relatorios.php" class="voltar">
                <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>
            </div>  
            </div>
        </main>

        <div class="bolas-fundo">
            <img src="../../../Public/imgs/imagens-bolas/bola azul1.png" alt="Bola Fundo 1" class="bola-verde1">
            <img src="../../../Public/imgs/imagens-bolas/bola azul2.png" alt="Bola Fundo 2" class="bola-verde2">
            <img src="../../../Public/imgs/imagens-bolas/bola azu.png" alt="Bola Fundo 3" class="bola-rosa">
        </div>

    <script src="../../../Public/js//js-adm/status-colaborador.js"></script>
</body>
</html>