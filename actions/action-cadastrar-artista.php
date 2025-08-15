<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once '../vendor/autoload.php';
require_once('../app/helpers/login.php');

use app\Controller\Artista;
use app\Models\Database;
use app\suport\Csrf;

header('Content-Type: application/json');

function linkInstagram($ins) {
    return 'https://instagram.com/' . trim($ins, '@');
}

if (isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])) {

    $email = htmlspecialchars(strip_tags($_POST['email']));

    try {
        $artista = new Artista();

        $emailExiste = $artista->emailExiste($email); 
        if ($emailExiste) {
            echo json_encode([
                'status' => 400,
                'mensagem' => 'Não é possível cadastrar, e-mail existente.'
            ]);
            http_response_code(400);
            exit;
        }

        $dadosUsuario = obterLogin();
        if ($dadosUsuario['sucess']) {
            $idAdmin = $dadosUsuario["jwt"]->perfil;
            if ($idAdmin === 1) {
                $artista->setAceitou_termos("Sim");
            } else {
                $artista->setAceitou_termos($_SESSION['aceitou_termos'] ?? 'Não');
            }
        } else {
            $artista->setAceitou_termos($_SESSION['aceitou_termos'] ?? 'Não');
        }

        $artista->setNome($_POST['nome']);
        $artista->setEmail($email);
        $artista->setWhats($_POST['whats']);
        $linkInstaLimpo = htmlspecialchars(strip_tags($_POST['link_instagram']));
        $artista->setLink_instagram(linkInstagram($linkInstaLimpo));
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
