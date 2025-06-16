<?php

namespace app\Controller;
require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

class FotosEvento
{
    protected $id_foto;
    protected $id_evento;
    protected $caminho;
    protected $legenda;

    // Getters
    public function getId() {
        return $this->id_foto;
    }

    public function getIdEvento() {
        return $this->id_evento;
    }

    public function getCaminho() {
        return $this->caminho;
    }

    public function getLegenda() {
        return $this->legenda;
    }

    // Setters
    public function setIdEvento($id_evento) {
        $this->id_evento = $id_evento;
    }

    public function setCaminho($caminho) {
        $this->caminho = $caminho;
    }

    public function setLegenda($legenda) {
        $this->legenda = $legenda;
    }


    public function cadastrar() {
        $db = new Database('fotos_evento');
        return $db->insert([
            'id_evento' => $this->id_evento,
            'caminho' => $this->caminho,
            'legenda' => $this->legenda
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