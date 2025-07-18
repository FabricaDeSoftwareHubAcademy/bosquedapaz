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
        $db = new Database('fotos_evento');
        return $db->select("id_evento = {$id_evento}")
                  ->fetchAll(PDO::FETCH_ASSOC);
    }


    public function buscarPorId($id) {
        $db = new Database('fotos_evento');
        return $db->select("id_foto = {$id}")
                  ->fetchObject(self::class);
    }


    public function atualizarLegenda($id) {
        $db = new Database('fotos_evento');
        return $db->update("id_foto = {$id}", [
            'legenda' => $this->legenda
        ]);
    }

    public function excluir($id) {
        $db = new Database('fotos_evento');
        return $db->delete("id_foto = {$id}");
    }
}