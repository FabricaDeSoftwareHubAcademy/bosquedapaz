<?php require_once __DIR__ . '/../../../app/helpers/auth.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" />
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-editar-adm.css" />
    <link rel="stylesheet" href="../../../Public/css/css-modais/style-modal-sucesso.css">
    <link rel="stylesheet" href="../../../Public/css/css-modais/style-modal-confirmar.css">
    <link rel="stylesheet" href="../../../Public/css/css-modais/style-modal-confirmar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <title>Adm - Bosque da Paz</title>
</head>
<body>
    <?php include "../../../Public/include/menu-adm.html"; ?>
    <?php include '../../../Public/include/modais/modal-confirmar.html'; include '../../../Public/include/modais/modal-sucesso.html'; ?>

    <main>
        <section class="container_box">
            <!-- Imagem decorativa -->
            <div class="left-side">
                <img src="../../../Public/assets/imagem-dec-editar.svg" alt="">
            </div>

            <div class="div__linha_decorativa"></div>

            <!-- Formulário -->
            <div class="right-side">
                <div class="seta__voltar2"><a href="Area-Adm.php"><img src="../../../Public/assets/icons/voltar.png" alt=""></a></div>
                
                <h1>Editar ADM</h1>

                <form id="formulario" method="post" enctype="multipart/form-data" novalidate class="form__cadastro">
                    <!-- ID oculto -->
                    <input type="hidden" name="id" id="id" value="" />

                    <!-- Imagem de Perfil -->
                    <div class="form__group">
                        <label class="label__cad" for="uploadFoto"></label>
                        <div class="foto__container">
                            <input class="input2" type="file" name="imagem" id="uploadFoto" accept="image/*" onchange="previewImagem()" hidden>
                            <label for="uploadFoto" class="foto__upload">
                                <img id="previewFoto" src="../../../Public/assets/icons/user-default.png" alt="Foto do Administrador" />
                                <div class="icone-editar">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Nome -->
                    <div class="form__group">
                        <label class="label__cad" for="nome">Nome</label>
                        <div class="area__input">
                            <i class="bi bi-person"></i>
                            <input class="input" type="text" name="nome" id="nome" placeholder="Digite seu nome completo" required>
                        </div>
                    </div>

                    <!-- Telefone -->
                    <div class="form__group">
                        <label class="label__cad" for="telefone">Telefone</label>
                        <div class="area__input">
                            <i class="bi bi-telephone"></i>
                            <input class="input" type="tel" name="tel" id="telefone" placeholder="Digite o seu número de telefone" required pattern="\d{10,11}" title="Digite apenas números com DDD">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form__group">
                        <label class="label__cad" for="email">E-mail</label>
                        <div class="area__input">
                            <i class="bi bi-envelope"></i>
                            <input class="input" type="email" name="email" id="email" placeholder="Digite o seu e-mail" required>
                        </div>
                    </div>

                    <!-- Cargo -->
                    <div class="form__group">
                        <label class="label__cad" for="cargo">Cargo</label>
                        <div class="area__input">
                            <i class="bi bi-briefcase"></i>
                            <input class="input" type="text" name="cargo" id="cargo" placeholder="Digite seu cargo" required>
                        </div>
                    </div>

                    <!-- Botões -->
                    <div class="form__actions">
                        <button type="button" class="btn btn__rosa">Cancelar</button>
                        <button type="submit" class="btn btn__azul">Salvar</button>
                    </div>
                </form>
            </div>

            <!-- Seta voltar1 -->
            <div class="seta__voltar1"><a href="Area-Adm.php"><img src="../../../Public/assets/icons/voltar.png" alt=""></a></div>
        </section>

        <!-- Imagens decorativas -->
        <div class="imgs__dec1"><img src="../../../Public/assets/img-bolas/bola-1.png" alt=""></div>
        <div class="imgs__dec2"><img src="../../../Public/assets/img-bolas/bola-2.png" alt=""></div>
        <div class="imgs__dec3"><img src="../../../Public/assets/img-bolas/bola-3.png" alt=""></div>
    </main>

    <!-- Modal:  -->
    <dialog id="modal-mensagem" class="modal-loading">
        <div class="content-close">
            <i class="bi bi-x-square-fill fechar-modal-loading" id="close-modal-mensagem"></i>
        </div>
        <div class="content-modal">
            <i class="bi bi-exclamation-circle meta-quest" style="color:#FF3877; font-size:4rem;"></i>
            <div class="content-text">
                <h2 class="loading-text" id="modal-title">Erro</h2>
                <p class="msm-modal" id="modal-message">Mensagem de erro</p>
            </div>
        </div>
        <div class="content-btns">
            <button class="btn-modal-confirmar" id="btn-modal-fechar" style="background-color:#FF3877;">Fechar</button>
        </div>
    </dialog>

    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/js-editar-adm.js" defer></script>
</body>
</html>
