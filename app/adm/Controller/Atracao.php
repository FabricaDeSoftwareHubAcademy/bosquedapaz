<?php
require '../../Models/Database.php';

class Evento
{
    protected $id_atracao;
    protected $nome_atracao;
    protected $descricao_atracao;
    protected $data_atracao;
    protected $foto_atracao;

    public function getNome() {
        return $this->nome_atracao;
    }

    public function getDescricao() {
        return $this->descricao_atracao;
    }

    public function getData() {
        return $this->data_atracao;
    }

    public function getBanner() {
        return $this->foto_atracao;
    }

    public function setNome($nome_atracao){
        $this->nome_atracao = $nome_atracao;
    }

    public function setDescricao($descricao_atracao){
        $this->descricao_atracao = $descricao_atracao;
    }

    public function setData($data_atracao){
        $this->data_atracao = $data_atracao;
    }

    public function setBanner($foto_atracao){
        $this->foto_atracao = $foto_atracao;
    }

    public function cadastrar()
{
    $db = new Database('atracao');
    $res = $db->insert([
        'nome_atracao' => $this->nome_atracao,
        'descricao_atracao' => $this->descricao_atracao,
        'data_atracao' => $this->data_atracao,
        'foto_atracao' => $this->foto_atracao
    ]);

    return $res;
}
}
