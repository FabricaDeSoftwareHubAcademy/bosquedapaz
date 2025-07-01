<?php
header('Content-Type: application/json');

require_once '../vendor/autoload.php';

use app\Controller\Artista;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artista = new Artista();

    $artista->setNome($_POST['nome']);
    $artista->setEmail($_POST['email']);
    $artista->setWhats($_POST['whats']);
    $artista->setLink_instagram($_POST['link_instagram']);

    $artista->setNome_artistico($_POST['nome_artistico']);
    $artista->setLinguagem_artistica($_POST['linguagem_artistica']);
    $artista->setEstilo_musica($_POST['estilo_musica'] ?? '');
    $artista->setPublico_alvo($_POST['publico_alvo']);
    $artista->setTempo_apresentacao($_POST['tempo_apresentacao']);
    $artista->setValor_cache($_POST['valor_cache']);

    $resultado = $artista->cadastrar();

    if ($resultado) {
        echo json_encode(['status' => 200, 'message' => 'Sucesso']);
    } else {
        echo json_encode(['status' => 500, 'message' => 'Erro ao cadastrar']);
    }
    exit;
}

echo json_encode(['status' => 405, 'message' => 'Método não permitido']);
