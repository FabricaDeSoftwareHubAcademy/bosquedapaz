<?php 

namespace app\Controller;

require_once('../vendor/autoload.php');

use app\Models\Database;

class Parceiro {

    public int $id_parceiro;
    public string $nome_parceiro;
    public string $telefone;
    public string $email;
    public string $nome_contato;
    public string $tipo;
    public string $cpf_cnpj;
    public string $logo;

    // CADASTRAR
    public function cadastrar($endereco) {

        $db = new Database("endereco");
        $id_endereco = $db->insert_lastid([
            "cep" => $endereco->cep,
            "logradouro" => $endereco->logradouro,
            "complemento" => $endereco->complemento,
            "num_residencia" => $endereco->num_residencia,
            "bairro" => $endereco->bairro,
            "cidade" => $endereco->cidade,
            "estado" => $endereco->estado
        ]);

        $db = new Database('parceiro');
        return $db->insert([
            'nome_parceiro' => $this->nome_parceiro,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'nome_contato' => $this->nome_contato,
            'tipo' => $this->tipo,
            'cpf_cnpj' => $this->cpf_cnpj,
            'logo' => $this->logo,
            'id_endereco' => $id_endereco
        ]);
    }

    // LISTAR TODOS OS PARCEIROS
    public function listar()
    {
        $db = new Database('parceiro');
        return $db->select('id_parceiro, nome_parceiro, telefone, email, nome_contato, status')->fetchAll(\PDO::FETCH_ASSOC);
    }    

    // BUSCAR POR NOME (usado no campo de busca)
    public function buscarPorNome(string $termo = '')
    {
        $db = new Database('parceiro');

        if ($termo !== '') {
            $query = "SELECT id_parceiro, nome_parceiro, telefone, email, nome_contato, status 
                    FROM parceiro 
                    WHERE nome_parceiro LIKE :termo";

            return $db->executeQuery($query, ['termo' => '%' . $termo . '%'])->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return $this->listar();
        }
    }

}
