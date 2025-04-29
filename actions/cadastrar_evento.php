<?php

// print_r($_POST)

require '../app/adm/Controller/Evento.php';
// //require './App/DB/Database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING) ? $_POST['nome']: "ERROR";
    
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING) ? $_POST['descricao']: "ERROR";

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ? $_POST['email']: "ERROR";
    
    $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT) ? $_POST['preco']: "ERROR";

    $promo = filter_input(INPUT_POST, 'promo', FILTER_VALIDATE_BOOLEAN) ? $_POST['promo']: "ERROR";


    // $descricao = '123';
    // $cor = '123';
    // $icone = '123';

    // verificando o ARRAY  $_FILES
    //print_r($_FILES);
    // $arquivo = $_FILES['foto'];
    // if ($arquivo['error']) die ("Falha ao enviar a foto");
    // $pasta = './uploads/fotos/';
    // $nome_foto = $arquivo['name'];
    // $novo_nome = uniqid();
    // $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));

    // if ($extensao != 'png' && $extensao != 'jpg') die ("Extensão do arquivo inválida");
    // $caminho = $pasta . $novo_nome . '.' . $extensao;
    // $foto = move_uploaded_file($arquivo['tmp_name'], $caminho);

    // echo $caminho;
    // echo "<br>".$foto;

    // print_r($nome_foto);
    // echo '<br>';
    // echo $novo_nome;
    // echo '<br>';
    // echo "EXTENSAO DO ARQUiVO: " .$extensao;

    $obj = new Produto();
    $obj->nome = $nome;
    $obj->descricao = $descricao;
    $obj->email = $email;
    $obj->tipo = $tipo;
    $obj->preco = $preco;
    $obj->promo = $promo;
    
    // $objColab->foto = $caminho;

    $res = $obj->cadastrar();
    if($res){

        echo '<script> FOI </script>';
        // $response = array("status" => "ok");

        // echo json_encode($response);
    }else{
        // $response = array("status" => "ERROR");

        // echo json_encode($response);
    }
}

// if(isset($_POST['buscar'])){

//     $objColab = new Colaborador(); 
//     $res = $objColab->buscar(); 
    // if($res){
    //     print_r($res);
    // }else{
    //     echo '<script> alert("Error!")</script>';
    // }
// }
?>