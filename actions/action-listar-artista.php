<?php
require_once '../vendor/autoload.php';

use app\Models\Database;

header('Content-Type: application/json; charset=utf-8');

try {
    $db = new Database('artista');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $query = "
            SELECT 
                a.id_artista,
                p.nome,
                p.email,
                p.telefone,
                a.nome_artistico,
                a.linguagem_artistica,
                a.tempo_apresentacao,
                a.valor_cache,
                a.status
            FROM artista a
            INNER JOIN pessoa p ON a.id_pessoa = p.id_pessoa
        ";

        $result = $db->execute($query)->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['id_artista']) || !isset($data['novo_status'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Dados incompletos.']);
            exit;
        }

        $id = (int) $data['id_artista'];
        $status = $data['novo_status'] === 'ativo' ? 'ativo' : 'inativo';

        $query = "UPDATE artista SET status = :status WHERE id_artista = :id";

        $db->execute($query, [
            ':status' => $status,
            ':id' => $id
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
