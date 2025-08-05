<?php
session_start();
require_once '../vendor/autoload.php';

use app\Controller\Artista;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artista = new Artista();

    $artista->setNome($_POST['nome']);
    $artista->setNome_artistico($_POST['nome_artistico']);
    $artista->setEmail($_POST['email']);
    $artista->setWhats($_POST['whats']);
    $artista->setLinguagem_artistica($_POST['linguagem_artistica']);
    $artista->setEstilo_musica($_POST['estilo_musica']);
    $artista->setPublico_alvo($_POST['publico_alvo']);
    $artista->setTempo_apresentacao($_POST['tempo_apresentacao']);
    $artista->setValor_cache($_POST['valor_cache']);
    $artista->setLink_instagram($_POST['link_instagram']);


    if ($artista->cadastrar()) {
        echo json_encode(['status' => 200, 'mensagem' => 'Artista cadastrado com sucesso!']);
    } else {
        echo json_encode(['status' => 500, 'mensagem' => 'Erro ao cadastrar artista.']);
    }
} else {
    echo json_encode(['status' => 405, 'mensagem' => 'Método não permitido.']);
}
