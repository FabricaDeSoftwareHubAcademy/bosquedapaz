<?php
require_once '../vendor/autoload.php';

use app\Models\Database;

header('Content-Type: application/json; charset=utf-8');

try {
    $db = new Database('artista');

    // Fazendo JOIN com pessoa e pegando apenas os artistas (com status)
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
            IF(a.ativo = 1, 'ativo', 'inativo') AS status
        FROM artista a
        INNER JOIN pessoa p ON a.id_pessoa = p.id_pessoa
    ";

    $result = $db->execute($query)->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao listar artistas: ' . $e->getMessage()]);
}
