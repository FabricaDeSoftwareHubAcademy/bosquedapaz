<?php

namespace app\Controller;

require_once('../vendor/autoload.php');


use PDO;
use app\Controller\Pessoa;
use app\Models\Database;        


class Artista extends Pessoa
{
    protected $id_artista;
    protected $id_pessoa;
    protected $nome_artistico;
    protected $linguagem_artistica;
    protected $estilo_musica;
    protected $publico_alvo;
    protected $tempo_apresentacao;
    protected $valor_cache;


    public function setId_artista($id_artista)
    {
        $this->id_artista = $id_artista;
    }

    public function setLinguagem_artistica($linguagem_artistica)
    {
        $this->linguagem_artistica = $linguagem_artistica;
    }

    public function setId_pessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }
    public function setEstilo_musica($estilo_musica)
    {
        $this->estilo_musica = $estilo_musica;
    }
    public function setNome_artistico($nome_artistico)
    {
        $this->nome_artistico = $nome_artistico;
    }

    public function setPublico_alvo($publico_alvo)
    {
        $this->publico_alvo = $publico_alvo;
    }

    public function setTempo_apresentacao($tempo_apresentacao)
    {
        $this->tempo_apresentacao = $tempo_apresentacao;
    }
    public function setValor_cache($valor_cache)
    {
        $this->valor_cache = $valor_cache;
    }

    /////////////// get


    public function getId_artista()
    {
        return $this->id_artista;
    }

    public function getd_pessoa()
    {
        return $this->id_pessoa;
    }
    public function getLinguagem_artistica()
    {
        return $this->linguagem_artistica;
    }
    public function getNome_artistico()
    {
        return $this->nome_artistico;
    }
    
    public function getEstilo_musica()
    {
        return $this->estilo_musica;
    }

    public function getPublico_alvo()
    {
        return $this->publico_alvo;
    }
    public function getTempo_apresentacao()
    {
        return $this->tempo_apresentacao;
    }
    public function getValor_cache()
    {
        return $this->valor_cache;
    }

    public function cadastrar()
    {
        
        $db = new Database('pessoa');
        $pes_id = $db->insert_lastid([
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->whats,
            'link_instagram' => $this->link_instagram,
        ]);
    

        $db = new Database('artista');
        $res = $db->insert([
            'id_pessoa' => $pes_id, 
            'nome_artistico' => $this->nome_artistico,
            'linguagem_artistica' => $this->linguagem_artistica,
            'estilo_musica' => $this->estilo_musica,
            'publico_alvo' => $this->publico_alvo,
            'tempo_apresentacao' => $this->tempo_apresentacao,
            'valor_cache' => $this->valor_cache,
        ]);
    
        return $res;

        
    }
    
}
