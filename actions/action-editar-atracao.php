<?php
require_once('../vendor/autoload.php');

use app\Controller\Atracao;
use app\suport\Csrf;

header('Content-Type: application/json');

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

try {
    // Validação do CSRF
    if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
        throw new Exception('Requisição inválida.');
    }

    $id = (int) ($_POST['id_atracao'] ?? 0);
    $nome = sanitizarTexto($_POST['nome_atracao'] ?? '');
    $descricao = sanitizarTexto($_POST['descricao_atracao'] ?? '');
    $status = $_POST['status'] ?? '';
    $id_evento = (int) ($_POST['id_evento'] ?? 0);

    // Validações
    if ($id <= 0) {
        throw new Exception('ID da atração inválido.');
    }

    if (strlen($descricao) > 250) {
        throw new Exception('A descrição deve ter no máximo 250 caracteres.');
    }

    if (empty($nome) || empty($descricao) || !in_array($status, ['0', '1']) || $id_evento <= 0) {
        throw new Exception('Preencha todos os campos corretamente.');
    }

    $atracao = new Atracao();
    $atracao->nome_atracao = $nome;
    $atracao->descricao_atracao = $descricao;
    $atracao->status = $status;
    $atracao->id_evento = $id_evento;

    // Upload de banner (opcional)
    if (!empty($_FILES['banner_atracao']['name'])) {
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
        $extensao = strtolower(pathinfo($_FILES['banner_atracao']['name'], PATHINFO_EXTENSION));

        if (!in_array($extensao, $extensoesPermitidas)) {
            throw new Exception('Formato de imagem inválido.');
        }

        $nomeSeguro = uniqid('atracao_', true) . '.' . $extensao;
        $caminhoTemporario = $_FILES['banner_atracao']['tmp_name'];
        $diretorioDestino = __DIR__ . '/../Public/uploads/atracoes/';
        $destino = $diretorioDestino . $nomeSeguro;

        if (!move_uploaded_file($caminhoTemporario, $destino)) {
            throw new Exception('Erro ao mover a nova imagem.');
        }

        // Remove imagem antiga se existir
        $atracaoExistente = $atracao->buscarPorId($id);
        if ($atracaoExistente && !empty($atracaoExistente->banner_atracao)) {
            $caminhoAntigo = __DIR__ . '/../Public/' . $atracaoExistente->banner_atracao;
            if (file_exists($caminhoAntigo)) {
                unlink($caminhoAntigo);
            }
        }

        $atracao->banner_atracao = 'uploads/atracoes/' . $nomeSeguro;
    } else {
        // Mantém banner existente
        $atracaoExistente = $atracao->buscarPorId($id);
        if ($atracaoExistente) {
            $atracao->banner_atracao = $atracaoExistente->banner_atracao;
        }
    }

    // Atualização
    $resultado = $atracao->atualizar($id);

    echo json_encode([
        'status' => $resultado ? 'success' : 'error',
        'mensagem' => $resultado ? 'Atração atualizada com sucesso.' : 'Falha ao atualizar atração.'
    ]);

} catch (Exception $e) {
    // Log interno
    error_log("[" . date('Y-m-d H:i:s') . "] Erro ao atualizar atração: " . $e->getMessage());

    // Retorno seguro
    echo json_encode([
        'status' => 'error',
        'mensagem' => $e->getMessage() // Em produção, pode ser genérica
    ]);
}