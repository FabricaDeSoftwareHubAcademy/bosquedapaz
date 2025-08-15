<?php
require_once('../vendor/autoload.php');

use app\Controller\Categoria;
use app\suport\Csrf;

header('Content-Type: application/json');

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

try {
    // Validação CSRF
    if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
        throw new Exception('Token CSRF inválido.');
    }

    $id = (int) ($_POST['id_categoria'] ?? 0);
    $descricao = sanitizarTexto($_POST['descricao'] ?? '');
    $cor = $_POST['cor'] ?? '';

    if (strlen($descricao) > 30) {
        throw new Exception('O nome da categoria deve ter no máximo 30 caracteres.');
    }
    if (empty($id) || empty($descricao) || empty($cor)) {
        throw new Exception('Preencha todos os campos obrigatórios.');
    }

    $categoriaController = new Categoria();
    $categoriaExistente = $categoriaController->buscarPorId($id);

    if (!$categoriaExistente) {
        throw new Exception('Categoria não encontrada.');
    }

    // Mantém ícone antigo por padrão
    $categoriaController->setIcone($categoriaExistente->getIcone());

    // Upload de novo ícone
    if (!empty($_FILES['icone']['name'])) {
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'svg', 'gif'];
        $extensao = strtolower(pathinfo($_FILES['icone']['name'], PATHINFO_EXTENSION));

        if (!in_array($extensao, $extensoesPermitidas)) {
            throw new Exception('Formato de ícone inválido. Use jpg, png, svg ou gif.');
        }

        $nomeSeguro = uniqid('cat_', true) . '.' . $extensao;
        $diretorioDestino = __DIR__ . '/../Public/uploads/uploads-categoria/';
        $destino = $diretorioDestino . $nomeSeguro;

        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0755, true);
        }

        if (!move_uploaded_file($_FILES['icone']['tmp_name'], $destino)) {
            throw new Exception('Erro ao salvar o novo ícone.');
        }

        // Remove ícone antigo
        $caminhoIconeAntigo = __DIR__ . '/../Public/' . $categoriaExistente->getIcone();
        if (file_exists($caminhoIconeAntigo) && is_file($caminhoIconeAntigo)) {
            unlink($caminhoIconeAntigo);
        }

        $categoriaController->setIcone('uploads/uploads-categoria/' . $nomeSeguro);
    }

    // Atualiza categoria
    $categoriaController->setDescricao($descricao);
    $categoriaController->setCor($cor);

    if (!$categoriaController->atualizar($id)) {
        throw new Exception('Falha ao atualizar a categoria.');
    }

    echo json_encode([
        'status' => 'success',
        'message' => 'Categoria atualizada com sucesso.'
    ]);
} catch (Exception $e) {
    error_log("[" . date('Y-m-d H:i:s') . "] Erro ao atualizar categoria: " . $e->getMessage());
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}