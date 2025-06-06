<?php
require_once('../vendor/autoload.php');
use app\Controller\Evento;

header('Content-Type: application/json');

// 🧼 Sanitização e validação
function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

function validarData($data) {
    $d = DateTime::createFromFormat('Y-m-d', $data);
    return $d && $d->format('Y-m-d') === $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) ($_POST['id_evento'] ?? 0);

    $nome = sanitizarTexto($_POST['nomedoevento'] ?? '');
    $descricao = sanitizarTexto($_POST['descricao'] ?? '');
    $data = $_POST['dataevento'] ?? '';
    $status = $_POST['status'] ?? '';

    if (strlen($descricao) > 250) {
        echo json_encode(['status' => 'error', 'mensagem' => 'A descrição deve ter no máximo 250 caracteres.']);
        exit;
    }

    if (empty($nome) || empty($descricao) || empty($data) || !isset($_POST['status']) || !in_array($status, ['0', '1']) || !validarData($data)) {
        echo json_encode(['status' => 'error', 'mensagem' => 'Preencha todos os campos corretamente.']);
        exit;
    }

    $evento = new Evento();
    $evento->setNome($nome);
    $evento->setDescricao($descricao);
    $evento->setData($data);
    $evento->setStatus($status);

    // 👇 Upload de imagem apenas se fornecido
    if (!empty($_FILES['banner']['name'])) {
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
        $extensao = strtolower(pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION));

        if (!in_array($extensao, $extensoesPermitidas)) {
            echo json_encode(["status" => "error", "mensagem" => "Formato de imagem inválido."]);
            exit;
        }

        $nomeSeguro = uniqid('evento_', true) . '.' . $extensao;
        $caminhoTemporario = $_FILES['banner']['tmp_name'];
        $diretorioDestino = __DIR__ . '/../Public/uploads/uploads-eventos/';
        $destino = $diretorioDestino . $nomeSeguro;

        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true);
        }

        if (move_uploaded_file($caminhoTemporario, $destino)) {
            $eventoExistente = $evento->buscarPorId($id);
            if ($eventoExistente) {
                $caminhoAntigo = __DIR__ . '/../Public/' . $eventoExistente->getBanner();
                if (file_exists($caminhoAntigo)) {
                    unlink($caminhoAntigo);
                }
            }
            $evento->setBanner('uploads/uploads-eventos/' . $nomeSeguro);
        } else {
            echo json_encode(['status' => 'error', 'mensagem' => 'Erro ao mover a nova imagem.']);
            exit;
        }
    } else {
        $eventoExistente = $evento->buscarPorId($id);
        if ($eventoExistente) {
            $evento->setBanner($eventoExistente->getBanner());
        }
    }

    $resultado = $evento->atualizar($id);

    echo json_encode([
        'status' => $resultado ? 'success' : 'error',
        'mensagem' => $resultado ? 'Evento atualizado com sucesso.' : 'Falha ao atualizar evento.'
    ]);
} else {
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida.']);
}