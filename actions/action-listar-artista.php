<?php
require_once '../vendor/autoload.php';

use app\Controller\Artista;


header('Content-Type: application/json; charset=utf-8');

try {
    $controller = new Artista();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo json_encode($controller->listar());
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);

        if (empty($data['id_artista']) || empty($data['novo_status'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Dados incompletos.']);
            exit;
        }

        $id = (int) $data['id_artista'];
        $status = $data['novo_status'] === 'ativo' ? 'ativo' : 'inativo';

        $db = new \app\Models\Database('artista');
        $db->execute("UPDATE artista SET status = :status WHERE id_artista = :id", [
            ':status' => $status,
            ':id' => $id,
        ]);

        echo json_encode(['success' => true, 'novo_status' => $status]);
        exit;
    }

    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido.']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro no servidor: ' . $e->getMessage()]);
}
