<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/css-adm/style-cadastro-adm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <title>Cadastro</title>
</head>
<body>
    <main>
        <!-- /* Section da tela */ -->
        <section class="section-cadastro-mt">

            <!-- /* Formas da tela */ -->
            <div class="formaCadastro-1">
                <img src="../../imgs/img-cadastro-adm/FormaCadastro-01.png" alt="">
            </div>
            <div class="formaCadastro-2">
                <img src="../../imgs/img-cadastro-adm/FormaCadastro-02.png" alt="">
            </div>
            <div class="formaCadastro-3">
                <img src="../../imgs/img-cadastro-adm/FormaCadastro-03.png" alt="">
            </div>
            <div class="formaCadastro-4">
                <img src="../../imgs/img-cadastro-adm/FormaCadastro-04.png" alt="">
            </div>
            
            <!-- /* Box */ -->
            <div class="box-cadastro-mt">       
                <div id="linha-vertical"></div>

                <!-- /* Elementos da box - Form */ -->
                <div class="area-total-Form-Cad-mt">
                    <p>Possui uma Conta? <a href="#">Acesse aqui!</a></p>
                    <h1 class="titulo-areato-mt">Cadastro</h1>
                    
                    <div class="areaForm-cad-mt">
                        <form action="#" method="POST">

                            <label class="label-cad-mt" for="nome">Nome</label>
                            <div class="area-input-mat">
                                <i class="bi bi-person"></i>
                                <input class="input-cad-mt" type="text" name="nome" id="nome" placeholder="Digite seu nome" required><br><br>
                            </div>
                            
                            <label class="label-cad-mt" for="email">Email</label>
                            <div class="area-input-mat">
                                <i class="bi bi-envelope"></i>
                                <input class="input-cad-mt" type="email" name="email" id="email" placeholder="Digite seu email" required><br><br>
                            </div>
                            
                            <label class="label-cad-mt" for="cpf">CPF</label>
                            <div class="area-input-mat">
                                <i class="fa-regular fa-address-card"></i>
                                <input class="input-cad-mt" type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" required><br><br>
                            </div>
                            
                            <label class="label-cad-mt" for="data_nascimento">Data de Nascimento</label>
                            <div class="area-input-mat">
                                <i class="bi bi-calendar"></i>
                                <input class="input-cad-mt" type="date" name="data_nascimento" id="data_nascimento" required><br><br>
                            </div>
                            
                            <label class="label-cad-mt" for="senha">Senha</label>
                            <div class="area-input-mat">
                                <i class="bi bi-shield-lock"></i>
                                <input class="input-cad-mt" type="password" name="senha" id="senha" placeholder="Digite sua senha" required><br><br>
                            </div>
                            
                            <label class="label-cad-mt" for="confSenha">Confirmar Senha</label>
                            <div class="area-input-mat">
                                <i class="bi bi-shield-lock"></i>
                                <input class="input-cad-mt" class="label-cad-mt" type="password" name="confSenha" id="confSenha" placeholder="Confirme sua senha" required><br>
                            </div>
                            
                        </form>
                        
                        <button class="button-cad-mt">Cancelar</button>
                        <button class="button-cad-mt" id="b-2-mt">Cadastre-se</button>
                    </div>
                    
                </div>
                
                <!-- /* Elementos da box - img */ -->
                <div class="areaImg-cad-mt">
                    <h1 class="h1-mt">CADASTRO</h1>
                    <div class="divIMg-mt">
                        <h1 class="h12-mt">CADASTRO</h1>
                        <img src="../../imgs/img-cadastro-adm/a.svg" alt="">
                    </div>
                </div>
            </div>

        </section>
    </main>
</body>
</html>