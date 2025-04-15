<?php
require "../App/Entity/Categoria.php";
//require './App/DB/Database.php';


$descricao = $_POST['descricao'];
$cor = $_POST['cor'];
// $icone = $_POST['icone'];
$arquivo = $_FILES['icone'];
// print_r($arquivo);

if ($arquivo['error']) die("Falha ao enviar arquivo");

$pasta = './uploads/fotos/';
$nome_foto = $arquivo['name'];
$novo_nome = uniqid();
$extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));

if ($extensao != 'png' && $extensao != 'jpg' && $extensao != 'jfif') die("Extensão do arquivo invalida");

$caminho = $pasta . $novo_nome . '.' . $extensao;
echo $caminho;

$foto = move_uploaded_file($arquivo['tmp_name'], $caminho);


// print_r($nome_foto);
// echo "<br>";
// echo $novo_nome;
// echo '<br>';
// echo 'Extensao arquivo ' . $extensao;

$cat = new Categoria();
$cat->descricao = $descricao;
$cat->cor = $cor;
$cat->icone = $caminho;

$res = $cat->cadastrar();


$res = $objColab->cadastrar();
if ($res) {
    $response = array('status' => 'OK');
    echo json_encode($response);
} else {
    $response = array('status' => 'Error');
    echo json_encode($response);
}
