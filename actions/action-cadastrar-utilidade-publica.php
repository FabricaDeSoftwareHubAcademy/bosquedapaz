<?php
require_once('../vendor/autoload.php');
use app\Controller\UtilidadePublica;
use app\suport\Csrf;

header('Content-Type: application/json');

// --- Função de Sanitização ---
function limparEntrada($valor) {
    return htmlspecialchars(strip_tags(trim($valor)));
}

try {
    if ($_SERVER["REQUEST_METHOD"] !== 'POST') {
        throw new \Exception('Método não permitido.', 405);
    }

    if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
        throw new \Exception('Acesso não autorizado. Token CSRF inválido.', 403);
    }

    $titulo = limparEntrada($_POST['titulo'] ?? '');
    $descricao = limparEntrada($_POST['descricao'] ?? '');
    $data_inicio = limparEntrada($_POST['data_inicio'] ?? '');
    $data_fim = limparEntrada($_POST['data_fim'] ?? '');
    $imagem = '';

    if ($titulo === '' || strlen($titulo) > 50) {
        throw new \Exception('O Título é obrigatório e deve ter no máximo 50 caracteres.', 400);
    }

    if ($descricao === '' || strlen($descricao) > 500) {
        throw new \Exception('A Descrição é obrigatória e deve ter no máximo 500 caracteres.', 400);
    }

    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_inicio) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_fim)) {
        throw new \Exception('Datas inválidas. Use o formato AAAA-MM-DD.', 400);
    }

    if ($data_inicio > $data_fim) {
        throw new \Exception('A Data de Início não pode ser maior que a Data de Fim.', 400);
    }

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        $arquivo = $_FILES['imagem'];
        $nome_foto = $arquivo['name'];
        $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
        $permitidas = ['png', 'jpg', 'jpeg', 'jfif', 'svg'];
        $tamanho_maximo = 5 * 1024 * 1024; // 5MB

        if (!in_array($extensao, $permitidas)) {
            throw new \Exception('Extensão de imagem não permitida.', 400);
        }

        if ($arquivo['size'] > $tamanho_maximo) {
            throw new \Exception('A imagem não pode exceder 5MB.', 400);
        }

        $novo_nome = uniqid();
        $pasta = '../Public/uploads/uploads-utilidade/';
        $caminho = $pasta . $novo_nome . '.' . $extensao;

        if (!is_dir($pasta)) {
            mkdir($pasta, 0755, true);
        }

        if (!move_uploaded_file($arquivo['tmp_name'], $caminho)) {
            throw new \Exception('Erro ao mover a imagem para o servidor.', 500);
        }

        $imagem = $caminho;
    }

    $utilidadePublica = new UtilidadePublica();
    $utilidadePublica->titulo = $titulo;
    $utilidadePublica->descricao = $descricao;
    $utilidadePublica->data_inicio = $data_inicio;
    $utilidadePublica->data_fim = $data_fim;
    $utilidadePublica->imagem = $imagem;
    $utilidadePublica->status_utilidade = 1;

    if ($utilidadePublica->cadastrar()) {
        echo json_encode(['status' => 200, 'msg' => 'Cadastrado com sucesso!']);
    } else {
        throw new \Exception('Erro ao salvar no banco de dados.', 500);
    }

} catch (\Exception $e) {
    error_log('Erro na requisição de cadastro: ' . $e->getMessage() . ' na linha ' . $e->getLine());

    http_response_code($e->getCode() ?: 500);
    
    echo json_encode(['status' => $e->getCode() ?: 500, 'msg' => $e->getMessage()]);
}
