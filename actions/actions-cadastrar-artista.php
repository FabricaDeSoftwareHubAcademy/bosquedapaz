<?php
// Define que a resposta será em JSON
header('Content-Type: application/json');

// Opcional: Ativar exibição de erros durante o desenvolvimento
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use app\Controller\Artista;

// Verifica se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $artista = new Artista();

        $artista->setNome($_POST['nome'] ?? '');
        $artista->setEmail($_POST['email'] ?? '');
        $artista->setWhats($_POST['whats'] ?? '');
        $artista->setLink_instagram($_POST['link_instagram'] ?? '');

        $artista->setNome_artistico($_POST['nome_artistico'] ?? '');
        $artista->setLinguagem_artistica($_POST['linguagem_artistica'] ?? '');
        $artista->setEstilo_musica($_POST['estilo_musica'] ?? '');
        $artista->setPublico_alvo($_POST['publico_alvo'] ?? '');
        $artista->setTempo_apresentacao($_POST['tempo_apresentacao'] ?? '');
        $artista->setValor_cache($_POST['valor_cache'] ?? '');

        $resultado = $artista->cadastrar();

        if ($resultado) {
            echo json_encode([
                'status' => 200,
                'message' => 'Cadastro realizado com sucesso.'
            ]);
        } else {
            echo json_encode([
                'status' => 500,
                'message' => 'Erro ao cadastrar.'
            ]);
        }

    } catch (Exception $e) {
        // Se ocorrer alguma exceção, retorna erro
        echo json_encode([
            'status' => 500,
            'message' => 'Erro no servidor.',
            'erro' => $e->getMessage()
        ]);
    }

    exit;
}

// Requisição não permitida
echo json_encode([
    'status' => 405,
    'message' => 'Método não permitido.'
]);
exit;
