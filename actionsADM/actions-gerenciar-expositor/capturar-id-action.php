<?php
// ver-expositor.php (Action)
require_once '../../app/adm/Controller/Gerenciar-Expositor.php';

$expositorModel = new Database();
$expositor = $expositorModel->listarPorId($_GET['id']);

// Inclui a sua view, que mostra o formulário HTML com os dados do expositor
include '../../app/adm/Views/tela-gerenciar-expositor.php';

?>