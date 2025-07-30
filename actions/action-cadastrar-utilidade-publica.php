<?php
require_once('../vendor/autoload.php');
use app\Controller\UtilidadePublica;

header('Content-Type: application/json');

// Verifica se é uma requisição POST
if ($_SERVER["REQUEST_METHOD"] !== 'POST') {
    echo json_encode(['status' => 405, 'msg' => 'Método não permitido.']);
    exit;
}

// Função para limpar entradas (evitar XSS)
function limparEntrada($valor) {
    return htmlspecialchars(strip_tags(trim($valor)));
}

// Recupera e valida os dados
$titulo = limparEntrada($_POST['titulo'] ?? '');
$descricao = limparEntrada($_POST['descricao'] ?? '');
$data_inicio = limparEntrada($_POST['data_inicio'] ?? '');
$data_fim = limparEntrada($_POST['data_fim'] ?? '');
$imagem = '';

// Validações básicas
if ($titulo === '' || strlen($titulo) > 50) {
    echo json_encode(['status' => 400, 'msg' => 'Título é obrigatório e deve ter no máximo 100 caracteres.']);
    exit;
}

if ($descricao === '' || strlen($descricao) > 500) {
    echo json_encode(['status' => 400, 'msg' => 'Descrição é obrigatória e deve ter no máximo 500 caracteres.']);
    exit;
}

// Verifica formato da data (ano-mês-dia)
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_inicio) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_fim)) {
    echo json_encode(['status' => 400, 'msg' => 'Datas inválidas. Use o formato AAAA-MM-DD.']);
    exit;
}

if ($data_inicio > $data_fim) {
    echo json_encode(['status' => 400, 'msg' => 'Data de início não pode ser maior que a data de fim.']);
    exit;
}

// Valida a imagem (se enviada)
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
    $arquivo = $_FILES['imagem'];
    $nome_foto = $arquivo['name'];
    $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
    $permitidas = ['png', 'jpg', 'jpeg', 'jfif', 'svg'];
    $tamanho_maximo = 5 * 1024 * 1024; // 5MB

    if (!in_array($extensao, $permitidas)) {
        echo json_encode(['status' => 400, 'msg' => 'Extensão de imagem não permitida.']);
        exit;
    }

    if ($arquivo['size'] > $tamanho_maximo) {
        echo json_encode(['status' => 400, 'msg' => 'A imagem não pode exceder 5MB.']);
        exit;
    }

    $novo_nome = uniqid();
    $pasta = '../Public/uploads/uploads-utilidade/';
    $caminho = $pasta . $novo_nome . '.' . $extensao;

    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }

    if (!move_uploaded_file($arquivo['tmp_name'], $caminho)) {
        echo json_encode(['status' => 500, 'msg' => 'Erro ao mover a imagem.']);
        exit;
    }

    $imagem = $caminho;
}

// Cria o objeto e preenche os dados
$utilidadePublica = new UtilidadePublica();
$utilidadePublica->titulo = $titulo;
$utilidadePublica->descricao = $descricao;
$utilidadePublica->data_inicio = $data_inicio;
$utilidadePublica->data_fim = $data_fim;
$utilidadePublica->imagem = $imagem;
$utilidadePublica->status_utilidade = 1;

// Tenta cadastrar
if ($utilidadePublica->cadastrar()) {
    echo json_encode(['status' => 200, 'msg' => 'Cadastrado com sucesso!']);
} else {
    echo json_encode(['status' => 500, 'msg' => 'Erro ao salvar no banco de dados.']);
}
