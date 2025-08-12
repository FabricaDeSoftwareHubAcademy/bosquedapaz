<?php
require_once('../vendor/autoload.php');

use app\Controller\Categoria;
use app\suport\Csrf;

header('Content-Type: application/json');

// Função para sanitizar texto
function sanitizarTexto($input)
{
    return htmlspecialchars(strip_tags(trim($input)));
}

try {
    // Verifica se o token CSRF está presente e é válido antes de prosseguir
    if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
        throw new Exception("Token CSRF inválido.");
    }
    
    // Verifica se os dados principais foram recebidos via POST
    if (!isset($_POST['descricao'], $_POST['cor']) || !isset($_FILES['icone'])) {
        throw new Exception("Dados do formulário incompletos.");
    }

    $descricao = sanitizarTexto($_POST['descricao']);
    $cor = $_POST['cor'];
    $arquivo = $_FILES['icone'];

    // --- Validações ---
    if (empty($descricao)) {
        throw new Exception('O nome da categoria é obrigatório.');
    }
    if (strlen($descricao) > 30) {
        throw new Exception('O nome da categoria deve ter no máximo 30 caracteres.');
    }
    if (empty($cor)) {
        throw new Exception('A cor é obrigatória.');
    }
    if ($arquivo['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('Nenhum ícone foi enviado ou ocorreu um erro no upload.');
    }

    // --- Validação e Processamento do Arquivo ---
    $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
    $extensoesPermitidas = ['png', 'jpg', 'jpeg', 'jfif', 'svg'];
    if (!in_array($extensao, $extensoesPermitidas)) {
        throw new Exception('Formato de ícone inválido. Use jpg, png, svg, ou jfif.');
    }

    $tamanhoMaximo = 2 * 1024 * 1024; // 2MB
    if ($arquivo['size'] > $tamanhoMaximo) {
        throw new Exception('Arquivo muito grande. O máximo permitido é 2MB.');
    }

    // --- Tratamento de Caminhos e Upload ---
    $diretorioDeUpload = __DIR__ . '/../Public/uploads/uploads-categoria/';
    $caminhoParaBanco = 'uploads/uploads-categoria/';

    // Cria o diretório se ele não existir
    if (!is_dir($diretorioDeUpload)) {
        mkdir($diretorioDeUpload, 0777, true);
    }

    $novo_nome = uniqid('cat_', true) . '.' . $extensao;
    $caminhoCompletoParaMover = $diretorioDeUpload . $novo_nome;

    if (!move_uploaded_file($arquivo['tmp_name'], $caminhoCompletoParaMover)) {
        throw new Exception('Falha ao salvar o arquivo no servidor.');
    }

    $caminhoFinalParaBanco = $caminhoParaBanco . $novo_nome;

    // --- Criação e Cadastro do Objeto ---
    $cat = new Categoria();
    $cat->setDescricao($descricao);
    $cat->setCor($cor);
    $cat->setIcone($caminhoFinalParaBanco);

    $res = $cat->cadastrar();

    if ($res) {
        echo json_encode(['status' => 'success', 'message' => 'Categoria cadastrada com sucesso!']);
    } else {
        // Em caso de falha no banco, remove o arquivo salvo
        unlink($caminhoCompletoParaMover);
        throw new Exception('Erro ao cadastrar a categoria no banco de dados.');
    }

} catch (Exception $e) {
    // Retorna uma resposta de erro em formato JSON
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
