<?php
require_once '../../app/adm/Controller/Gerenciar-Expositorr.php';
$expositor = new Expositor;

if(isset($_POST['botao-validar-expositor'])) {
    $expositor->id_expositor = $_POST['id_expositor'];
    $expositor->nome = $_POST['nome_expositor'];
    $expositor->email = $_POST['email_expositor'];
    $expositor->whatsapp = $_POST['whatsapp_expositor'];
    $expositor->cpf = $_POST['cpf_expositor'];
    $expositor->marca = $_POST['marca_expositor'];
    $expositor->numero_barraca = $_POST['numero_barraca'];
    $expositor->cor_rua = $_POST['selecao-cores'];

    $expositor->validarExpositor($expositor->id_expositor, $expositor->numero_barraca, $expositor->cor_rua);
    header('Location: ../../app/adm/Views/lista-de-espera.php');
    exit;
}
?>