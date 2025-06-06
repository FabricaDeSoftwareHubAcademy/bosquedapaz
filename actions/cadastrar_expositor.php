<?php
require_once('../vendor/autoload.php');

use app\Controller\Expositor;
use app\Controller\Categoria;

if(isset($_GET['listar'])){
    
    $categoria = new Categoria();
    $opcoes = $categoria->listar();

    echo json_encode($opcoes);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expositor = new Expositor();

    $expositor->setNome($_POST['nome']);
    $expositor->setWhats($_POST['whatsapp']);
    $expositor->setEmail($_POST['email']);
    $expositor->setTelefone($_POST['whatsapp']);
    $expositor->setNome_marca($_POST['marca']);
    $expositor->setVoltagem($_POST['voltagem']);
    $expositor->setEnergia($_POST['energia']);
    $expositor->setContato2($_POST['whatsapp']);
    $expositor->setProduto($_POST['produto']);
    $expositor->setId_categoria($_POST['id_categoria']); /// SELECIONAR CATEGORIA DO BANCO


    if (isset($_FILES['files'])) {
        $expositor->setImagens($_FILES['files']);
    }

    $res = $expositor->cadastrar();

    if($res){
        echo json_encode( ['status' => 'ok', 'msg' => 'Expositor cadastrado com sucesso!'] );
    }else{
        echo json_encode( ['status' => 'erro', 'msg' => 'Erro ao cadastrar o expositor!'] );
    }
}

?>
