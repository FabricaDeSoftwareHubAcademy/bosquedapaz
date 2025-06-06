<?php
require_once('../vendor/autoload.php');

use app\Controller\Lista_expositor;



$lista = new Lista_expositor();

$busca = isset($_GET['busca']) ? $_GET['busca'] : null;

$expositores = $lista->listar($busca);
?>