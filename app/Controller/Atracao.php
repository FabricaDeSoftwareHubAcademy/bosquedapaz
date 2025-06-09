<?php

namespace app\Controller;
require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

class Atracao
{
    protected $id_atracao;
    protected $nome_atracao;
    protected $descricao_atracao;
    protected $banner_atracao;
    protected $id_evento;
    protected $status;

    public function getId() {
        return $this->id_atracao;
    }

    public function getNome() {
        return $this->nome_atracao;
    }

    public function getDescricao() {
        return $this->descricao_atracao;
    }

    public function getBanner() {
        return $this->banner_atracao;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getIdEvento() {
        return $this->id_evento;
    }

    public function setNome($nome) {
        $this->nome_atracao = $nome;
    }

    public function setDescricao($descricao) {
        $this->descricao_atracao = $descricao;
    }

    public function setBanner($banner_atracao) {
        $this->banner_atracao = $banner_atracao;
    }

    public function setIdEvento($id_evento) {
        $this->id_evento = $id_evento;
    }

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
            'id_evento' => $this->id_evento
        ];

        return $db->update("id_atracao = {$id}", $valores);
    }
}