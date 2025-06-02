<?php
require_once('../vendor/autoload.php');
use app\Controller\Evento;  

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $evento = new Evento();

    $evento->setNome($_POST['nomedoevento']);
    $evento->setDescricao($_POST['descricao']);
    $evento->setData($_POST['dataevento']);
    $evento->setStatus($_POST['status']);

    // Upload do banner
    if (!empty($_FILES['banner']['name'])) {
        $nomeImagem = $_FILES['banner']['name'];
        $caminhoTemporario = $_FILES['banner']['tmp_name'];
    
        $diretorioDestino = __DIR__ . '/../../Public/uploads/banners/';
        if (!file_exists($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true);
        }
    
        $destino = $diretorioDestino . $nomeImagem;
    
        if (!move_uploaded_file($caminhoTemporario, $destino)) {
            echo json_encode(['status' => 'error', 'mensagem' => 'Erro ao mover a imagem.']);
            exit;
        }
    }

    $id = (int) $_POST['id_evento'];
    $resultado = $evento->atualizar($id);

    if ($resultado) {
        echo json_encode(['status' => 'success', 'mensagem' => 'Evento atualizado com sucesso.']);
    } else {
        echo json_encode(['status' => 'error', 'mensagem' => 'Falha ao atualizar evento.']);
    }
} else {
    echo json_encode(['status' => 'error', 'mensagem' => 'Requisição inválida.']);
}