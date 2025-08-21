<?php
require_once('../vendor/autoload.php');
use app\Controller\Atracao;use app\suport\Csrf;

header('Content-Type: application/json');

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if (isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
    $id = (int) ($_POST['id_atracao'] ?? 0);

    $nome = sanitizarTexto($_POST['nome_atracao'] ?? '');
    $descricao = sanitizarTexto($_POST['descricao_atracao'] ?? '');
    $status = $_POST['status'] ?? '';
    $id_evento = (int) ($_POST['id_evento'] ?? 0);

    if (strlen($descricao) > 250) {
        echo json_encode(['status' => 'error', 'mensagem' => 'A descrição deve ter no máximo 250 caracteres.']);
        exit;
    }

    if (empty($nome) || empty($descricao) || !isset($_POST['status']) || !in_array($status, ['0', '1']) || $id_evento === 0) {
        echo json_encode(['status' => 'error', 'mensagem' => 'Preencha todos os campos corretamente.']);
        exit;
    }

    $atracao = new Atracao();
    $atracao->nome_atracao = $nome;
    $atracao->descricao_atracao = $descricao;
    $atracao->status = $status;
    $atracao->id_evento = $id_evento;

    if (!empty($_FILES['banner_atracao']['name'])) {
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'webp', 'jfif'];
        $extensao = strtolower(pathinfo($_FILES['banner_atracao']['name'], PATHINFO_EXTENSION));

        if (!in_array($extensao, $extensoesPermitidas)) {
            echo json_encode(["status" => "error", "mensagem" => "Formato de imagem inválido."]);
            exit;
        }

        $nomeSeguro = uniqid('atracao_', true) . '.' . $extensao;
        $caminhoTemporario = $_FILES['banner_atracao']['tmp_name'];
        $diretorioDestino = __DIR__ . '/../Public/uploads/atracoes/';
        $destino = $diretorioDestino . $nomeSeguro;


        if (move_uploaded_file($caminhoTemporario, $destino)) {
            $atracaoExistente = $atracao->buscarPorId($id);
            if ($atracaoExistente) {
                $caminhoAntigo = __DIR__ . '/../Public/' . $atracaoExistente->banner_atracao;
                if (file_exists($caminhoAntigo)) {
                    unlink($caminhoAntigo);
                }
            }
            $atracao->banner_atracao = 'uploads/atracoes/' . $nomeSeguro;
        } else {
            echo json_encode(['status' => 'error', 'mensagem' => 'Erro ao mover a nova imagem.']);
            exit;
        }
    } else {
        $atracaoExistente = $atracao->buscarPorId($id);
        if ($atracaoExistente) {
            $atracao->banner_atracao = $atracaoExistente->banner_atracao;
        }
    }

    $resultado = $atracao->atualizar($id);

    echo json_encode([
        'status' => $resultado ? 'success' : 'error',
        'mensagem' => $resultado ? 'Atração atualizada com sucesso.' : 'Falha ao atualizar atração.'
    ]);
} else {
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida.']);
}