<?php 
require_once '../../../app/adm/Controller/Colaborador.php';

header('Content-Type: application/json; charset=utf-8');

$busca = isset($_GET['busca']) ? $_GET['busca'] : null;

$adm = new Colaborador();
$colaboradores = $adm->listar($busca);

echo json_encode($colaboradores);
exit;
?>