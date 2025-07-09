<?php 

namespace app\Controller;
require_once('../vendor/autoload.php');
use PDO;
use app\Controller\Pessoa;
use app\Models\Database;

class Parceiro {
    public int $id_parceiro;
    public string $nome_parceiro;
    public string $telefone;
    public string $email;
    public string $nome_contato;
    public string $tipo;
    public string $cpf_cnpj;
    public string $status_parceiro;
    public string $logo;
    // public int $id_endereco;

    public function cadastrar($endereco) {

        // cadastro do endereco para pegar o id
        $db = new Database("endereco");
        $id_endereco = $db->insert_lastid([
            "cep" => $endereco->cep,
            "logradouro" => $endereco->logradouro,
            "complemento" => $endereco->complemento,
            "num_residencia" => $endereco->num_residencia,
            "bairro" => $endereco->bairro,
            "cidade" => $endereco->cidade,
            "estado" => $endereco->estado // ← Adicionado aqui
        ]);

        // cadastro do parceiro
        $db = new Database('parceiro');
        $resParceiro = $db->insert([
            'nome_parceiro' => $this->nome_parceiro,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'nome_contato' => $this->nome_contato,
            'tipo' => $this->tipo,
            'cpf_cnpj' => $this->cpf_cnpj,
            'logo' => $this->logo,
            'id_endereco' => $id_endereco
        ]);

        return $resParceiro;
    }

    public function ListarParceiros($nome) {
        if(empty($nome)) {
            $db = new Database("parceiro");
            $resParceiro = $db->listar_parceiros()->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $db = new Database("parceiro");
            $resParceiro = $db->buscar_parceiros($nome)->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $resParceiro;
    }

    public function AlterarStatusParceiro($status, $id) {
        $banco = new Database('parceiro');
        return $banco->alterar_status_parceiro($status, $id);
    }
}
