<?php
require_once '../Controller/Evento.php';

if (!isset($_GET['id'])) {
    die('ID do evento não especificado.');
}

$id = (int) $_GET['id'];

$evento = new Evento();
$eventoSelecionado = $evento->buscarPorId($id);

if (!$eventoSelecionado) {
    die('Evento não encontrado.');
}
?>