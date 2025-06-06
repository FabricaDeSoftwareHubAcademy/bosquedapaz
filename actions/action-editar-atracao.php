<?php
require_once('../vendor/autoload.php');
use app\Controller\Atracao;

header('Content-Type: application/json');

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) ($_POST['id_atracao'] ?? 0);

    $nome = sanitizarTexto($_POST['nome_atracao'] ?? '');
    $descricao = sanitizarTexto($_POST['descricao'] ?? '');
    $status = $_POST['status'] ?? '';
    $id_evento = (int) ($_POST['id_evento'] ?? 0);

    if (strlen($descricao) > 250) {
        echo json_encode(['status' => 'error', 'mensagem' => 'A descrição deve ter no máximo 250 caracteres.']);
        exit;
    }

    if (empty($nome) || empty($descricao) || !in_array($status, ['0', '1']) || $id_evento === 0) {
        echo json_encode(['status' => 'error', 'mensagem' => 'Preencha todos os campos corretamente.']);
        exit;
    }

    $atracao = new Atracao();
    $atracao->setNome($nome);
    $atracao->setDescricao($descricao);
    $atracao->setStatus($status);
    $atracao->setIdEvento($id_evento);

    // 👇 Upload de imagem apenas se fornecido
    if (!empty($_FILES['foto_atracao']['name'])) {
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
        $extensao = strtolower(pathinfo($_FILES['foto_atracao']['name'], PATHINFO_EXTENSION));

        if (!in_array($extensao, $extensoesPermitidas)) {
            echo json_encode(["status" => "error", "mensagem" => "Formato de imagem inválido."]);
            exit;
        }

        $nomeSeguro = uniqid('atracao_', true) . '.' . $extensao;
        $caminhoTemporario = $_FILES['foto_atracao']['tmp_name'];
        $diretorioDestino = __DIR__ . '/../Public/uploads/uploads-atracoes/';
        $destino = $diretorioDestino . $nomeSeguro;

        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true);
        }

        if (move_uploaded_file($caminhoTemporario, $destino)) {
            $atracaoExistente = $atracao->buscarPorId($id);
            if ($atracaoExistente) {
                $caminhoAntigo = __DIR__ . '/../Public/' . $atracaoExistente->getBanner();
                if (file_exists($caminhoAntigo)) {
                    unlink($caminhoAntigo);
                }
            }
            $atracao->setBanner('uploads/uploads-atracoes/' . $nomeSeguro);
        } else {
            echo json_encode(['status' => 'error', 'mensagem' => 'Erro ao mover a nova imagem.']);
            exit;
        }
    } else {
        $atracaoExistente = $atracao->buscarPorId($id);
        if ($atracaoExistente) {
            $atracao->setBanner($atracaoExistente->getBanner());
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