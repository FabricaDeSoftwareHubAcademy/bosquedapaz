<?php
require_once '../../app/adm/Controller/Gerenciar-Expositor.php';
$model = new Database;

if(isset($_POST['botao-validar-expositor'])) {
    $id = $_POST['id_expositor'];
    $nome = $_POST['nome_expositor'];
    $cpf = $_POST['cpf_expositor'];
    $marca = $_POST['marca_expositor'];
    $numero_barraca = $_POST['numero_barraca'];
    $cor_rua = $_POST['selecao-cores'];

    $model->validarExpositor($id, $numero_barraca, $cor_rua);
    header('Location: ../../app/adm/Views/lista-de-espera.php');
    exit;
}
?>