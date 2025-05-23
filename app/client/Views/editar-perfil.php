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
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>

     <div class="perfilEdit-box">
        <h1 class="perfilEdit-title">Editar Perfil</h1>

        <form action="#" class="perfilEdit-form">

            <section class="perfilEdit-empresas">
                <div class="perfilEdit-logo">
                    <label for="foto" class="perfilEdit-logoEmpresa">Logo da empresa: </label>
                    <input type="file" name="foto" id="foto" class="perfilEdit-foto" required>
                </div>
                <div class="perfilEdit-name">
                    <label for="nome" class="perfilEdit-nameEmpresa">Nome da empresa: </label>
                    <input type="text" name="nome" id="nome" class="perfilEdit-nome" placeholder="Digite seu nome" required>
                </div>
            </section>

            <section class="perfilEdit-desc">
                <label class="perfilEdit-label-desc" for="descricao" >Sobre a Empresa: </label>
                <textarea name="descricao" id="descricao" class="perfilEdit-text-desc" placeholder="Digite uma breve descrição sobre sua empresa"></textarea>
            </section>
            
            <section class="perfilEdit-info">
                <div>
                    <i class="fa-brands fa-square-instagram"></i>
                    <input type="text" name="instagram" class="perfilEdit-input-info" placeholder="Digite seu instagram">
                </div>
                <div>
                    <i class="fa-brands fa-square-whatsapp"></i>
                    <input type="text" name="whatsapp" class="perfilEdit-input-info" placeholder="Digite seu whatsapp">
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
                <label for="foto" class="perfilEdit-foto-info-label">Selecione fotos de seus produtos:</label>
                <div class="perfilEdit-div-group">
                    <div class="perfilEdit-load-foto">
                        <i class="bi bi-upload"></i>
                        <input type="file" name="foto" class="perfilEdit-input-foto">
                        <p class="perfilEdit-p">Carregar foto 1</p>
                    </div>
                    <div class="perfilEdit-load-foto">
                        <i class="bi bi-upload"></i>
                        <input type="file" name="foto" class="perfilEdit-input-foto">
                        <p class="perfilEdit-p">Carregar foto 2</p>
                    </div>
                    <div class="perfilEdit-load-foto">
                        <i class="bi bi-upload"></i>
                        <input type="file" name="foto" class="perfilEdit-input-foto">
                        <p class="perfilEdit-p">Carregar foto 3</p>
                    </div>
                    <div class="perfilEdit-load-foto">
                        <i class="bi bi-upload"></i>
                        <input type="file" name="foto" class="perfilEdit-input-foto">
                        <p class="perfilEdit-p">Carregar foto 4</p>
                    </div>
                    <div class="perfilEdit-load-foto">
                        <i class="bi bi-upload"></i>
                        <input type="file" name="foto" class="perfilEdit-input-foto">
                        <p class="perfilEdit-p">Carregar foto 5</p>
                    </div>
                    <div class="perfilEdit-load-foto">
                        <i class="bi bi-upload"></i>
                        <input type="file" name="foto" class="perfilEdit-input-foto">
                        <p class="perfilEdit-p">Carregar foto 6</p>
                    </div>
                </div>
            </section>

            <section class="perfilEdit-btns">
                <button class="perfilEdit-btn-cancel perfilEdit-btn" >Cancelar</button>
                <button class="perfilEdit-btn-save perfilEdit-btn" >Salvar</button>
            </section>

        </form>

        <a href="" class="perfilEdit-link-voltar"><img src="../../../Public/imgs/img-login/arrow-circle-left.svg" alt="" class="perfilEdit-img-voltar"></a>

     </div>

    <img class="perfilEdit-superior-esquerda" src="../../../Public/imgs/img-listar-boletos/img-superior-esquerda.svg" alt="">
    <img class="perfilEdit-superior-direita" src="../../../Public/imgs/img-listar-boletos/img-superior-direita.svg" alt="">
    <img class="perfilEdit-inferior" src="../../../Public/imgs/img-listar-boletos/img-inferior-boleto.svg" alt="">
</body>
</html>