<?php
session_start();
require_once('../vendor/autoload.php');
require_once('../app/helpers/login.php');

if(!confirmaLogin(0)){
    die('Login Inválido');
}

use app\Controller\Boleto;
use app\Controller\Expositor;

$tokenLogin = obterLogin()['jwt'];
$id_login = $tokenLogin->sub;

$expositor = new Expositor();
$ex = $expositor->listar("id_login = '$id_login'");

if (empty($ex)) {
    die('Expositor não encontrado.');
}
var_dump($ex);
$id_pessoa = $ex[0]['id_pessoa'];

$idBoleto = isset($_POST['id_boleto']) ? intval($_POST['id_boleto']) : 0;

if ($idBoleto <= 0) {
    die('Parâmetros inválidos.');
}

$boleto = new Boleto();
$dadosBoleto = $boleto->CapturarBoletoPorId($id_pessoa, $idBoleto);

if (empty($dadosBoleto)) {
    die('Boleto não encontrado ou acesso não autorizado.');
}

$caminhoPDF = '../Public/uploads/uploads-boletos/' . $dadosBoleto[0]['pdf'];

if (!file_exists($caminhoPDF)) {
    die('Arquivo do boleto não encontrado.');
}

$nomePessoa = $dadosBoleto[0]['nome_pessoa'] ?? 'cliente';
$mesReferencia = $dadosBoleto[0]['mes_referencia'] ?? 'mes';
$vencimento = $dadosBoleto[0]['vencimento'] ?? 'data';

$nomeLimpo = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $nomePessoa)));
$mesLimpo = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $mesReferencia)));
$vencimentoLimpo = preg_replace('/[^0-9]/', '_', $vencimento);

$nomeFinal = "boleto_{$nomeLimpo}_{$mesLimpo}_{$vencimentoLimpo}.pdf";

header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="' . $nomeFinal . '"');
readfile($caminhoPDF);
exit;