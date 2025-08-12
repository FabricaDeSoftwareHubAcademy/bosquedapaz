<?php

namespace app\Controller;
require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

class FotosEvento
{
    public int $id_foto;
    public int $id_evento;
    public string $caminho;
    public string $legenda;


    public function cadastrar() {
        $db = new Database('fotos_evento');
        return $db->insert([
            'id_evento' => $this->id_evento,
            'caminho_foto_evento' => $this->caminho,
            'legenda_foto_evento' => $this->legenda
        ]);
    }

    public function listarPorEvento($id_evento) {
        if (!is_numeric($id_evento) || $id_evento <= 0) {
            throw new \InvalidArgumentException("ID do evento inválido");
        }
        
        $db = new Database('fotos_evento');
        $query = "SELECT * FROM fotos_evento WHERE id_evento = ?";
        return $db->execute($query, [(int)$id_evento])->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $db = new Database('fotos_evento');
        $query = "SELECT * FROM fotos_evento WHERE id_foto = ?";
        return $db->execute($query, [$id])->fetchObject(self::class);
    }

    public function atualizarLegenda($id) {
        $db = new Database('fotos_evento');
        $query = "UPDATE fotos_evento SET legenda_foto_evento = ? WHERE id_foto = ?";
        return $db->execute($query, [$this->legenda, $id]);
    }

    public function excluir($id) {
        $db = new Database('fotos_evento');
        $query = "DELETE FROM fotos_evento WHERE id_foto = ?";
        $stmt = $db->execute($query, [$id]);
        return $stmt->rowCount() > 0;
    }
}