<?php
require_once('../vendor/autoload.php');
use app\Controller\Evento;  


header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $evento = new Evento();

    $evento->setNome($_POST['nomedoevento']);
    $evento->setDescricao($_POST['descricao']);
    $evento->setData($_POST['dataevento']);
    $evento->setStatus($_POST['status']);

    $id = (int) $_POST['id_evento']; // 👈 Põe logo no começo, pra garantir

    // Upload do banner
    if (!empty($_FILES['banner']['name'])) {
        $extensao = pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
        $nomeBase = pathinfo($_FILES['banner']['name'], PATHINFO_FILENAME);
        $nomeSeguro = preg_replace('/[^a-zA-Z0-9_-]/', '_', $nomeBase) . '_' . time() . '.' . $extensao;

        $caminhoTemporario = $_FILES['banner']['tmp_name'];
        $diretorioDestino = __DIR__ . '/../Public/uploads/uploads-eventos/';
        $destino = $diretorioDestino . $nomeSeguro;

        if (!file_exists($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true);
        }

        if (move_uploaded_file($caminhoTemporario, $destino)) {
            // 🔥 Excluir imagem antiga
            $eventoExistente = $evento->buscarPorId($id);
            $caminhoAntigo = __DIR__ . '/../Public/' . $eventoExistente->getBanner();
            if ($eventoExistente && file_exists($caminhoAntigo)) {
                unlink($caminhoAntigo);
            }

            // Atualiza com a nova imagem
            $evento->setBanner('uploads/uploads-eventos/' . $nomeSeguro);
        } else {
            echo json_encode(['status' => 'error', 'mensagem' => 'Erro ao mover a nova imagem.']);
            exit;
        }
    }

    // Aqui SEMPRE será chamado
    $resultado = $evento->atualizar($id);

    if ($resultado) {
        echo json_encode(['status' => 'success', 'mensagem' => 'Evento atualizado com sucesso.']);
    } else {
        echo json_encode(['status' => 'error', 'mensagem' => 'Falha ao atualizar evento.']);
    }
} else {
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida.']);
}