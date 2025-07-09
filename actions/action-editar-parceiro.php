<?php
require_once('../vendor/autoload.php');

use app\Controller\Parceiro;

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $parceiro = new Parceiro();
    $dados = $parceiro->ObterParceiro($id);

    if ($dados) {
        echo json_encode($dados);
    } else {
        echo json_encode(['erro' => 'Parceiro não encontrado']);
    }
} else {
    echo json_encode(['erro' => 'ID não informado']);
}
