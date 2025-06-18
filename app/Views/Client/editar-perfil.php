<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
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

            <form action="#" class="perfilEdit-form">

                <section class="perfilEdit-empresas">

                    <div class="perfilEdit-logo perfilEdit-important-input">

                        <label class="perfilEdit-logoEmpresa perfilEdit-important-label">Logo da empresa: </label>
                        <input type="file" name="foto" id="foto" class="perfilEdit-foto" required>
                        <label for="foto" class="perfilEdit-upload">
                            Selecione sua logo <i class="bi bi-upload perfilEdit-upload-label"></i>
                        </label>

                    </div>

                    <div class="perfilEdit-name perfilEdit-important-input">

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
                        <input type="text" name="instagram" class="perfilEdit-input-info" placeholder="Digite seu instagram">
                    </div>
                    <div>
                        <i class="fa-brands fa-square-whatsapp"></i>
                        <input type="text" name="whatsapp" class="perfilEdit-input-info" placeholder="(99) 99999-9999">
                    </div>

                    <div>
                        <i class="fa-brands fa-square-facebook"></i>
                        <input type="text" name="facebook" class="perfilEdit-input-info" placeholder="Digite seu facebook">
                    </div>
                    <div>
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" name="email" class="perfilEdit-input-info" placeholder="Digite seu e-mail">
                    </div>

                </section>

                <section class="perfilEdit-foto-info">
                    <label for="foto" class="perfilEdit-foto-info-label perfilEdit-important-label">Selecione fotos de seus produtos:</label>
                    <div class="perfilEdit-div-group">
                        <div class="perfilEdit-load-foto">
                            <input type="file" id="photo" name="foto" class="perfilEdit-input-foto">
                            <label for="photo" class="perfilEdit-upload-label-square">
                                Carregar Foto 1 <i class="bi bi-upload"></i>
                            </label>
                        </div>
                        <div class="perfilEdit-load-foto">
                            <input type="file" id="photo" name="foto" class="perfilEdit-input-foto">
                            <label for="photo" class="perfilEdit-upload-label-square">
                                Carregar Foto 2 <i class="bi bi-upload"></i>
                            </label>
                        </div>
                        <div class="perfilEdit-load-foto">
                            <input type="file" id="photo" name="foto" class="perfilEdit-input-foto">
                            <label for="photo" class="perfilEdit-upload-label-square">
                                Carregar Foto 3 <i class="bi bi-upload"></i>
                            </label>
                        </div>
                        <div class="perfilEdit-load-foto">
                            <input type="file" id="photo" name="foto" class="perfilEdit-input-foto">
                            <label for="photo" class="perfilEdit-upload-label-square">
                                Carregar Foto 4 <i class="bi bi-upload"></i>
                            </label>
                        </div>
                        <div class="perfilEdit-load-foto">
                            <input type="file" id="photo" name="foto" class="perfilEdit-input-foto">
                            <label for="photo" class="perfilEdit-upload-label-square">
                                Carregar Foto 5 <i class="bi bi-upload"></i>
                            </label>
                        </div>
                        <div class="perfilEdit-load-foto">
                            <input type="file" id="photo" name="foto" class="perfilEdit-input-foto">
                            <label for="photo" class="perfilEdit-upload-label-square">
                                Carregar Foto 6 <i class="bi bi-upload"></i>
                            </label>
                        </div>
                    </div>
                </section>

                <section class="perfilEdit-btns">
                    <button class="perfilEdit-btn-cancel perfilEdit-btn">Cancelar</button>
                    <button class="perfilEdit-btn-save perfilEdit-btn">Salvar</button>
                </section>
    
            </form>
            
            <a href="" class="perfilEdit-link-voltar"><img src="../../../Public/imgs/img-login/arrow-circle-left.svg" alt="" class="perfilEdit-img-voltar"></a>

        </div>
        
    </main>

    <img class="perfilEdit-superior-esquerda" src="../../../Public/imgs/img-listar-boletos/img-superior-esquerda.svg" alt="">
    <img class="perfilEdit-superior-direita" src="../../../Public/imgs/img-listar-boletos/img-superior-direita.svg" alt="">
    <img class="perfilEdit-inferior" src="../../../Public/imgs/img-listar-boletos/img-inferior-boleto.svg" alt="">
</body>

</html>