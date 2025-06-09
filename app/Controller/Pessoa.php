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
    protected $img_perfil;
    protected $perfil;
    protected $nvSenha;
    

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setNovaSenha($senha) {
        $this->nvSenha = $senha;
    }

public function verificar_email() {
    $db = new Database('pessoa');
    $res = $db->select("email = '{$this->email}'");

    $dados = $res->fetch(\PDO::FETCH_ASSOC); 

    if ($dados) {
        return true;
    } else {
        return false;
    }
}


    public function novaSenha() {
        $db = new Database('pessoa');
        $res = $db->update("email = '{$this->email}'", [
            "senha" => $this->nvSenha,
        ]);
        return $res;
    }
}