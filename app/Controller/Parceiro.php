<?php

namespace app\Controller;

require_once('../vendor/autoload.php');

use app\Models\Database;
use PDO;

class Parceiro
{
    protected $id_parceiro;
    protected $nome_parceiro;
    protected $telefone;
    protected $email;
    protected $nome_contato;
    protected $tipo;
    protected $cpf_cnpj;
    protected $logo;
    protected $id_endereco;

    public function setNome_parceiro($nome_parceiro) { $this->nome_parceiro = $nome_parceiro; }
    public function setTelefone($telefone) { $this->telefone = $telefone; }
    public function setEmail($email) { $this->email = $email; }
    public function setNome_contato($nome_contato) { $this->nome_contato = $nome_contato; }
    public function setTipo($tipo) { $this->tipo = $tipo; }
    public function setCpf_cnpj($cpf_cnpj) { $this->cpf_cnpj = $cpf_cnpj; }
    public function setLogo($logo) { $this->logo = $logo; }
    public function setId_endereco($id_endereco) { $this->id_endereco = $id_endereco; }


    public function cadastrar()
    {
        $db = new Database('parceiro');
        return $db->insert([
            'nome_parceiro' => $this->nome_parceiro,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'nome_contato' => $this->nome_contato,
            'tipo' => $this->tipo,
            'cpf_cnpj' => $this->cpf_cnpj,
            'logo' => $this->logo,
            'id_endereco' => $this->id_endereco
        ]);
    }

    public function atualizar($id)
    {
        $db = new Database('parceiro');
        return $db->update("id_parceiro = {$id}", [
            'nome_parceiro' => $this->nome_parceiro,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'nome_contato' => $this->nome_contato,
            'tipo' => $this->tipo,
            'cpf_cnpj' => $this->cpf_cnpj,
            'logo' => $this->logo,
            'id_endereco' => $this->id_endereco
        ]);
    }


    public function buscarPorId($id)
    {
        $db = new Database('parceiro');
        $res = $db->select("id_parceiro = {$id}")->fetch(PDO::FETCH_ASSOC);
        return $res;
    }


    public function listar($busca = null)
    {
        $db = new Database('parceiro');

        if ($busca) {

            return[];
        } else {
            return $db->select()->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}