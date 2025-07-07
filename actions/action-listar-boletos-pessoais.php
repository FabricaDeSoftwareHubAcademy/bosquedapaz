<?php
require_once('../vendor/autoload.php');
use app\Controller\Boleto;

session_start();

if (!isset($_SESSION['login'])) {
    echo json_encode([]);
    exit;
}

$idPessoa = $_SESSION['login']['id_pessoa'];
// $idPessoa = 5;
$boletoObj = new Boleto();
$boletos = $boletoObj->CapturarBoletosPorUsuario($idPessoa);

echo json_encode($boletos);
