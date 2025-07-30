<?php
session_start();
require_once '../vendor/autoload.php';

use app\Controller\Artista;
use app\Models\Database;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];

    try {
        $db = new Database('pessoa');

        $artista = new Artista();

        $artista->setNome($_POST['nome']);
        $artista->setEmail($email);
        $artista->setWhats($_POST['whats']);
        $artista->setLink_instagram($_POST['link_instagram']);
        $artista->setAceitou_termos($_SESSION['aceitou_termos' ?? 'Não']);

        $artista->setNome_artistico($_POST['nome_artistico']);
        $artista->setLinguagem_artistica($_POST['linguagem_artistica']);
        $artista->setEstilo_musica($_POST['estilo_musica']);
        $artista->setPublico_alvo($_POST['publico_alvo']);
        $artista->setTempo_apresentacao($_POST['tempo_apresentacao']);
        $artista->setValor_cache($_POST['valor_cache']);

        $resultado = $artista->cadastrar();

        if ($resultado) {
            echo json_encode([
                'status' => 200,
                'mensagem' => 'Artista cadastrado com sucesso!'
            ]);
        } else {
            echo json_encode([
                'status' => 500,
                'mensagem' => 'Erro ao cadastrar artista.'
            ]);
        }

    } catch (Exception $e) {
        echo json_encode([
            'status' => 500,
            'mensagem' => 'Erro no servidor: ' . $e->getMessage()
        ]);
    }

} else {
    echo json_encode([
        'status' => 405,
        'mensagem' => 'Método não permitido.'
    ]);
}
