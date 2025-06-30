<?php
require_once('../vendor/autoload.php');
use app\Controller\Expositor;

$obj = new Expositor();
$dados = $obj->buscar(null, null, 10);


header('Content-Type: application/json');
echo json_encode($dados);
