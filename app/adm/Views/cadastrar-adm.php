<?php 

require '../../../app/adm/Controller/Colaborador.php';

if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['tel'];
    $cargo = $_POST['cargo'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['confSenha'];

    $arquivo = $_FILES['imagem'];
    if ($arquivo['error']) die ("Falha ao enviar a foto");
    $pasta = '../../../Public/imgs/imgs-fotos-cadastro-adm/';
    $nome_foto = $arquivo['name'];
    $novo_nome = uniqid();
    $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));

    if ($extensao != 'png' && $extensao != 'jpg') die ("Extensão do arquivo inválida");
    $caminho = $pasta . $novo_nome . '.' . $extensao;
    $foto = move_uploaded_file($arquivo['tmp_name'], $caminho);

    if (!$foto) {
        die("Falha ao mover o arquivo para o diretório.");
    }

    if ($senha !== $confSenha){
        echo '<script> alert("As senhas não coincidem!"); window.history.back(); </script>';
        exit;
    }

    $senhaHash = password_hash($senha,  PASSWORD_DEFAULT);

    $objColab = new Colaborador();
    $objColab->nome = $nome;
    $objColab->email = $email;
    $objColab->telefone = $telefone;
    $objColab->cargo = $cargo;
    $objColab->senha = $senhaHash;
    $objColab->imagem = $caminho;

    $res = $objColab->cadastrar();
    if($res){
        echo '<script> alert("Cadastrado com sucesso!"); window.location.href = "../../../app/adm/Views/cadastrar-adm.php"; </script>';
    } else {
        echo '<script> alert("Erro ao cadastrar!"); </script>';
    }

}

?>

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
                <a href="../../../app/adm/Views/Area-Adm.php"><img src="../../../Public/imgs/imgs-lista-de-espera/seta-lispe.png" alt=""></a>
            </div>
            
            <!-- lado Esquerdo: area da imagem -->
            <div class="lado-esquerdo">
                <div class="area-img"><img src="../../../Public/imgs/img-cadastro-adm/a.svg" alt=""></div>
            </div>

            <!-- lado Esquerdo: area da Form -->
            <div class="lado-direito">
                <form action="" method="POST" enctype="multipart/form-data">
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
                            <label class="label-cad" for="cargo">Cargo</label>
                            <div class="area-input">
                                <i class="bi bi-briefcase"></i>
                                <input class="input" type="text" name="cargo" id="cargo" placeholder="Digite seu Cargo" required><br><br>
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
                        
                        <div class="area-total-input">
                            <label class="label-cad" for="confSenha">Imagem de Perfil</label>
                            <div class="area-input2">
                                <label for="imagem" class="uploads">
                                    <input type="file" name="imagem" id="imagem" class="input2">
                                </label>
                            </div> 
                        </div>
                    </div>
                    
                    <div class="area-button">
                        <button class="buttons">Cancelar</button>
                        <button class="buttons" id="button-azul" name="cadastrar" value="Cadastrar">Cadastrar</button>
                    </div>
                        
                </form>
            </div>
        </div>
    </section>
</body>
</html>