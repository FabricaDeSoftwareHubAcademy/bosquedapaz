<?php
require_once('../vendor/autoload.php');

use app\Controller\Artista;

header('Content-Type: application/json');

function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Lista de campos obrigatórios
        $required = [
            'nome' => 'Nome completo',
            'whatsapp' => 'WhatsApp',
            'email' => 'E-mail',
            'nome_artistico' => 'Nome artístico',
            'linguagem_artistica' => 'Linguagem artística',
            'publico_alvo' => 'Público alvo',
            'tempo_apresentacao' => 'Tempo de apresentação',
            'valor_cache' => 'Valor do cachê'
        ];

        $missing = [];
        foreach ($required as $field => $label) {
            if (empty($_POST[$field])) {
                $missing[] = $label;
            }
        }

        if (!empty($missing)) {
            http_response_code(400);
            echo json_encode([
                'status' => 400,
                'msg' => 'Campos obrigatórios faltando: ' . implode(', ', $missing)
            ]);
            exit;
        }

        // Instancia e seta dados do artista
        $artista = new Artista();

        $artista->setNome(sanitizeInput($_POST['nome']));
        $artista->setWhats(sanitizeInput($_POST['whatsapp']));
        $artista->setEmail(sanitizeInput($_POST['email']));
        $artista->setLink_instagram(sanitizeInput($_POST['link_instagram'] ?? ''));

        $artista->setNome_artistico(sanitizeInput($_POST['nome_artistico']));
        $artista->setLinguagem_artistica(sanitizeInput($_POST['linguagem_artistica']));

        if ($_POST['linguagem_artistica'] === 'musica' && !empty($_POST['estilo_musica'])) {
            $artista->setEstilo_musica(sanitizeInput($_POST['estilo_musica']));
        }

        $artista->setPublico_alvo(sanitizeInput($_POST['publico_alvo']));
        $artista->setTempo_apresentacao(sanitizeInput($_POST['tempo_apresentacao']));
        $artista->setValor_cache(floatval($_POST['valor_cache']));

        // Tenta cadastrar
        if ($artista->cadastrar()) {
            echo json_encode([
                'status' => 200,
                'msg' => 'Artista cadastrado com sucesso!',
                'redirect' => 'lista_artistas.php'
            ]);
        } else {
            throw new Exception("Erro ao salvar no banco de dados. Por favor, tente novamente.");
        }

    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode([
            'status' => 500,
            'msg' => $e->getMessage()
        ]);
    }
} else {
    http_response_code(405);
    echo json_encode([
        'status' => 405,
        'msg' => 'Método não permitido. Use POST.'
    ]);
}
