<?php

require_once('../vendor/autoload.php');

if(isset($_GET['id_utilidade_publica'])){

    $id = $_GET['id_utilidade_publica'];
    $obj = new UtilidadePublica();
    $util = $obj->buscar_por_id($id);
}


if(isset($_POST['editar'])){

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $imagem = $_POST['imagem'];
    
    $util->titulo = $titulo;
    $util->descricao = $descricao;
    $util->data_inicio = $data_inicio;
    $util->data_fim = $data_fim;
    $util->imagem = $imagem;

    //print_r($objColab);
    $res = $util->atualizar();
    if($res){
        echo '<script> alert("Cadastrado com sucesso!") </script>';
    }else{
        echo '<script> alert("Error!") </script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar de </h1>
    <form method="POST">
        <input type="text" id="titulo" name="titulo" value="<?=$util->titulo;?>" >
        <br>
        <input type="text" id="descricao" name="descricao" value="<?=$util->descricao;?>" >
        <br>
        <input type="date" id="data_inicio" name="data_inicio" value="<?=$util->data_inicio;?>" >
        <br>
        <input type="date" id="data_fim" name="data_fim" value="<?=$util->data_fim;?>" >
        <br>

        <input type="file" id="imagem" name="imagem">
        <br>
        
        <input type="submit" name="editar" value="Cadastrar">
    </form>
</body>
</html>