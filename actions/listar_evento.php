<?php
require_once '../Controller/Evento.php';

$evento = new Evento();
$eventos = $evento->listar();

?>
