<?php
require_once("../../app/Models/Database.php");
require_once("../../app/Controller/Boleto.php");

header("Content-Type: application/json");

$status = $_POST["status"] ?? "";
$boletos = new Boleto();

if ($status === null) {
    $resultado = $boletos->ListarBoletos($nome = null);
} else {
    $resultado = $boletos->FiltrarPorStatus($status);
}

echo json_encode($resultado);
