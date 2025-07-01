<?php
require_once('../vendor/autoload.php');


use app\Controller\Artista;

header('Content-Type: application/json');

try {
    $artista = new Artista();

    $artista->setNome($_POST['nome']);
    $artista->setEmail($_POST['email']);
    $artista->setWhats($_POST['whats']);
    $artista->setLink_instagram($_POST['link_instagram']);
    $artista->setNome_artistico($_POST['nome_artistico']);
    $artista->setLinguagem_artistica($_POST['linguagem_artistica']);
    $artista->setEstilo_musica($_POST['estilo_musica'] ?? null);
    $artista->setPublico_alvo($_POST['publico_alvo']);
    $artista->setTempo_apresentacao($_POST['tempo_apresentacao']);
    $artista->setValor_cache($_POST['valor_cache']);

    $res = $artista->cadastrar();

    echo json_encode([
        'status' => $res ? 'success' : 'error',
        'message' => $res ? null : 'Erro ao cadastrar artista'
    ]);
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
