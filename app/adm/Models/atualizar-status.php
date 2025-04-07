<?php
require_once '../../../app/adm/Controller/Boleto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_expositor'] ?? null;
    $situacaoAtual = $_POST['situacao'] ?? null;

    if ($id && $situacaoAtual) {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=banco_expositor", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $boleto = new Boleto($pdo);

            $novaSituacao = $situacaoAtual === 'pago' ? 'pendente' : 'pago';
            $sucesso = $boleto->atualizarSituacao($id, $novaSituacao);

            echo json_encode([
                'success' => $sucesso,
                'novaSituacao' => $novaSituacao
            ]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'erro' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'erro' => 'Dados inválidos']);
    }
}
