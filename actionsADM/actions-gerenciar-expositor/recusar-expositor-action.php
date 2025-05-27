<?php
require_once '../../app/adm/Controller/Gerenciar-Expositorr.php';
$expositor = new Expositor;

if(isset($_POST['botao-recusar-expositor'])) {
    $id = $_POST['id_expositor'];

    $expositor->DeletarExpositor($id);
    header('Location: ../../app/adm/Views/lista-de-espera.php');
    exit;
}
?>