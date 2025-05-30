<?php
require_once('../vendor/autoload.php');
use app\Controller\Evento;

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