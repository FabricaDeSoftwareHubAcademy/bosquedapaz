<?php
require_once('../vendor/autoload.php');
use app\Controller\Boleto;

session_start();
$_SESSION['idPessoa'] = 5;

if (!isset($_SESSION['idPessoa'])) {
    echo json_encode([]);
    exit;
}

$idPessoa = $_SESSION['idPessoa'];
$boletoObj = new Boleto();
$boletos = $boletoObj->CapturarBoletosPorUsuario($idPessoa);

echo json_encode($boletos);
?>