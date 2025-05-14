<?php
$conn = new mysqli("localhost", "root", "", "banco_info");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT * FROM info_usuarios WHERE id_usuario = 18";
$result = $conn->query($sql);

$dados = $result->fetch_assoc();
?>

<?php session_start(); ?>

<script>
    const mostrarModalValidar3 = <?= isset($_SESSION['status-validar']) && $_SESSION['status-validar'] === 'success' ? 'true' : 'false' ?>;
    const mostrarModalRecusar3 = <?= isset($_SESSION['status-recusar']) && $_SESSION['status-recusar'] === 'success' ? 'true' : 'false' ?>;
</script>

<?php unset($_SESSION['status-recusar']); ?>
<?php unset($_SESSION['status-validar']); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bloco principal -->
    <title>Gerenciar e Validar</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-validar-expositor.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bloco principal -->
</head>

<body class="body-validar-expositor">

    <!-- Menu -->
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>

    <main class="main-box">
        <!-- Seção de dados da empresa -->
        <section class="secao-dados-empresa">
            <div class="area-superior">
                <h1 class="area-superior-texto">Nome da Empresa</h1>
                <img class="area-superior-imagem" src="../../../Public/imgs/imgs-validar-expositor/logomarca.png" alt="logo da empresa">
            </div>
            <div class="area-inferior">
                <h1 class="area-inferior-texto">Produtos</h1>
                <div class="area-inferior-produtos">
                    <div class="area-produtos">
                        <img class="produtos-imagens produto-imagem1" src="../../../Public/imgs/imgs-validar-expositor/produto1.jpeg" alt="">
                        <img class="produtos-imagens produto-imagem2" src="../../../Public/imgs/imgs-validar-expositor/produto2.jpeg" alt="">
                        <img class="produtos-imagens produto-imagem3" src="../../../Public/imgs/imgs-validar-expositor/produto3.jpeg" alt="">
                    </div>
                    <div class="area-produtos">
                        <img class="produtos-imagens produto-imagem1" src="../../../Public/imgs/imgs-validar-expositor/produto4.jpeg" alt="">
                        <img class="produtos-imagens produto-imagem2" src="../../../Public/imgs/imgs-validar-expositor/produto5.jpeg" alt="">
                        <img class="produtos-imagens produto-imagem3" src="../../../Public/imgs/imgs-validar-expositor/produto6.jpeg" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- Seção divisão -->
        <section class="secao-divisao">
            <div class="linha-divisao"></div>
        </section>

        <!-- Seção de dados do expositor -->
        <section class="secao-dados-expositor">
            <div class="area-formulario">
                <h1 class="area-formulario-texto">Dados do Expositor</h1>
                <form action="" method="" class="container-formulario-dados" id="">
                    <div class="container-campos">
                        <!-- Campos superior -->
                        <div class="campos-formulario">
                            <label for="">Nome</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" value="<?= $dados['nome'] ?? 'Dados não encontrado.' ?>" readonly>

                            <label for="">Email</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" value="<?= $dados['email'] ?? 'Dados não encontrado.' ?>" readonly>

                            <label for="">Whatsapp</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" value="<?= $dados['whatsapp'] ?? 'Dados não encontrado.' ?>" readonly>

                            <label for="">CPF</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" value="<?= $dados['cpf'] ?? 'Dados não encontrado.' ?>" readonly>

                            <label for="">Cidade</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" value="<?= $dados['cidade'] ?? 'Dados não encontrado.' ?>" readonly>

                            <label for="">Instagram</label>
                            <a class="formulario-campo-informacao campo-link"
                            href="<?= htmlspecialchars($dados['instagram'] ?? 'https://www.letras.mus.br/palmeiras/397875/') ?>"
                            target="_blank">
                            <?= !empty($dados['instagram']) ? "Visitar Perfil" : "Perfil não encontrado"?>
                            </a>
                        </div>

                        <!-- Campos inferior -->
                        <div class="campos-formulario">
                            <label for="">Marca</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" value="<?= $dados['marca'] ?? 'Dados não encontrado.' ?>" readonly>

                            <label for="">Tipo</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" value="<?= $dados['tipo'] ?? 'Dados não encontrado.' ?>" readonly>

                            <label for="">Energia</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" value="<?= $dados['energia'] ?? 'Dados não encontrado.' ?>" readonly>

                            <label for="">Voltagem</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" value="<?= $dados['voltagem'] ?? 'Dados não encontrado.' ?>" readonly>

                            <label for="">Endereço</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" value="<?= $dados['endereco'] ?? 'Dados não encontrado.' ?>" readonly>

                            <label for="">Categoria</label>
                            <input type="text" name="" id="" class="formulario-campo-informacao" value="<?= $dados['categoria'] ?? 'Dados não encontrado.' ?>" readonly>
                            <a href="">Alterar Categoria</a>
                        </div>
                    </div>

                    <!-- Area dos botões -->
                    <div class="area-botoes-formulario">
                        <button type="button" class="botoes-formulario botao-recusar" id="botao_recusar">Recusar</button>
                        <button type="button" class="botoes-formulario botao-validar" id="botao_validar">Validar</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Modais - Recusar Expositor -->
    <!-- ------------------------------ -->
    <!-- modal 1 - recusar expositor -->
    <div class="modal modal-recusar-expositor-1" id="modal_recusar_expositor_1">
        <div class="modal-content-recusar-expositor">
            <h1 class="modal-texto-recusar-expositor">Deseja recusar o expositor?</h1>
            <div class="modal-botoes-recusar-expositor">
                <button class="botoes-modal-recusar-expositor botao-cancelar" id="botao_cancelar_recusar_expositor_1">Cancelar</button>
                <button class="botoes-modal-recusar-expositor botao-confirmar" id="botao_confirmar_recusar_expositor_1">Confirmar</button>
            </div>
        </div>
    </div>

    <!-- modal 2 - recusar expositor -->
    <div class="modal modal-recusar-expositor-2" id="modal_recusar_expositor_2">
        <div class="modal-content-recusar-expositor">
            <h1 class="modal-texto-recusar-expositor">Justifique o Motivo</h1>
            <form action="../Controller/Recusar_Usuario.php" method="post" class="motivo-recusar-formulario" id="formulario-recusar-expositor">
                <input type="hidden" name="id_usuario" value="<?= $dados['id_usuario'] ?>">
                <textarea name="textarea-modal-recusar-expositor" id="motivo_recusar_expositor" class="motivo-recusar-expositor" placeholder="Digite aqui o motivo"></textarea>

                <div class="modal-botoes-recusar-expositor">
                    <button type="button" class="botoes-modal-recusar-expositor botao-cancelar" id="botao_cancelar_recusar_expositor_2">Cancelar</button>
                    <button type="submit" name="recusar-expositor" class="botoes-modal-recusar-expositor botao-confirmar" id="botao_confirmar_recusar_expositor_2">Confirmar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- modal 3 - recusar expositor  -->
    <div class="modal modal-recusar-expositor-3" id="modal_recusar_expositor_3">
        <div class="modal-content-recusar-expositor">
            <h1 class="modal-texto-recusar-expositor">Expositor Recusado.</h1>
            <div class="modal-botoes-recusar-expositor">
                <button class="botoes-modal-recusar-expositor botao-ok" id="botao_ok_recusar">Ok</button>
            </div>
        </div>
    </div>

    <!-- Modais - Validar Expositor -->
    <!-- ----------------------------- -->
    <!-- modal 1 - validar expositor -->
    <div class="modal modal-validar-expositor-1" id="modal_validar_expositor_1">
        <div class="modal-content-validar-expositor">
            <h1 class="modal-texto-validar-expositor">Deseja validar o expositor?</h1>
            <div class="modal-botoes-validar-expositor">
                <button class="botoes-modal-validar-expositor botao-cancelar" id="botao_cancelar_validar_expositor_1">Cancelar</button>
                <button class="botoes-modal-validar-expositor botao-confirmar" id="botao_confirmar_validar_expositor_1">Confirmar</button>
            </div>
        </div>
    </div>

    <!-- modal 2 - validar expositor -->
    <div class="modal modal-validar-expositor-2" id="modal_validar_expositor_2">
        <div class="modal-content-validar-expositor">
            <h1 class="modal-texto-validar-expositor">Preencha as Informações</h1>
            <h2 class="modal-subtexto-validar-expositor">Informe numero da barraca e cor da rua em que o expositor ira atuar.</h2>
            <form action="../Controller/Validar_Usuario.php" method="post" id="formulario-informacoes-validar-expositor" class="area-informacoes-validar-expositor">
                <input type="hidden" name="id_usuario" value="<?= $dados['id_usuario'] ?>">
                <label for="">Numero da Barraca</label>
                <input type="text" name="numero_barraca" id="numero_barraca_expositor" class="campo-numero-barraca">

                <label for="">Cor da Rua</label>
                <select name="selecao-cores" id="selecionar-cor" class="campo-selecionar-cor">
                    <option value="amarela">Amarela</option>
                    <option value="laranja">Laranja</option>
                    <option value="roxa">Roxa</option>
                    <option value="verde">Verde</option>
                </select>

                <div class="modal-botoes-validar-expositor">
                    <button type="button" class="botoes-modal-validar-expositor botao-cancelar" id="botao_cancelar_validar_expositor_2">Cancelar</button>
                    <button type="submit" name="validar-expositor" class="botoes-modal-validar-expositor botao-confirmar" id="botao_confirmar_validar_expositor_2">Confirmar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- modal 3 - validar expositor  -->
    <div class="modal modal-validar-expositor-3" id="modal_validar_expositor_3">
        <div class="modal-content-validar-expositor">
            <h1 class="modal-texto-validar-expositor">Expositor Validado.</h1>
            <div class="modal-botoes-validar-expositor">
                <button class="botoes-modal-validar-expositor botao-ok" id="botao_ok_validar">Ok</button>
            </div>
        </div>
    </div>

    <div class="decoracoes">
        <img class="decoracao decoracao1" src="../../../Public/imgs/imgs-validar-expositor/decoracao1-validar-expositor.svg" alt="">
        <img class="decoracao decoracao2" src="../../../Public/imgs/imgs-validar-expositor/decoracao2-validar-expositor.svg" alt="">
        <img class="decoracao decoracao3" src="../../../Public/imgs/imgs-validar-expositor/decoracao3-validar-expositor.svg" alt="">
        <a href="../../../app/adm/Views/Area-Adm.php">
            <img class="decoracao botao-voltar" src="../../../Public/imgs/imgs-validar-expositor/botao-voltar-validar-expositor.svg" alt="">
        </a>
    </div>

    <script src="../../../Public/js/js-adm/modal-validar-expositor.js" deffer></script>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
</body>

</html>