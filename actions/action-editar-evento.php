<?php
require_once('../vendor/autoload.php');

use app\Controller\Evento;
use app\suport\Csrf;

header('Content-Type: application/json');

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

try {
    // Validação CSRF
    if (!isset($_POST['tolkenCsrf']) || !Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {
        throw new Exception('Requisição inválida.');
    }

    // Validação dos inputs com filter_input
    $id = filter_input(INPUT_POST, 'id_evento', FILTER_VALIDATE_INT);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_VALIDATE_INT);
    $status = filter_input(INPUT_POST, 'status', FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 0, 'max_range' => 1]
    ]);

    $nome = sanitizarTexto($_POST['nomedoevento'] ?? '');
    $subtitulo = sanitizarTexto($_POST['subtitulo'] ?? '');
    $descricao = sanitizarTexto($_POST['descricaodoevento'] ?? '');
    $data = $_POST['dataevento'] ?? '';
    $hora_inicio = $_POST['hora_inicio'] ?? '';
    $hora_fim = $_POST['hora_fim'] ?? '';

    // Validações básicas
    if (!$id || !$endereco || $status === false) {
        throw new Exception('Campos numéricos inválidos.');
    }

    if (empty($nome) || empty($subtitulo) || empty($descricao) || empty($data) || empty($hora_inicio) || empty($hora_fim)) {
        throw new Exception('Preencha todos os campos corretamente.');
    }

    // Limites de caracteres
    if (strlen($nome) > 150) {
        throw new Exception('O nome do evento deve ter no máximo 150 caracteres.');
    }

    if (strlen($subtitulo) > 150) {
        throw new Exception('O subtítulo do evento deve ter no máximo 150 caracteres.');
    }

    if (strlen($descricao) > 500) {
        throw new Exception('A descrição deve ter no máximo 500 caracteres.');
    }

    $evento = new Evento();
    $evento->nome_evento = $nome;
    $evento->subtitulo_evento = $subtitulo;
    $evento->descricao_evento = $descricao;
    $evento->data_evento = $data;
    $evento->hora_inicio = $hora_inicio;
    $evento->hora_fim = $hora_fim;
    $evento->id_endereco_evento = $endereco;
    $evento->status = $status;

    // Upload de banner (opcional)
    if (!empty($_FILES['banner']['name'])) {
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
        $extensao = strtolower(pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION));

        if (!in_array($extensao, $extensoesPermitidas)) {
            throw new Exception('Formato de imagem inválido.');
        }

        $nomeSeguro = uniqid('evento_', true) . '.' . $extensao;
        $caminhoTemporario = $_FILES['banner']['tmp_name'];
        $diretorioDestino = __DIR__ . '/../Public/uploads/uploads-eventos/';
        $destino = $diretorioDestino . $nomeSeguro;

        if (!move_uploaded_file($caminhoTemporario, $destino)) {
            throw new Exception('Erro ao mover a nova imagem.');
        }

        // Remove banner antigo se existir
        $eventoExistente = $evento->buscarPorId_evento($id);
        if ($eventoExistente && !empty($eventoExistente->banner_evento)) {
            $caminhoAntigo = __DIR__ . '/../Public/' . $eventoExistente->banner_evento;
            if (file_exists($caminhoAntigo)) {
                unlink($caminhoAntigo);
            }
        }

        $evento->banner_evento = 'uploads/uploads-eventos/' . $nomeSeguro;
    } else {
        // Mantém banner existente
        $eventoExistente = $evento->buscarPorId_evento($id);
        if ($eventoExistente) {
            $evento->banner_evento = $eventoExistente->banner_evento;
        }
    }

    // Atualização
    $resultado = $evento->atualizar_evento($id);

    echo json_encode([
        'status' => $resultado ? 'success' : 'error',
        'mensagem' => $resultado ? 'Evento atualizado com sucesso.' : 'Falha ao atualizar evento.'
    ]);

} catch (Exception $e) {
    // Log interno
    error_log("[" . date('Y-m-d H:i:s') . "] Erro ao atualizar evento: " . $e->getMessage());

    // Retorno seguro
    echo json_encode([
        'status' => 'error',
        'mensagem' => $e->getMessage() // Em produção, pode ser genérica
    ]);
}