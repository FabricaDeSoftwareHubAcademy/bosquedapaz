<?php
require_once('../vendor/autoload.php');
use app\Controller\Evento;

$evento = new Evento();
$eventos = $evento->listar();

?>
