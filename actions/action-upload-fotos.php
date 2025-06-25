<?php
require_once('../vendor/autoload.php');

use app\Controller\FotosEvento;

header('Content-Type: application/json');

function sanitizarTexto($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_evento = (int) ($_POST['id_evento'] ?? 0);

    if ($id_evento === 0) {
        echo json_encode(['status' => 'error', 'mensagem' => 'ID do evento inválido.']);
        exit;
    }

    if (empty($_FILES['fotos'])) {
        echo json_encode(['status' => 'error', 'mensagem' => 'Nenhuma foto enviada.']);
        exit;
    }

    $arquivos = $_FILES['fotos'];
    $quantidade = count($arquivos['name']);

    $extensoesPermitidas = ['jpg', 'jpeg', 'png'];

    $diretorioDestino = __DIR__ . '/../Public/uploads/fotos-eventos/';

    if (!is_dir($diretorioDestino)) {
        mkdir($diretorioDestino, 0777, true);
    }

    $erros = [];
    $sucesso = 0;

    for ($i = 0; $i < $quantidade; $i++) {
        $nomeArquivo = $arquivos['name'][$i];
        $tmp = $arquivos['tmp_name'][$i];
        $erro = $arquivos['error'][$i];

        if ($erro !== UPLOAD_ERR_OK) {
            $erros[] = "Erro ao enviar $nomeArquivo.";
            continue;
        }

        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

        if (!in_array($extensao, $extensoesPermitidas)) {
            $erros[] = "Arquivo $nomeArquivo possui formato inválido.";
            continue;
        }

        $nomeSeguro = uniqid('foto_', true) . '.' . $extensao;
        $destino = $diretorioDestino . $nomeSeguro;

        if (move_uploaded_file($tmp, $destino)) {
            $foto = new FotosEvento();
            $foto->id_evento = $id_evento;
            $foto->caminho = 'uploads/fotos-eventos/' . $nomeSeguro;
            $foto->legenda = ('');

            $foto->cadastrar();

            $sucesso++;
        } else {
            $erros[] = "Falha ao mover $nomeArquivo.";
        }
    }

    if ($sucesso > 0) {
        echo json_encode([
            'status' => 'success',
            'mensagem' => "$sucesso fotos enviadas com sucesso." . 
                           (count($erros) > 0 ? ' Algumas falharam.' : '')
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'mensagem' => 'Falha no upload. ' . implode(' ', $erros)
        ]);
    }

} else {
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida.']);
}