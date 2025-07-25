<?php

namespace app\Controller;
require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

class Atracao
{
    public int $id_atracao;
    public string $nome_atracao;
    public string $descricao_atracao;
    public string $banner_atracao;
    public int $id_evento;
    public int $status;

    public function cadastrar() {
        $db = new Database('atracao');
        $res = $db->insert([
            'nome_atracao' => $this->nome_atracao,
            'descricao_atracao' => $this->descricao_atracao,
            'banner_atracao' => $this->banner_atracao,
            'id_evento' => $this->id_evento
        ]);

        return $res;
    }

    public function listar($where = null, $order = null, $limit = null) {
        $db = new Database('atracao');
        $res = $db->select($where, $order, $limit)
                    ->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public function buscarPorNome($nome) {
        $db = new Database('atracao');
        $res = $db->select("nome_atracao = {$nome}")
                  ->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public function buscarPorId($id) {
        $db = new Database('atracao');
        $res = $db->select("id_atracao = {$id}")
                  ->fetchObject(self::class);

        return $res;
    }

    public function atualizar($id) {
        $db = new Database('atracao');

        $valores = [
            'nome_atracao' => $this->nome_atracao,
            'descricao_atracao' => $this->descricao_atracao,
            'banner_atracao' => $this->banner_atracao,
            'id_evento' => $this->id_evento,
            'status' => $this->status
        ];

        return $db->update("id_atracao = {$id}", $valores);
    }
}