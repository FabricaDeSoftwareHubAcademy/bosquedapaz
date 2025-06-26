<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Adm - Bosque da Paz</title>

    <script src="../../../Public/js/js-adm/js-editar-adm.js" defer></script>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-editar-adm.css" />
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
    />
</head>
<body>
    <?php include "../../../Public/include/menu-adm.html" ?>
    <div class="sandwich-menu" onclick="mostrarMenu()">
        <img src="../../../Public/imgs/Proximos-Eventos-img/menu.png" alt="menu" class="menu" />
    </div>

    <main class="principal">
        <div class="box">
            <h2>Editar ADM</h2>

            <form id="formulario" method="post" enctype="multipart/form-data" novalidate>
                <div class="foto-container">
                    <!-- input file dentro do form -->
                    <input type="file" id="uploadFoto" name="imagem" accept="image/*" onchange="previewImagem()" />
                    <label for="uploadFoto">
                        <img id="previewFoto" src="../../../Public/assets/MOCA.png" alt="Foto do Administrador" />
                        <div class="icone-editar">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </label>
                </div>

                <input type="hidden" name="id" id="id" value="" />

                <div class="form-box">
                    <div id="form1">
                        <div class="input-container">
                            <div class="input-row">
                                <div class="input-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo" required />
                                </div>
                                <div class="input-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="tel" name="tel" id="telefone" placeholder="Digite o seu número de telefone" required pattern="\d{10,11}" title="Digite apenas números com DDD" />
                                </div>
                            </div>

                            <div class="input-row">
                                <div class="input-group">
                                    <label for="email">E-mail:</label>
                                    <input type="email" name="email" id="email" placeholder="Digite o seu e-mail" required />
                                </div>
                                <div class="input-group">
                                    <label for="cargo">Cargo:</label>
                                    <input type="text" name="cargo" id="cargo" placeholder="Digite o seu cargo" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btns">
                    <a href="Area-Adm.php" class="voltar">
                        <img src="../../../Public/assets/icons/voltar.png" alt="Botão de voltar" class="btn-voltar" />
                    </a>

                    <div class="btn-cancelar-salvar">
                        <button type="button" class="btn btn-cancelar">
                            <a href="./Area-Adm.php">Cancelar</a>
                        </button>

                        <button type="submit" class="btn btn-salvar" id="atualizar" name="atualizar" value="atualizar" >Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/assets/img-bolas/Elemento1.FolhaAzul.svg" alt="FolhaAzul" class="folhaAzul1-yan" />
        <img src="../../../Public/assets/img-bolas/Elemento2.FolhaAzul.svg" alt="FolhaAzul2" class="folhaAzul2-yan" />
        <img src="../../../Public/assets/img-bolas/bola-3.png" alt="FolhaRosa" class="folhaRosa-yan" />
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
</body>
</html>
