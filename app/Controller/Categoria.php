<?php

namespace app\Controller;
require_once('../vendor/autoload.php');
use PDO;
use app\Models\Database;

class Categoria
{
    // --- PROPRIEDADES DA CLASSE ---
    private int $id_categoria;
    private string $descricao;
    private string $cor;
    private string $icone;

    // --- MÉTODOS DE ACESSO AO BANCO DE DADOS (JÁ EXISTENTES) ---

    public function cadastrar()
    {
        $db = new Database('categoria');
        $res = $db->insert([
            'descricao' => $this->descricao,
            'cor' => $this->cor,
            'icone' => $this->icone,
        ]);
        return $res;
    }

    public function listar($where = null, $order = null, $limit = null)
    {
        $db = new Database('categoria');
        // Alterado para fetchAll(PDO::FETCH_CLASS), que funciona melhor com propriedades privadas e setters
        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function buscarPorId($id)
    {
        $db = new Database('categoria');
        // O ideal é renomear 'listar_por_id' para 'buscarPorId' para consistência
        $res = $db->select('id_categoria = ' . $id)->fetchObject(self::class);
        return $res;
    }

    public function atualizar($id) // Recebe o ID como parâmetro
    {
        $db = new Database('categoria');
        $res = $db->update(
            'id_categoria = ' . $id, // Usa o ID recebido
            [
                'descricao' => $this->descricao,
                'cor' => $this->cor,
                'icone' => $this->icone,
            ]
        );
        return $res;
    }

    public function excluir()
    {
        $db = new Database('categoria');
        $res = $db->delete('id_categoria = ' . $this->id_categoria);
        return $res;
    }

    // --- MÉTODOS GETTERS E SETTERS ADICIONADOS ---

    /**
     * Getters - Métodos para OBTER o valor de uma propriedade
     */
    public function getId(): int
    {
        return $this->id_categoria;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getCor(): string
    {
        return $this->cor;
    }

    public function getIcone(): string
    {
        return $this->icone ?? ''; // Retorna string vazia se for nulo
    }

    /**
     * Setters - Métodos para DEFINIR o valor de uma propriedade
     */
    public function setId(int $id)
    {
        $this->id_categoria = $id;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function setCor(string $cor)
    {
        $this->cor = $cor;
    }

    public function setIcone(string $icone)
    {
        $this->icone = $icone;
    }
}