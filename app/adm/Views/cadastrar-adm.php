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
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-cadastrar-adm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Cadastrado ADM</title>
</head>
<body class="body_main">
    <?php include "../../../Public/assets/adm/menu-adm.html" ?>

    <div class="container_box">
        <div class="container_img">
            <img src="../../../Public/imgs/img-cadastro-adm/imagem-dec.svg" alt="">
            <div class="seta__voltar"><a href="Area-Adm.php"><img src="../../../Public/imgs/img-cadastro-adm/seta-cad.png" alt=""></a></div>
        </div>

        <div class="div__linha_decorativa"></div>

        <div class="container_form">
            <h1>Cadastro ADM</h1>
            
            <form class="form__cadastro" method="POST" enctype="multipart/form-data">

            <div class="form__">
                <label class="label-cad" for="nome">Nome</label>
                <div class="area-input">
                    <i class="bi bi-person"></i>
                    <input class="input" type="text" name="nome" id="nome" placeholder="Digite seu nome" required><br><br>
                </div>
            </div>



                <div class="form__actions">
                    <button type="submit" name="cadastrar" class="btn btn__rosa">Cancelar</button>
                    <button type="submit" name="cancelar" class="btn btn__azul">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="imgs__dec1"><img src="../../../Public/imgs/img-cadastro-adm/FormaCadastro-01.png" alt=""></div>
    <div class="imgs__dec2"><img src="../../../Public/imgs/img-cadastro-adm/FormaCadastro-03.svg" alt=""></div>
    <div class="imgs__dec3"><img src="../../../Public/imgs/img-cadastro-adm/FormaCadastro-04.svg" alt=""></div>
</body>
</html>