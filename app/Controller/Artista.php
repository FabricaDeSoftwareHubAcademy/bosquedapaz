<?php

namespace app\Controller;

require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;
use app\Controller\Pessoa;

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
    protected $status;

    // --- Setters ---
    public function setId_artista($id_artista)
    {
        $this->id_artista = $id_artista;
    }
    public function setId_pessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }
    public function setNome_artistico($nome_artistico)
    {
        $this->nome_artistico = $nome_artistico;
    }
    public function setLinguagem_artistica($linguagem_artistica)
    {
        $this->linguagem_artistica = $linguagem_artistica;
    }
    public function setEstilo_musica($estilo_musica)
    {
        $this->estilo_musica = $estilo_musica;
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
    public function setStatus($status)
    {
        $this->status = $status;
    }

    // --- Getters ---
    public function getId_artista()
    {
        return $this->id_artista;
    }
    public function getId_pessoa()
    {
        return $this->id_pessoa;
    }
    public function getNome_artistico()
    {
        return $this->nome_artistico;
    }
    public function getLinguagem_artistica()
    {
        return $this->linguagem_artistica;
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
    public function getStatus()
    {
        return $this->status;
    }

    // --- Cadastrar ---
    public function cadastrar()
    {
        $dbPessoa = new Database('pessoa');
        $pes_id = $dbPessoa->insert_lastid([
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->whats,
            'link_instagram' => $this->link_instagram,
        ]);

        if (!$pes_id) return false;

        $dbArtista = new Database('artista');
        return $dbArtista->insert([
            'id_pessoa' => $pes_id,
            'nome_artistico' => $this->nome_artistico,
            'linguagem_artistica' => $this->linguagem_artistica,
            'publico_alvo' => $this->publico_alvo,
            'tempo_apresentacao' => $this->tempo_apresentacao,
            'valor_cache' => $this->valor_cache,
            'status' => 'ativo' // aqui já usa ENUM
        ]);
    }


    // --- Listar todos os artistas com status ---
    public function listar()
    {
        try {
            $db = new Database('artista');
            $query = "
            SELECT 
                a.id_artista,
                p.nome,
                p.email,
                p.telefone,
                a.linguagem_artistica,
                a.valor_cache,
                a.tempo_apresentacao,
                a.status
            FROM artista a
            INNER JOIN pessoa p ON p.id_pessoa = a.id_pessoa
        ";

            $stmt = $db->execute($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }


    // --- Atualizar status do artista ---
    public function atualizarStatus($id_artista, $novo_status)
    {
        try {
            $db = new Database('artista');
            return $db->update('id_artista = ' . intval($id_artista), [
                'status' => $novo_status
            ]);
        } catch (\PDOException $e) {
            return false;
        }
    }
    
}
