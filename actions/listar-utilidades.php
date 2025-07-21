<?php
require_once('../vendor/autoload.php');
use app\Controller\UtilidadePublica;

$util = new UtilidadePublica();
$utilidades = $util->listar();

echo json_encode($utilidades);
?>