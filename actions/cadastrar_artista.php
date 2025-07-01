<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use app\Controller\Artista;

// Verifica se o método é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $artista = new Artista();

        // Dados da pessoa (herdados da classe Pessoa)
        $artista->setNome($_POST['nome']);
        $artista->setEmail($_POST['email']);
        $artista->setWhats($_POST['whatsapp']);
        $artista->setLink_instagram($_POST['link_instagram']);

        // Dados do artista
        $artista->setNome_artistico($_POST['nome_artistico']);
        $artista->setLinguagem_artistica($_POST['linguagem_artistica']);
        $artista->setEstilo_musica($_POST['linguagem_artistica'] === 'musica' ? $_POST['estilo_musica'] : null);
        $artista->setPublico_alvo($_POST['publico_alvo']);

        // Conversão do tempo
        $tempoMap = [
            '30min' => '00:30:00',
            '50min' => '00:50:00',
            '60min' => '01:00:00'
        ];
        $tempo = $tempoMap[$_POST['tempo_apresentacao']] ?? '00:00:00';
        $artista->setTempo_apresentacao($tempo);

        // Conversão do cache
        $cache = floatval($_POST['valor_cache']);
        $artista->setValor_cache($cache);

        // Cadastrar
        $res = $artista->cadastrar();

        if ($res) {
            echo json_encode(['status' => 'success', 'message' => 'Artista cadastrado com sucesso.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erro ao cadastrar artista.']);
        }

    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Erro inesperado: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Requisição inválida.']);
}
