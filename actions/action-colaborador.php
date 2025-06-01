<?php

require_once('../vendor/autoload.php');
use app\Controller\Colaborador;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $colab = new Colaborador();

    $colab->setNome($_POST['nome'] ?? '');
    $colab->setTelefone($_POST['tel'] ?? '');
    $colab->setEmail($_POST['email'] ?? '');
    $colab->setCargo($_POST['cargo'] ?? '');
    $colab->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT));
    $colab->setPerfil($_POST['perfil'] ?? '');

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        $diretorio = __DIR__ . '/../../Public/imgs/img-cadastro-adm/';

        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0755, true);
        }

        $nomeImagem = uniqid() . '-' . basename($_FILES['imagem']['name']);
        $caminhoCompleto = $diretorio . $nomeImagem;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoCompleto)) {
            $colab->setImagem('Public/imgs/img-cadastro-adm/' . $nomeImagem);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao mover arquivo.']);
            exit;
        }
    } else {
        $colab->setImagem(null);
    }

    $res = $colab->cadastrar();

    if ($res) {
        echo json_encode(['success' => true, 'message' => 'ADM cadastrado com sucesso!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar ADM.']);
    }
    exit;
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Método inválido!'
    ]);
}
