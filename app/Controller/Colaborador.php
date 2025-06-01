<?php

namespace app\Controller;

require_once('../vendor/autoload.php');
use app\Models\Database;

class Colaborador extends Pessoa
{
    private string $cargo;
    private ?string $imagem = null;

    // Setters públicos para propriedades herdadas protegidas da Pessoa
    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setSenha(string $senha): void {
        $this->senha = $senha;
    }

    public function setPerfil(string $perfil): void {
        $this->perfil = $perfil;
    }

    // Setters para propriedades próprias
    public function setCargo(string $cargo): void {
        $this->cargo = $cargo;
    }

    public function setImagem(?string $imagem): void {
        $this->imagem = $imagem;
    }

    // Método para cadastrar o colaborador no banco
    public function cadastrar()
    {
        // Insere na tabela pessoa
        $dbPessoa = new Database('pessoa');
        $idPessoa = $dbPessoa->insert_lastid([
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'senha' => $this->senha,
            'perfil' => $this->perfil,
        ]);

        if (!$idPessoa) {
            return false; // falha na inserção da pessoa
        }

        // Insere na tabela colaborador
        $dbColab = new Database('colaborador');
        $res = $dbColab->insert([
            'cargo' => $this->cargo,
            'id_pessoa' => $idPessoa,
            'imagem' => $this->imagem
        ]);

        return $res;
    }
    
    public function buscar() {
        $dbPessoa = new Database('colaborador');
        $res = $dbPessoa->select_colaborador()->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function buscar_por_id($id) {
        $dbPessoa = new Database('colaborador');
        $res = $dbPessoa->select_colaborador('id_colaborador = ' . $id)->fetchObject();
        return $res;
    }
}
