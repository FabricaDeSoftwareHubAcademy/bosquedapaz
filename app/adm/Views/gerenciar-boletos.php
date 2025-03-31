<?php
$host = 'localhost'; // seu servidor MySQL, pode ser localhost
$usuario = 'root';   // seu usuário do banco de dados
$senha = '';         // sua senha (se houver)
$banco = 'expositor_teste'; // nome do banco de dados

// Criar a conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM expositor_lista";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Boletos </title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-gerenciar-boletos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
</head>

<body class="boleto-body">
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>

    <div class="boleto-box">
        <section class="boletao-secao-titulo">
            <h1 class="boleto-titulo">Gerenciamento de Boletos</h1>
        </section>

        <section class="boleto-secao-filtros">
            <form action="" class="form-boleto-filtros-container">
                <div class="boleto-filtro-expositor">
                    <label for="">Expositor</label>
                    <input type="text" name="" id="filtro_expositor" class="filtro-expositor" placeholder="Procure por um expositor">
                </div>

                <div class="linha-espaco"></div>

                <div class="boleto-filtro-datas">
                    <div class="boleto-filtro-data-area">
                        <label for="">Data Inicial</label>
                        <input type="date" name="" id="filtro_data_inicial" class="filtro-data-inicial">
                    </div>
                    <div class="boleto-filtro-data-area">
                        <label for="">Data Final</label>
                        <input type="date" name="" id="filtro_data_final" class="filtro-data-final">
                    </div>
                    <div class="boleto-filtro-data-pesquisar">
                        <label for="">Aplicar</label>
                        <button type="submit" class="botao-data-pesquisar">Buscar</button>
                    </div>
                </div>

                <div class="linha-espaco"></div>

                <div class="boleto-filtro-status">
                    <label for="">Status</label>
                    <select name="" id="filtro_status" class="filtro-status">
                        <option value="">Procurar por Status</option>
                        <option value="pago">Pago</option>
                        <option value="pendente">Pendente</option>
                    </select>
                </div>
            </form>
        </section>

        <section class="boleto-secao-tabela">
            <div class="boleto-tabela-container">
                <table class="boleto-tabela-lista">
                    <thead>
                        <tr>
                            <th>Expositor</th>
                            <th>Vencimento</th>
                            <th>Referência</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['nome']); ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($row['vencimento'])); ?></td>
                                    <td><?php echo htmlspecialchars($row['referencia']); ?></td>
                                    <td><?php echo number_format($row['valor'], 2, ',', '.'); ?></td>
<td>
    <button class="status <?php echo ($row['status'] == 'pago') ? 'boleto-botao-pago' : 'boleto-botao-pendente'; ?>" 
            onclick="toggleStatus(this, <?php echo $row['id_expositor']; ?>)">
        <?php echo ($row['status'] == 'pago') ? 'Pago' : 'Pendente'; ?>
    </button>
</td>


                                    <td>
                                        <a href="editar.php?id=<?php echo $row['id_expositor']; ?>" class="boleto-botao-editar">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">Nenhum boleto encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>
        </section>
    </div>

    <div class="boleto-bola1">
        <img src="../../../Public/imgs/imgs-lista-de-espera/b-LisEsp1.svg" alt="">
    </div>

    <div class="boleto-bola2">
        <img src="../../../Public/imgs/imgs-lista-de-espera/b-LisEsp2.svg" alt="">
    </div>

    <div class="boleto-bola3">
        <img src="../../../Public/imgs/imgs-lista-de-espera/b-LisEsp4.svg" alt="">
    </div>
    <div class="boleto-seta-voltar">
        <a href="../../../app/adm/Views/gerenciar-relatorios.php"><img src="../../../Public/imgs/imgs-lista-de-espera/seta-lispe.png" alt=""></a>
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/troca-status-boleto.js"></script>
</body>