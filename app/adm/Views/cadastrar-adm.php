<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-adm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <title>Adm - Bosque da Paz</title>
</head>
<body>
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>
    <section class="principal">
        <!-- Imagens de Decoração -->
        <div class="img1">
            <img src="../../../Public/imgs/img-cadastro-adm/FormaCadastro-01.png" alt="">
        </div>
        <div class="img2">
            <img src="../../../Public/imgs/img-cadastro-adm/FormaCadastro-03.svg" alt="">
        </div>
        <div class="img3">
            <img src="../../../Public/imgs/img-cadastro-adm/FormaCadastro-04.svg" alt="">
        </div>

        <!-- Box Principal -->
        <div class="box">
            <div id="linha-vertical"></div>
            <div class="setaV-cadastro">
                    <a href="../../../app/adm/Views/gerenciar-adm.php"><img src="../../../Public/imgs/imgs-lista-de-espera/seta-lispe.png" alt=""></a>
            </div>
            
            <!-- lado Esquerdo: area da imagem -->
            <div class="lado-esquerdo">
                <div class="area-img"><img src="../../../Public/imgs/img-cadastro-adm/a.svg" alt=""></div>
            </div>

            <!-- lado Esquerdo: area da Form -->
            <div class="lado-direito">
                <form action="" method="POST">
                    <div class="area-h1"><h1>Cadastro ADM</h1></div>

                    <div class="area-form">
                        <div class="area-total-input">
                            <label class="label-cad" for="nome">Nome</label>
                            <div class="area-input">
                                <i class="bi bi-person"></i>
                                <input class="input" type="text" name="nome" id="nome" placeholder="Digite seu nome" required><br><br>
                            </div>
                        </div>
                            
                        <div class="area-total-input">
                            <label class="label-cad" for="tel">Telefone</label>
                            <div class="area-input">
                                <i class="bi bi-telephone"></i>
                                <input class="input" type="tel" name="tel" id="tel" placeholder="Digite seu Telefone" required><br><br>
                            </div>

                        </div>
                        <div class="area-total-input">
                            <label class="label-cad" for="email">Email</label>
                            <div class="area-input">
                                <i class="bi bi-envelope"></i>
                                <input class="input" type="email" name="email" id="email" placeholder="Digite seu email" required><br><br>
                            </div>
                        </div>
                        <div class="area-total-input">
                            <label class="label-cad" for="profissao">Profissão</label>
                            <div class="area-input">
                                <i class="bi bi-briefcase"></i>
                                <input class="input" type="text" name="profissao" id="profissao" placeholder="Digite sua Profissão" required><br><br>
                            </div>
                        </div>
                        <div class="area-total-input">
                            <label class="label-cad" for="senha">Senha</label>
                            <div class="area-input">
                                <i class="bi bi-shield-lock"></i>
                                <input class="input" type="password" name="senha" id="senha" placeholder="Digite sua senha" required><br><br>
                                <i id="iconOlho" class="bi bi-eye-slash"></i>
                            </div>
                        </div>
                        <div class="area-total-input">
                            <label class="label-cad" for="confSenha">Confirmar Senha</label>
                            <div class="area-input">
                                <i class="bi bi-shield-lock"></i>
                                <input class="input" type="password" name="confSenha" id="confSenha" placeholder="Confirme sua senha" required><br>
                                <i id="iconOlho" class="bi bi-eye-slash"></i>
                            </div>
                        </div>
                        
                        <div class="area-total-input-2">
                            <label for="imagem" class="uploads">
                                <input type="file" name="imagem" id="imagem" class="img-input" multiple>
                            </label>
                        </div> 
                    </div>

                    <div class="area-button">
                        <button class="buttons">Cancelar</button>
                        <button class="buttons" id="button-azul">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>