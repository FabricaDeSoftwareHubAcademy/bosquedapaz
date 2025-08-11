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
    protected $aceitou_termos;

    // --- Setters ---
    public function setId_artista($id_artista)
    {
        $this->id_artista = $id_artista;
    }
    public function setId_pessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }
    public function setNome_artistico($nome_artistico) {
    $nome_artistico = trim($nome_artistico);
    if (empty($nome_artistico) || strlen($nome_artistico) > 100) {
        throw new \InvalidArgumentException("Nome artístico inválido");
    }
    $this->nome_artistico = htmlspecialchars(strip_tags($nome_artistico));
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
    public function setValor_cache($valor_cache) {
    if (!is_numeric($valor_cache) || $valor_cache < 0) {
        throw new \InvalidArgumentException("Valor do cachê inválido");
    }
    $this->valor_cache = (float)$valor_cache;
}
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setAceitou_termos($aceitou_termos)
    {
        $this->aceitou_termos = $aceitou_termos;
    }

    public function setEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new \InvalidArgumentException("Email inválido");
    }
    $this->email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
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
    public function cadastrar() {
        // Validações de entrada
        if (empty($this->nome) || strlen($this->nome) > 100) {
            throw new \InvalidArgumentException("Nome inválido");
        }
        
        if (empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Email inválido");
        }
        
        if (empty($this->nome_artistico) || strlen($this->nome_artistico) > 100) {
            throw new \InvalidArgumentException("Nome artístico inválido");
        }
        
        // Sanitização
        $this->nome = htmlspecialchars(strip_tags(trim($this->nome)));
        $this->email = filter_var(trim($this->email), FILTER_SANITIZE_EMAIL);
        $this->nome_artistico = htmlspecialchars(strip_tags(trim($this->nome_artistico)));
        
        $this->aceitou_termos = $_SESSION['aceitou_termos'] ?? 'Não';

        $dbPessoa = new Database('pessoa');
        $pes_id = $dbPessoa->insert_lastid([
            'nome' => $this->nome,
            'telefone' => $this->whats,
            'link_instagram' => $this->link_instagram,
            'termos' => $this->aceitou_termos
        ]);

        if (!$pes_id) return false;

        $dbArtista = new Database('artista');
        return $dbArtista->insert([
            'id_pessoa' => $pes_id,
            'email' => $this->email,
            'nome_artistico' => $this->nome_artistico,
            'linguagem_artistica' => $this->linguagem_artistica,
            'publico_alvo' => $this->publico_alvo,
            'tempo_apresentacao' => $this->tempo_apresentacao,
            'valor_cache' => $this->valor_cache,
            'status' => 'ativo'
        ]);
    }


    public function listar() {
        $db = new Database('artista');

        $query = "SELECT * FROM artista";
        $artistas = $db->execute($query)->fetchAll(PDO::FETCH_ASSOC);

        $resultado = [];

        foreach ($artistas as $artista) {
            $pessoa = $db->execute(
                "SELECT nome, telefone FROM pessoa WHERE id_pessoa = ?",
                [$artista['id_pessoa']]
            )->fetch(PDO::FETCH_ASSOC);

            $resultado[] = [
                'id_artista'          => $artista['id_artista'],
                'nome'                => $pessoa['nome'] ?? '',
                'email'               => $artista['email'], 
                'telefone'            => $pessoa['telefone'] ?? '',
                'linguagem_artistica' => $artista['linguagem_artistica'],
                'valor_cache'         => $artista['valor_cache'],
                'tempo_apresentacao'  => $artista['tempo_apresentacao'],
                'status'              => $artista['status']
            ];
        }

        return $resultado;
    }
    



    public function atualizarStatus($id_artista, $novo_status) {
        // Validação de entrada
        if (!is_numeric($id_artista) || $id_artista <= 0) {
            return false;
        }
        
        $statusPermitidos = ['ativo', 'inativo', 'pendente'];
        if (!in_array($novo_status, $statusPermitidos)) {
            return false;
        }
        
        $db = new Database('artista');
        $query = "UPDATE artista SET status = ? WHERE id_artista = ?";
        $stmt = $db->execute($query, [$novo_status, (int)$id_artista]);
        return $stmt->rowCount() > 0;
    }
}
