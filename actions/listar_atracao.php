<?php
require_once('../vendor/autoload.php');
use app\Controller\Atracao; 

$id_evento = isset($_GET['id_evento']) ? (int) $_GET['id_evento'] : 0;

    if ($id_evento <= 0) {
        echo "<p>Evento não encontrado.</p>";
        exit;
    }

$atracao = new Atracao();
$atracoes = $atracao->listar("id_evento = {$id_evento}");