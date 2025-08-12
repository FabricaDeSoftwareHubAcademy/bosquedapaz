<?php
    $urlLogo = "../../Models/banco.sql";
include_once('../../helpers/csrf.php');
$tolken = getTolkenCsrf();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../Public/css/style-editar-perfil.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
</head>

<body class="perfilEdit-body">
    <?php include "../../../Public/include/menu-adm.html" ?>

    <main class="perfilEdit-main">

        <div class="perfilEdit-box">
            <h1 class="perfilEdit-title">Editar Perfil</h1>

            <form class="perfilEdit-form" id="perfilEdit_form" method="POST" enctype="multipart/form-data">

                <section class="perfilEdit-empresas">

                    <div class="perfilEdit-logo perfilEdit-important-input">

                        <label class="perfilEdit-logoEmpresa perfilEdit-important-label">Logo da empresa: </label>
                        <input type="file" name="foto" id="foto" class="perfilEdit-foto">
                        <label for="foto" id="logo" name="logo" class="perfilEdit-upload">
                            Selecione sua logo <img src="" alt="" id="icone-perfil" class="perfilEdit-icone"> <i class="bi bi-upload perfilEdit-upload-label"></i>
                        </label>

                    </div>

                    <div class="perfilEdit-name perfilEdit-important-input">
                        <input type="hidden" name="id_expositor" id="id_expositor">
                        <label for="nome" class="perfilEdit-nameEmpresa perfilEdit-important-label">Nome da empresa: </label>
                        <input type="text" name="nome" id="nome" class="perfilEdit-nome" placeholder="Digite seu nome" required>

                    </div>

                </section>

                <section class="perfilEdit-desc">
                    <label class="perfilEdit-label-desc perfilEdit-important-label" for="descricao">Sobre a Empresa: </label>
                    <textarea name="descricao" id="descricao" class="perfilEdit-text-desc" placeholder="Digite uma breve descrição sobre sua empresa"></textarea>
                </section>

                <section class="perfilEdit-info">

                    <div>
                        <i class="fa-brands fa-square-instagram"></i>
                        <input type="text" name="instagram" id="instagram" class="perfilEdit-input-info" placeholder="Digite seu instagram">
                    </div>
                    <div>
                        <i class="fa-brands fa-square-whatsapp"></i>
                        <input type="text" name="whatsapp" id="whatsapp" class="perfilEdit-input-info" placeholder="(99) 99999-9999" maxlength="15">
                    </div>

                    <div>
                        <i class="fa-brands fa-square-facebook"></i>
                        <input type="text" name="facebook" id="facebook" class="perfilEdit-input-info" placeholder="Digite seu facebook">
                    </div>
                    <div>
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" name="email" id="email" class="perfilEdit-input-info" placeholder="Digite seu e-mail">
                    </div>

                </section>

                <section class="perfilEdit-foto-info">
                    <label for="foto" class="perfilEdit-foto-info-label perfilEdit-important-label">Selecione novas fotos para seus produtos:</label>
                    <div class="perfilEdit-div-group">
                        <div class="perfilEdit-load-foto">
                            <input type="file" id="foto_produto_1" name="foto_produto_1" class="perfilEdit-input-foto">
                            <label for="foto_produto_1" id="prod-foto-1" class="perfilEdit-upload-label-square">
                                Carregar Foto 1 <i class="bi bi-upload"></i>
                            </label>
                            <img src="" alt="" id="perfilEdit-img-1" class="perfilEdit-img">
                        </div>
                        <div class="perfilEdit-load-foto">
                            <input type="file" id="foto_produto_2" name="foto_produto_2" class="perfilEdit-input-foto">
                            <label for="foto_produto_2" id="prod-foto-2" class="perfilEdit-upload-label-square">
                                Carregar Foto 2 <i class="bi bi-upload"></i>
                            </label>
                            <img src="" alt="" id="perfilEdit-img-2" class="perfilEdit-img">
                        </div>
                        <div class="perfilEdit-load-foto">
                            <input type="file" id="foto_produto_3" name="foto_produto_3" class="perfilEdit-input-foto">
                            <label for="foto_produto_3" id="prod-foto-3" class="perfilEdit-upload-label-square">
                                Carregar Foto 3 <i class="bi bi-upload"></i>
                            </label>
                            <img src="" alt="" id="perfilEdit-img-3" class="perfilEdit-img">
                        </div>
                        <div class="perfilEdit-load-foto">
                            <input type="file" id="foto_produto_4" name="foto_produto_4" class="perfilEdit-input-foto">
                            <label for="foto_produto_4" id="prod-foto-4" class="perfilEdit-upload-label-square">
                                Carregar Foto 4 <i class="bi bi-upload"></i>
                            </label>
                            <img src="" alt="" id="perfilEdit-img-4" class="perfilEdit-img">
                        </div>
                        <div class="perfilEdit-load-foto">
                            <input type="file" id="foto_produto_5" name="foto_produto_5" class="perfilEdit-input-foto">
                            <label for="foto_produto_5" id="prod-foto-5" class="perfilEdit-upload-label-square">
                                Carregar Foto 5 <i class="bi bi-upload"></i>
                            </label>
                            <img src="" alt="" id="perfilEdit-img-5" class="perfilEdit-img">
                        </div>
                        <div class="perfilEdit-load-foto">
                            <input type="file" id="foto_produto_6" name="foto_produto_6" class="perfilEdit-input-foto">
                            <label for="foto_produto_6" id="prod-foto-6" class="perfilEdit-upload-label-square">
                                Carregar Foto 6 <i class="bi bi-upload"></i>
                            </label>
                            <img src="" alt="" id="perfilEdit-img-6" class="perfilEdit-img">
                        </div>
                    </div>
                </section>

                <?php echo $tolken; ?>

                <section class="perfilEdit-btns">
                    <button class="perfilEdit-btn-cancel perfilEdit-btn">Cancelar</button>
                    <button id="btn_salvar" data-modal="perfilEdit-salvar" name="edit_expo" class="perfilEdit-btn-save perfilEdit-btn">Salvar</button>
                </section>
    
            </form>
            
            <a href="" class="perfilEdit-link-voltar"><img src="../../../Public/assets/icons/voltar.svg" alt="" class="perfilEdit-img-voltar"></a>

            <?php include '../../../Public/include/modais/modal-sucesso.html'; ?>

        </div>
        
    </main>

    <img class="perfilEdit-superior-esquerda" src="../../../Public/assets/img-bolas/img-superior-esquerda.svg" alt="">
    <img class="perfilEdit-superior-direita" src="../../../Public/assets/img-bolas/img-superior-direita.svg" alt="">
    <img class="perfilEdit-inferior" src="../../../Public/assets/img-bolas/img-inferior-boleto.svg" alt="">
    <script src="../../../Public/js/js-adm/js-editar-expositor.js"></script>
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
</body>

</html>