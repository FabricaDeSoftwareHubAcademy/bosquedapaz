<?php
session_start();
require_once('../vendor/autoload.php');
use app\Controller\Boleto;

$idBoleto = isset($_POST['id_boleto']) ? intval($_POST['id_boleto']) : 0;

if ($idBoleto <= 0) {
    die('Parâmetros inválidos.');
}

$boleto = new Boleto();
$dadosBoleto = $boleto->CapturarBoletoPorId($idPessoa, $idBoleto);

if (empty($dadosBoleto)) {
    die('Boleto não encontrado ou acesso não autorizado.');
}

$caminhoPDF = '../Public/uploads/uploads-boletos/' . $dadosBoleto[0]['pdf'];

if (!file_exists($caminhoPDF)) {
    die('Arquivo do boleto não encontrado.');
}

$nomePessoa = $dadosBoleto[0]['nome_pessoa'];
$mesReferencia = $dadosBoleto[0]['mes_referencia'];
$vencimento = $dadosBoleto[0]['vencimento'];

$nomeLimpo = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $nomePessoa)));
$mesLimpo = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $mesReferencia)));
$vencimentoLimpo = preg_replace('/[^0-9]/', '_', $vencimento);

$nomeFinal = "boleto_{$nomeLimpo}_{$mesLimpo}_{$vencimentoLimpo}.pdf";

header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="' . $nomeFinal . '"');
readfile($caminhoPDF);
exit;
?>
