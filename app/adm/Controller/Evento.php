<?php
require '../../Models/Database.php';

class Evento
{
    protected $id_evento;
    protected $nome_evento;
    protected $descricao;
    protected $data_evento;
    protected $banner;

    public function getId() {
        return $this->id_evento;
    }
    
    public function getNome() {
        return $this->nome_evento;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getData() {
        return $this->data_evento;
    }

    public function getBanner() {
        return $this->banner;
    }

    public function setNome($nome_evento){
        $this->nome_evento = $nome_evento;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function setData($data){
        $this->data_evento = $data;
    }

    public function setBanner($banner){
        $this->banner = $banner;
    }

    public function cadastrar()
    {
        $db = new Database('evento');
        $res = $db->insert([
            'nome_evento' => $this->nome_evento,
            'descricao' => $this->descricao,
            'data_evento' => $this->data_evento,
            'banner' => $this->banner
        ]);

        return $res;
    }

    public function listar($where = null,$order = null,$limit = null){
        $db = new Database('evento');
        $res = $db->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        
        return $res;
    }
}
