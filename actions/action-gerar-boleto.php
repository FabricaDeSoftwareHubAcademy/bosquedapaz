<?php
session_start();
require_once('../vendor/autoload.php');

use app\Controller\Boleto;

$idPessoa = $_SESSION['login']['perfil'] ?? null;
$idBoleto = isset($_POST['id_boleto']) ? intval($_POST['id_boleto']) : 0;

if (!$idPessoa || $idBoleto <= 0) {
    die('Parâmetros inválidos ou usuário não autenticado.');
}

$boleto = new Boleto();
$dadosBoleto = $boleto->CapturarBoletoPorId($idPessoa, $idBoleto);

if (empty($dadosBoleto)) {
    die('Boleto não encontrado ou acesso não autorizado.');
}

$boletoInfo = $dadosBoleto[0];
$caminhoPDF = '../Public/uploads/uploads-boletos/' . $boletoInfo['pdf'];

if (!file_exists($caminhoPDF)) {
    die('Arquivo do boleto não encontrado.');
}

$nomeFinal = $boletoInfo['pdf'];

header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="' . $nomeFinal . '"');
readfile($caminhoPDF);
exit;
