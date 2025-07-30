<?php
require_once('../vendor/autoload.php');
use app\Controller\Evento;
use app\suport\Csrf;

header('Content-Type: application/json');

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

function validarData($data) {
    $d = DateTime::createFromFormat('Y-m-d', $data);
    return $d && $d->format('Y-m-d') === $data;
}

if (isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
    $id = (int) ($_POST['id_evento'] ?? 0);

    $nome = sanitizarTexto($_POST['nomedoevento'] ?? '');
    $subtitulo = sanitizarTexto($_POST['subtitulo'] ?? '');
    $descricao = sanitizarTexto($_POST['descricaodoevento'] ?? '');
    $data = $_POST['dataevento'] ?? '';
    $hora_inicio = $_POST['hora_inicio'] ?? '';
    $hora_fim = $_POST['hora_fim'] ?? '';
    $endereco = (int) ($_POST['endereco'] ?? 0);
    $status = $_POST['status'] ?? '';

    if (strlen($descricao) > 500) {
        echo json_encode(['status' => 'error', 'mensagem' => 'A descrição deve ter no máximo 250 caracteres.']);
        exit;
    }

    if (empty($nome) || empty($descricao) || empty($data) || empty($subtitulo) || empty($hora_inicio) || empty($hora_fim) || empty($endereco) || !isset($_POST['status']) || !in_array($status, ['0', '1']) || !validarData($data)) {
        echo json_encode(['status' => 'error', 'mensagem' => 'Preencha todos os campos corretamente.']);
        exit;
    }

    $evento = new Evento();
    $evento->nome_evento = $nome;
    $evento->subtitulo_evento = $subtitulo;
    $evento->descricao_evento = $descricao;
    $evento->data_evento = $data;
    $evento->hora_inicio = $hora_inicio;
    $evento->hora_fim = $hora_fim;
    $evento->endereco_evento = $endereco;
    $evento->status = $status;



    // Upload de imagem (opcional)
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

        if (move_uploaded_file($caminhoTemporario, $destino)) {
            $eventoExistente = $evento->buscarPorId_evento($id);
            if ($eventoExistente) {
                $caminhoAntigo = __DIR__ . '/../Public/' . $eventoExistente->banner_evento;
                if (file_exists($caminhoAntigo)) {
                    unlink($caminhoAntigo);
                }
            }
            $evento->banner_evento = 'uploads/uploads-eventos/' . $nomeSeguro;
        } else {
            echo json_encode(['status' => 'error', 'mensagem' => 'Erro ao mover a nova imagem.']);
            exit;
        }
    } else {
        $eventoExistente = $evento->buscarPorId_evento($id);
        if ($eventoExistente) {
            $evento->banner_evento = $eventoExistente->banner_evento;
        }
    }

    $resultado = $evento->atualizar_evento($id);

    echo json_encode([
        'status' => $resultado ? 'success' : 'error',
        'mensagem' => $resultado ? 'Evento atualizado com sucesso.' : 'Falha ao atualizar evento.'
    ]);
} else {
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida.']);
}