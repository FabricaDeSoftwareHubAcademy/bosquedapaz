<?php

namespace app\Controller;

require_once('../vendor/autoload.php');

use app\Models\Database;
use app\Controller\Pessoa;

class Artista extends Pessoa
{
    protected $nome_artistico;
    protected $linguagem_artistica;
    protected $estilo_musica;
    protected $publico_alvo;
    protected $tempo_apresentacao;
    protected $valor_cache;
    protected $email;

    // setters simples
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
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setWhats($whats)
    {
        $this->whats = $whats;
    }

    public function cadastrar()
    {
        // INSERIR PESSOA
        $dbPessoa = new Database('pessoa');
        $pes_id = $dbPessoa->insert_lastid([
            'nome' => $this->nome,
            'whats' => $this->whats,
            'link_instagram' => $this->link_instagram ?? null,
            'termos' => 'Sim'
        ]);
        if (!$pes_id) return false;

        // INSERIR ARTISTA
        $dbArtista = new Database('artista');
        return $dbArtista->insert([
            'id_pessoa' => $pes_id,
            'email' => $this->email,
            'nome_artistico' => $this->nome_artistico,
            'linguagem_artistica' => $this->linguagem_artistica,
            'tempo_apresentacao' => $this->tempo_apresentacao,
            'valor_cache' => floatval($this->valor_cache),
            'publico_alvo' => $this->publico_alvo,
            'status' => 'ativo'
        ]);
    }
}
