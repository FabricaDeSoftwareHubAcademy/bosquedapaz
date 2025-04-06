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

<body>
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>

    <main class="principal">
        <div class="box">
            <h2>RELATÓRIO DE EXPOSITOR</h2>
            <div class="area-pesquisa">
                <div class="div-pesquisa">
                    <label for="status"></label>
                    <input type="text" id="status" placeholder="Expositor" />
                    <button class="button-buscar">BUSCAR</button>
                </div>
                <div class="table-area">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th class="cpf">CPF</th>
                                <th class="cat">Categoria</th>
                                <th class="email">Email</th>
                                <th>Perfil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lucas Martins</td>
                                <td class="cpf">111.222.333-44</td>
                                <td class="cat">Expositor</td>
                                <td class="email">lucas.martins@email.com</td>
                                <td class="perfil">
                                    <a href="validar-expositor.php">
                                        <i class="bi bi-person-badge"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Lucas Martins</td>
                                <td class="cpf">111.222.333-44</td>
                                <td class="cat">Expositor</td>
                                <td class="email">lucas.martins@email.com</td>
                                <td class="perfil">
                                    <a href="validar-expositor.php">
                                        <i class="bi bi-person-badge"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Lucas Martins</td>
                                <td class="cpf">111.222.333-44</td>
                                <td class="cat">Expositor</td>
                                <td class="email">lucas.martins@email.com</td>
                                <td class="perfil">
                                    <a href="validar-expositor.php">
                                        <i class="bi bi-person-badge"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Lucas Martins</td>
                                <td class="cpf">111.222.333-44</td>
                                <td class="cat">Expositor</td>
                                <td class="email">lucas.martins@email.com</td>
                                <td class="perfil">
                                    <a href="validar-expositor.php">
                                        <i class="bi bi-person-badge"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Lucas Martins</td>
                                <td class="cpf">111.222.333-44</td>
                                <td class="cat">Expositor</td>
                                <td class="email">lucas.martins@email.com</td>
                                <td class="perfil">
                                    <a href="validar-expositor.php">
                                        <i class="bi bi-person-badge"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Lucas Martins</td>
                                <td class="cpf">111.222.333-44</td>
                                <td class="cat">Expositor</td>
                                <td class="email">lucas.martins@email.com</td>
                                <td class="perfil">
                                    <a href="validar-expositor.php">
                                        <i class="bi bi-person-badge"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="btn-v">
                    <a href="Area-Adm.php" class="voltar">
                        <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                    </a>
                </div>
            </div>
        </div>
    </main>
    <div class="bolas-fundo">
        <img class="bola-azul1" src="../../../Public/imgs/imagens-bolas/azul-sem-fundo1.png" alt="">
        <img class="bola-azul2" src="../../../Public/imgs/imagens-bolas/azul-sem-fundo2.png" alt="">
        <img class="bola-azul3" src="../../../Public/imgs/imagens-bolas/azul-sem-fundo3.png" alt="">
    </div>

  <script src="../../../Public/js//js-adm/status-colaborador.js"></script>
</body>
</html>