<?php require_once '../../../actions/buscar_evento.php'; ?>
<?php require_once '../../../actions/editar_evento.php'; ?>

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
            <h2>EDITAR EVENTO</h2>
            <div class="form-box">
                <form action="#" method="POST" action="../../../actions/atualizar_evento.php" method="POST" enctype="multipart/form-data">
                    
                    <div id="form1">

                        <input type="hidden" name="id_evento" value="<?= $eventoSelecionado->getId() ?>">
                    
                        <div class="input-group">
                            <label>Nome:</label>
                            <input type="text" name="nomedoevento" id="nomedoevento"  value="<?= htmlspecialchars($eventoSelecionado->getNome()) ?>" placeholder="Digite o nome do evento"
                                required>
                        </div>
                        <div class="input-group">
                            <label>Descrição:</label>
                            <textarea name="descricao" rows= "5" cols= "40"><?= htmlspecialchars($eventoSelecionado->getDescricao()) ?> </textarea>
                        </div>
                        <div class="data-imagem">
                            <div class="input-group">
                                <label>Data:</label>
                                <input type="date" id="data-inicio" name="data-inicio" value="<?= $eventoSelecionado->getData() ?>" required>
                            </div>
                            <select name="status">
                                <option value="1" <?= $eventoSelecionado->getStatus() ? 'selected' : '' ?>>Ativo</option>
                                <option value="0" <?= !$eventoSelecionado->getStatus() ? 'selected' : '' ?>>Inativo</option>
                            </select>
                            <div class="input-group">
                                <label>Imagem:</label>
                                <input type="file" name="file" id="file"
                                    required>
                            </div>
                        </div>
                        <img src="../../../Public/uploads/banners/<?= $eventoSelecionado->getBanner() ?>" alt="Banner do Evento">
                    </div>
                    <div class="btn-cancelar-salvar">
                    <button class="btn btn-cancelar">
                        <a href="./Area-Adm.php">Cancelar</a>
                    </button>

                    <button type="submit" class="btn btn-salvar">
                        <a href="">Salvar</a>
                </div>

                </form>

            </div>
            <div class="btns">
                <a href="gerenciar-eventos.php" class="voltar">
                    <img src="../../../Public/imgs/img-area-contate/seta-voltar.png" alt="Botão de voltar" class="btn-voltar">
                </a>

                
            </div>
        </div>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola-verde2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola-rosa.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/preview-img.js" defer></script>
</body>

</html>