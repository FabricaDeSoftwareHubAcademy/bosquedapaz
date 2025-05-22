<?php
require_once '../../app/adm/Controller/Gerenciar-Expositor.php';
$model = new Database;

if(isset($_POST['botao-recusar-expositor'])) {
    $id = $_POST['id_expositor'];

    $model->deletarExpositor($id);
    header('Location: ../../app/adm/Views/lista-de-espera.php');
    exit;
}
?>