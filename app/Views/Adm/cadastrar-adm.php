<?php 
include_once('../../helpers/csrf.php');
$tolken = getTolkenCsrf();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-adm.css">
    <link rel="stylesheet" href="../../../Public/css/css-modais/style-modal-confirmar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Adm - Bosque da Paz</title>
</head>
<!-- Corpo da Página -->
<body>
    <!-- Includ Menu -->
    <?php include "../../../Public/include/menu-adm.html" ?>

    <main>
        <section class="container_box">
            <!-- Area Esquerda: Imagem -->
            <div class="left-side">
                <img src="../../../Public/assets/imagem-dec-cadastro.svg" alt="">
            </div>
           
            <!-- Linha Decorativa do Centro -->
            <div class="div__linha_decorativa"></div>
            
            <!-- Area Direita: Form -->
            <div class="right-side">
                <!-- Seta Voltar 2  -->
                <div class="seta__voltar2"><a href="Area-Adm.php"><img src="../../../Public/assets/icons/voltar.png" alt=""></a></div>
                
                <!-- Titulo   -->
                <h1>Cadastro ADM</h1>
                
                <!-- Form -->
                <form class="form__cadastro" id="formCadastro" method="POST" enctype="multipart/form-data">
                    <!-- Nome -->
                    <div class="form__group">
                        <label class="label__cad" for="nome">Nome</label>
                        <div class="area__input">
                            <i id="icon" class="bi bi-person"></i>
                            <input class="input" type="text" name="nome" id="nome" placeholder="Digite seu nome" required>
                        </div>
                    </div>

                    <!-- Telefone -->
                    <div class="form__group">
                        <label class="label__cad" for="tel">Telefone</label>
                        <div class="area__input">
                            <i id="icon" class="bi bi-telephone"></i>
                            <input class="input" type="tel" name="tel" id="tel" placeholder="Digite seu telefone" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form__group">
                        <label class="label__cad" for="email">Email</label>
                        <div class="area__input">
                            <i id="icon" class="bi bi-envelope"></i>
                            <input class="input" type="email" name="email" id="email" placeholder="Digite seu email" required>
                        </div>
                    </div>

                    
                    <!-- Cargo -->
                    <div class="form__group">
                        <label class="label__cad" for="cargo">Cargo</label>
                        <div class="area__input">
                            <i id="iconn" class="bi bi-briefcase"></i>
                            <input class="input" type="text" name="cargo" id="cargo" placeholder="Digite seu cargo" required>
                        </div>
                    </div>

                    <!-- Imagem de Perfil -->
                    <div class="form__group">
                        <label class="label__cad" for="imagem">Imagem de Perfil</label>
                        <div class="area__input2">
                            <label for="imagem" class="uploads">
                                <input class="input2" type="file" name="imagem" id="imagem" accept="image/*">
                            </label>
                            <img src="" class="img_preview" id="img_preview" alt="">
                        </div>
                    </div>      
                
                    <!-- Senha e Confirmar Senha -->
                    <div class="form__group senha__linha">
                        <!-- Senha -->
                        <div class="senha__coluna">
                            <label class="label__cad" for="senha">Senha</label>
                            <div class="area__input">
                                <i class="bi bi-shield-lock"></i>
                                <input class="input" type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                            </div>
                        </div>

                        <!-- Confirmar Senha -->
                        <div class="senha__coluna">
                            <label class="label__cad" for="confSenha">Confirmar Senha</label>
                            <div class="area__input">
                                <i class="bi bi-shield-lock"></i>
                                <input class="input" type="password" name="confSenha" id="confSenha" placeholder="Confirme sua senha" required>
                                <i class="fa-solid fa-eye olho_pass" id="togglePassword"></i>
                            </div>
                        </div>
                    </div>
                    <?php echo $tolken; ?>

                    <!-- Botões -->
                    <div class="form__actions">
                        <button type="button" name="cancelar" id="cancelar_cadastro" class="btn btn__rosa">Cancelar</button>
                        <button type="submit" name="cadastrar" value="cadastrar" class="btn btn__azul">Cadastrar</button>
                    </div>
                </form>
            </div> 
            
            <!-- Seta Voltar 1  -->
            <div class="seta__voltar1"><a href="./"><img src="../../../Public/assets/icons/voltar.png" alt=""></a></div>
        </section>
        
        <!-- Imagens Decorativas -->
        <div class="imgs__dec1"><img src="../../../Public/assets/img-bolas/imagem-superior-esquerdo.svg"  alt=""></div>
        <div class="imgs__dec2"><img src="../../../Public/assets/img-bolas/imagem-superior-direito.svg"  alt=""></div>
        <div class="imgs__dec3"><img src="../../../Public/assets/img-bolas/imagem-inferior-direito.svg" alt=""></div>
    </main>

    <!-- Modal:  -->
    <dialog id="modal-mensagem" class="modal-loading">
        <div class="content-close">
            <i class="bi bi-x-square-fill fechar-modal-loading" id="close-modal-mensagem"></i>
        </div>
        <div class="content-modal">
            <i id="modal-icon" class="bi bi-info-circle" style="font-size: 4rem;"></i>
            <div class="content-text">
                <h2 class="loading-text" id="modal-title"></h2>
                <p class="msm-modal" id="modal-message"></p>
            </div>
        </div>
        <div class="content-btns">
            <button class="btn-modal-confirmar" id="btn-modal-fechar">Fechar</button>
        </div>
    </dialog>


    <!-- Scripts:  -->
    <script src="../../../Public/js/js-menu/js-menu.js"></script>
    <script src="../../../Public/js/js-adm/js-cadastrar-adm.js"></script>
    <script src="../../../Public/js/js-modais/modal-adm-mensagens.js"></script>
    <script src="../../../Public/js/js-adm/varifica_login_adm.js"></script>
</body>
</html>

<!-- Matheus Manja -->