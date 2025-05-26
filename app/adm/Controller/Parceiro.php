<?php 

require '../../Models/Database.php';

class Parceiro {
    public int $id_parceiro;
    public string $nome_parceiro;
    public string $telefone;
    public string $email;
    public string $nome_contato;
    public string $tipo;
    public string $cpf_cnpj;
    public string $logo;
    public ?int $id_endereco; 

    public function cadastrar() {
        $dbParceiro = new Database('parceiro');

        $resParceiro = $dbParceiro->insert([
            'nome_parceiro' => $this->nome_parceiro,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'nome_contato' => $this->nome_contato,
            'tipo' => $this->tipo,
            'cpf_cnpj' => $this->cpf_cnpj,
            'logo' => $this->logo,
            'id_endereco' => $this->id_endereco
        ]);

        return $resParceiro;
    }

}

?>
