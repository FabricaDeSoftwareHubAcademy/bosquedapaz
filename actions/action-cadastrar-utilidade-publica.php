<?php
require_once('../vendor/autoload.php');
use app\Controller\UtilidadePublica;

// Verifica se é uma requisição POST
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $id_utilidadePublica = $_POST['id_utilidadePublica'] ?? null;
    $titulo = trim($_POST['titulo'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $data_inicio = trim($_POST['data_inicio'] ?? '');
    $data_fim = trim($_POST['data_fim'] ?? '');
    $imagem = '';
    
    if ($titulo === '') {
        echo json_encode('Erro ao Cadastrar!');
    }

    // Validações de campos obrigatórios
    if (empty($titulo)) {
        echo json_encode(['status' => 400, 'message' => 'O campo Título é obrigatório.']);
        exit;
    }

    if (strlen($titulo) > 100) {
        echo json_encode(['status' => 400, 'message' => 'O título deve ter no máximo 100 caracteres.']);
        exit;
    }

    if (empty($descricao)) {
        echo json_encode(['status' => 400, 'message' => 'O campo Descrição é obrigatório.']);
        exit;
    }

    if (empty($data_inicio)) {
        echo json_encode(['status' => 400, 'message' => 'A data de início é obrigatória.']);
        exit;
    }

    if (empty($data_fim)) {
        echo json_encode(['status' => 400, 'message' => 'A data de fim é obrigatória.']);
        exit;
    }

    // Validação de datas
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_inicio) || !strtotime($data_inicio)) {
        echo json_encode(['status' => 400, 'message' => 'Data de início inválida.']);
        exit;
    }

    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_fim) || !strtotime($data_fim)) {
        echo json_encode(['status' => 400, 'message' => 'Data de fim inválida.']);
        exit;
    }

    if (strtotime($data_fim) < strtotime($data_inicio)) {
        echo json_encode(['status' => 400, 'message' => 'A data de fim não pode ser anterior à data de início.']);
        exit;
    }

    // Verifica se o arquivo foi enviado
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        $arquivo = $_FILES['imagem'];
        $nome_foto = $arquivo['name'];
        $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
        $permitidas = ['png', 'jpg', 'jpeg', 'jfif', 'svg'];

        if (!in_array($extensao, $permitidas)) {
            echo json_encode(['status' => 400, 'message' => 'Tipo de imagem inválido.']);
            exit;
        }

        if ($arquivo['size'] > 2 * 1024 * 1024) { // Limite de 2MB
            echo json_encode(['status' => 400, 'message' => 'A imagem deve ter no máximo 2MB.']);
            exit;
        }

        $novo_nome = uniqid();
        $pasta = '../Public/imgs/uploads-utilidade/';
        $caminho = $pasta . $novo_nome . '.' . $extensao;

        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }

        if (!move_uploaded_file($arquivo['tmp_name'], $caminho)) {
            echo json_encode(['status' => 500, 'message' => 'Erro ao salvar a imagem.']);
            exit;
        }

        $imagem = $caminho;
    }

    // Instancia e popula o objeto
    $utilidadePublica = new UtilidadePublica();
    $utilidadePublica->titulo = $titulo;
    $utilidadePublica->descricao = $descricao;
    $utilidadePublica->data_inicio = $data_inicio;
    $utilidadePublica->data_fim = $data_fim;
    $utilidadePublica->imagem = $imagem;
    $utilidadePublica->status_utilidade = 1;

    // Tenta cadastrar
    if ($utilidadePublica->cadastrar()) {
        echo json_encode(['status' => 200, 'msg' => 'Cadastrado com sucesso!!']);
    } else {
        echo json_encode(['status' => 500, 'message' => 'Erro ao cadastrar.']);
    }
}
?>
