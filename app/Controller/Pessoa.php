<?php
namespace app\Controller;

require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

class Pessoa
{
    protected $id_pessoa; 
    protected $nome; 
    protected $email; 
    protected $senha; 
    protected $whats; 
    protected $telefone;
    protected $link_instagram; 
    protected $link_facebook;
    protected $link_whats;
    protected $data_nasc;
    protected $foto_perfil;
    protected $perfil;
    protected $cidade;
    protected $nvSenha;


    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setWhats($whats){
        $this->whats = $whats;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function setlink_instagram($link_instagram){
        $this->link_instagram = $link_instagram;
    }

    public function setLink_facebook($link_facebook){
        $this->link_facebook = $link_facebook;
    }

    public function setLink_whats($link_whats){
        $this->link_whats = $link_whats;
    }

    public function setData_nasc($data_nasc){
        $this->data_nasc = $data_nasc;
    }

    public function setImg_perfil($img_perfil){
        $this->foto_perfil = $img_perfil;
    }

    public function setNovaSenha($senha) {
        $this->nvSenha = $senha;
    }

public function verificar_email() {
    try {
        // Escapa corretamente para evitar problemas com caracteres especiais
        $emailSeguro = addslashes($this->email);

        $db = new Database('pessoa_user');
        $res = $db->select("email = '{$emailSeguro}'");

        $dados = $res->fetch(\PDO::FETCH_ASSOC); 

        return !empty($dados);
    } catch (\Exception $e) {
        return false;
    }
}




public function novaSenha() {
    try {
        $db = new Database('pessoa_user');
        
        // proteger contra caracteres especiais para não quebrar a query
        $emailSeguro = addslashes($this->email);
        
        $res = $db->update(
            "email = '{$emailSeguro}'", // WHERE já com email direto
            [
                "senha" => $this->nvSenha
            ]
        );
        
        return $res;
    } catch (Exception $e) {
        echo '<script>alert("Erro: ' . addslashes($e->getMessage()) . '")</script>';
        return false;
    }
}


}
