<?php
require_once '../../Models/Database.php';

class Lista_expositor
{
    public function listar($busca = null)
    {
        $db = new Database('expositor');

        if ($busca) {
            $query = "
                SELECT 
                    e.id_expositor,
                    p.nome,
                    p.email,
                    p.telefone,
                    cat.descricao AS categoria,
                    img.imagem1,
                    img.imagem2,
                    img.imagem3,
                    img.imagem4,
                    img.imagem5
                FROM expositor e
                JOIN pessoa p ON p.id_pessoa = e.id_pessoa
                JOIN categoria cat ON cat.id_categoria = e.id_categoria
                JOIN imagem img ON img.id_imagem = e.id_imagem
                WHERE p.nome LIKE ?
            ";
            $stmt = $db->execute($query, ["%$busca%"]);
        } else {
            $query = "
                SELECT 
                    e.id_expositor,
                    p.nome,
                    p.email,
                    p.telefone,
                    cat.descricao AS categoria,
                    img.imagem1,
                    img.imagem2,
                    img.imagem3,
                    img.imagem4,
                    img.imagem5
                FROM expositor e
                JOIN pessoa p ON p.id_pessoa = e.id_pessoa
                JOIN categoria cat ON cat.id_categoria = e.id_categoria
                JOIN imagem img ON img.id_imagem = e.id_imagem
            ";
            $stmt = $db->execute($query);
        }

        if ($stmt) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return [];
    }
}
