<?php
require_once '../../Models/Database.php';

class Atracao
{
    protected $id_atracao;
    protected $nome_atracao;
    protected $descricao_atracao;
    protected $foto_atracao;
    protected $id_evento;

    public function getId() {
        return $this->id_atracao;
    }

    public function getNome() {
        return $this->nome_atracao;
    }

    public function getDescricao() {
        return $this->descricao_atracao;
    }

    public function getFoto() {
        return $this->foto_atracao;
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

    public function setFoto($foto) {
        $this->foto_atracao = $foto;
    }

    public function setIdEvento($id_evento) {
        $this->id_evento = $id_evento;
    }

    public function cadastrar() {
        $db = new Database('atracao');
        $res = $db->insert([
            'nome_atracao' => $this->nome_atracao,
            'descricao_atracao' => $this->descricao_atracao,
            'foto_atracao' => $this->foto_atracao,
            'id_evento' => $this->id_evento
        ]);

        return $res;
    }

    public function listar($where = null, $order = null, $limit = null) {
        $db = new Database('atracao');
        $res = $db->select($where, $order, $limit)
                  ->fetchAll(PDO::FETCH_CLASS, self::class);

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
            'foto_atracao' => $this->foto_atracao,
            'id_evento' => $this->id_evento
        ];

        return $db->update("id_atracao = {$id}", $valores);
    }
}