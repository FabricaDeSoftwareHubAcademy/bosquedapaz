<?php

require_once '../vendor/autoload.php';

use app\Controller\Artista;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {

    $artista = new Artista();

    // Pessoa
    $artista->setNome($_POST['nome']);
    $artista->setEmail($_POST['email']);
    $artista->setWhats($_POST['whats']);
    $artista->setLink_instagram($_POST['link_instagram']);

    // Artista
    $artista->setNome_artistico($_POST['nome_artistico']);
    $artista->setLinguagem_artistica($_POST['linguagem_artistica']);
    $artista->setEstilo_musica($_POST['estilo_musica']);
    $artista->setPublico_alvo($_POST['publico_alvo']);
    $artista->setTempo_apresentacao($_POST['tempo_apresentacao']);
    $artista->setValor_cache($_POST['valor_cache']);
    


    try {
        $resultado = $artista->cadastrar();

        if ($resultado) {
            echo "<script>alert('Artista cadastrado com sucesso!');window.location.href='form_artista.php';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar artista.');history.back();</script>";
        }
    } catch (Exception $e) {
        echo "<pre>Erro ao salvar: " . $e->getMessage() . "</pre>";
    }
}
