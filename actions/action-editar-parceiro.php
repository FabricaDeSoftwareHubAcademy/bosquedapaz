<?php
require_once('../vendor/autoload.php');

use app\Controller\Parceiro;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {
    if (!isset($_GET['id'])) {
        echo json_encode(['erro' => 'ID não informado']);
        exit;
    }

    $id = intval($_GET['id']);

    $pastaDestino = "../Public/uploads/uploads-parceiros";
    if (!is_dir($pastaDestino)) {
        mkdir($pastaDestino, 0755, true);
    }

    $caminhoLogo = null;
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
        $nomeTemporario = $_FILES['logo']['tmp_name'];
        $nomeOriginal = basename($_FILES['logo']['name']);

        $ext = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
        $novoNome = uniqid('logo_') . '.' . $ext;
        $caminhoFinal = $pastaDestino . '/' . $novoNome;

        if (move_uploaded_file($nomeTemporario, $caminhoFinal)) {
            $caminhoLogo = $caminhoFinal;
        } else {
            echo json_encode(['erro' => 'Falha ao salvar o arquivo da logo']);
            exit;
        }
    }


    $dados = [
        'nome_parceiro' => $_POST['nome_parceiro'] ?? null,
        'telefone' => $_POST['telefone'] ?? null,
        'logo' => $caminhoLogo, // será null se não enviou nova imagem
        'email' => $_POST['email'] ?? null,
        'cpf_cnpj' => $_POST['cpf_cnpj'] ?? null,
        'nome_contato' => $_POST['nome_contato'] ?? null,
        'tipo' => $_POST['tipo'] ?? null,
        'cep' => $_POST['cep'] ?? null,
        'complemento' => $_POST['complemento'] ?? null,
        'num_residencia' => $_POST['num_residencia'] ?? null,
        'logradouro' => $_POST['logradouro'] ?? null,
        'estado' => $_POST['estado'] ?? null,
        'bairro' => $_POST['bairro'] ?? null
    ];

    foreach ($dados as $key => $value) {
        if ($value === null && $key !== 'logo') {
            echo json_encode(['erro' => "Campo $key não informado"]);
            exit;
        }
    }

    $parceiro = new Parceiro();

    // se nenhuma logo for colocada aqui
    // mantém mesma logo sem trocar
    if ($dados['logo'] === null) {
        unset($dados['logo']);
    }

    $resultado = $parceiro->AtualizarParceiro($id, $dados);

    if ($resultado) {
        echo json_encode(['sucesso' => 'Parceiro atualizado com sucesso']);
    } else {
        echo json_encode(['erro' => 'Falha ao atualizar parceiro']);
    }
} else {
    echo json_encode(['erro' => 'Requisição inválida']);
}
