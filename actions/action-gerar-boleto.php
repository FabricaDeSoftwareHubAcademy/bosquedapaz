<?php
session_start();
require_once('../vendor/autoload.php');
require_once('../app/helpers/login.php');

use app\Controller\Boleto;
use app\Controller\Expositor;

try {
    $tokenLogin = obterLogin()['jwt'] ?? null;
    if (!$tokenLogin) {
        throw new Exception('Acesso não autorizado.');
    }

    $id_login = $tokenLogin->sub;

    $expositor = new Expositor();
    $ex = $expositor->listar("id_login = :id_login", null, [':id_login' => $id_login]);

    if (empty($ex)) {
        throw new Exception('Expositor não encontrado.');
    }

    $id_pessoa = $ex[0]['id_pessoa'];

    $idBoleto = filter_input(INPUT_POST, 'id_boleto', FILTER_VALIDATE_INT);
    if (!$idBoleto) {
        throw new Exception('Parâmetros inválidos.');
    }

    $boleto = new Boleto();
    $dadosBoleto = $boleto->CapturarBoletoPorId($id_pessoa, $idBoleto);

    if (empty($dadosBoleto)) {
        throw new Exception('Boleto não encontrado ou acesso não autorizado.');
    }

    $caminhoPDF = '../Public/uploads/uploads-boletos/' . $dadosBoleto[0]['pdf'];
    if (!file_exists($caminhoPDF)) {
        throw new Exception('Arquivo do boleto não encontrado.');
    }

    // Sanitiza nome do arquivo
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

} catch (Exception $e) {
    // Log interno para debugging
    error_log("[" . date('Y-m-d H:i:s') . "] Erro ao baixar boleto: " . $e->getMessage());

    // Mensagem genérica para o usuário
    http_response_code(400);
    echo json_encode(['status' => 'error', 'mensagem' => 'Não foi possível processar o download do boleto.']);
    exit;
}