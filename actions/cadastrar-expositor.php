<?php
require_once('../vendor/autoload.php');

use app\Controller\Expositor;
use app\Controller\Categoria;

$categoriaModel = new Categoria();


$lista = $categoriaModel->listar();

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
    $expositor->setId_categoria($_POST['id_categoria']);


    if (isset($_FILES['files'])) {
        $expositor->setImagens($_FILES['files']);
    }

    $res = $expositor->cadastrar();
    echo "cadastradp";
    exit;
}

?>
