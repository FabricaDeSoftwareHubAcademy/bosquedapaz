<?php
require_once '../Controller/Evento.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $evento = new Evento();

    $evento->setNome($_POST['nomedoevento']);
    $evento->setDescricao($_POST['descricaodoevento']);
    $evento->setData($_POST['dataevento']); // corrigido para bater com o campo no HTML

    // Upload do banner
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $nome_arquivo = $_FILES['file']['name'];
        $caminho_temp = $_FILES['file']['tmp_name'];
        $destino = '../../../Public/uploads/' . $nome_arquivo;

        // Cria o diretório, se não existir
        if (!is_dir('../../../Public/uploads/')) {
            mkdir('../../../Public/uploads/', 0755, true);
        }

        if (move_uploaded_file($caminho_temp, $destino)) {
            $evento->setBanner($destino);
        } else {
            echo "<script>alert('Erro ao salvar o arquivo.');</script>";
            exit;
        }
    } else {
        echo "<script>alert('Erro no upload do banner.');</script>";
        exit;
    }

    $res = $evento->cadastrar();

    if ($res) {
        echo '<script>alert("Evento cadastrado com sucesso!"); window.location.href="Area-Adm.php";</script>';
    } else {
        echo '<script>alert("Erro ao cadastrar evento.");</script>';
    }

    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-evento.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">

</head>

<body>
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>


    <main class="principal">
        <div class="box">
            <h1>CADASTRO DE EVENTO</h1>
            <div class="form-box">
                <form method="POST" enctype="multipart/form-data">
                    <div id="form1">
                        <div class="input-group">
                            <label>Nome:</label>
                            <input type="text" name="nomedoevento" id="nomedoevento" placeholder="Digite o nome do evento"
                                required>
                        </div>
                        <div class="input-group">
                            <label>Descrição:</label>
                            <textarea name="descricaodoevento" id="descricaodoevento" placeholder="Digite uma breve descrição do evento" required cols="30" rows="5" style="resize: none"></textarea>
                        </div>
                        <div class="data-imagem">
                            <div class="input-group">
                                <label>Data:</label>
                                <input type="date" id="dataevento" name="dataevento">
                            </div>
                            <div class="input-group">
                                <label>Imagem:</label>
                                <input type="file" name="file" id="file"
                                    required>
                            </div>
                        </div>
                        <img class="preview" src="" alt="" id="preview-image">
                    </div>

                </form>

            </div>
            <div class="btns">
                <a href="gerenciar-eventos.php" class="voltar">
                    <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>

                <div class="btn-cancelar-salvar">
                    <button class="btn btn-cancelar">
                        <a href="./Area-Adm.php">Cancelar</a>
                    </button>

                    <button type="submit" class="btn btn-salvar">Salvar</button>
                        
                </div>
            </div>
        </div>
        </div>

        <dialog id="modal-deleta" class="modal-deleta">
          <div class="acao-recusar">
            <div class="acao-content-recusar">
                <h1 class="acao-texto-recusar">Salvo com sucesso</h1>
                <div class="acao-botoes-recusar">
                  <!-- <button class="close-modal" data-modal="modal-deleta">cancelar</button> -->
                  <button class="close-modal" data-modal="modal-deleta">confirmar</button>
                </div>
            </div>
          </div>
        </dialog>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/preview-img.js" defer></script>
    <!-- <script src="../../../Public/js/js-modais/js-abrir-modal.js" defer></script> -->
</body>

</html>