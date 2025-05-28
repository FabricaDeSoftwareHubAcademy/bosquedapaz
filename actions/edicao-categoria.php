<?php

require_once('../vendor/autoload.php');
use app\Controller\Categoria;

// Define o cabeçalho como JSON
header('Content-Type: application/json');

if (isset($_POST['id_categoria']) && isset($_POST['descricao']) && isset($_POST['cor'])) {
    $id = $_POST['id_categoria'];
    $descricao = $_POST['descricao'];
    $cor = $_POST['cor'];
    $arquivo = $_FILES['icone'] ?? null;

    $cat = new Categoria();

    // Pega a categoria atual para manter o ícone caso não seja enviado novo arquivo
    $categoriaAtual = $cat->listar_por_id($id);

    if (!$categoriaAtual) {
        echo json_encode([
            'status' => 'Error',
            'message' => 'Categoria não encontrada'
        ]);
        exit;
    }

    $caminho = $categoriaAtual->icone; // mantém o ícone atual por padrão

    // Se enviou arquivo novo e sem erro, trata upload
    if ($arquivo && $arquivo['error'] === 0) {
        $pasta = '../Public/imgs/uploads-categoria/';

        $nome_foto = $arquivo['name'];
        $novo_nome = uniqid();
        $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));

        if (!in_array($extensao, ['png', 'jpg', 'jpeg', 'jfif', 'svg'])) {
            echo json_encode([
                'status' => 'Error',
                'message' => 'Extensão do arquivo inválida'
            ]);
            exit;
        }

        $novo_caminho = $pasta . $novo_nome . '.' . $extensao;

        if (move_uploaded_file($arquivo['tmp_name'], $novo_caminho)) {
            $caminho = $novo_caminho;
        } else {
            echo json_encode([
                'status' => 'Error',
                'message' => 'Falha ao mover o arquivo para o diretório'
            ]);
            exit;
        }
    }

    $cat->id_categoria = $id;
    $cat->descricao = $descricao;
    $cat->cor = $cor;
    $cat->icone = $caminho;

    if ($cat->atualizar()) {
        echo json_encode([
            'status' => 'OK',
            'message' => 'Categoria atualizada com sucesso!'
        ]);
    } else {
        echo json_encode([
            'status' => 'Error',
            'message' => 'Erro ao atualizar a categoria'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'Error',
        'message' => 'Dados do formulário inválidos'
    ]);
}
