<?php
header("Content-Type: application/json");
require_once('../vendor/autoload.php');

use app\Controller\Parceiro;

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo json_encode(["erro" => "ID do parceiro não foi fornecido."]);
    exit;
}

$id = intval($_GET['id']);

try {
    $parceiro = new Parceiro();
    $dados = $parceiro->ObterParceiro($id);

    if (!$dados) {
        echo json_encode(["erro" => "Parceiro não encontrado."]);
    } else {
        // Ajusta caminho da logo para o front
        if (!empty($dados['logo'])) {
            $dados['logo'] = '../Public/uploads/uploads-parceiros/' . basename($dados['logo']);
        }
        echo json_encode($dados);
    }

} catch (Exception $e) {
    echo json_encode(["erro" => "Erro ao buscar parceiro: " . $e->getMessage()]);
}
