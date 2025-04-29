<?php
require '../../Models/Database.php';

class Evento
{
    protected $id_evento;
    protected $nome_evento;
    protected $descricao;
    protected $data_evento;
    // protected $banner;

    public function getNome()
    {
        return $this->nome_evento;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getData()
    {
        return $this->data_evento;
    }

    // public function getBanner()
    // {
    //     return $this->banner;
    // }
    

    public function setNome($nome_evento){
        $this->nome_evento = $nome_evento;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function setData($data){
        $this->data = $data;
    }

    // public function setBanner($banner){
    //     $this->banner = $banner;
    // }

    public function cadastrar()
    {

        $db = new Database('evento');
        $pes_id = $db->insert_lastid(
            [
                'nome' => $this->nome,
                'descricao' => $this->descricao,
                'data' => $this->data,
                'banner' => $this->banner
            ]
        );

        return $res;
    }

    
}
