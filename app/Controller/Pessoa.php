<?php
namespace app\Controller;
require_once('../vendor/autoload.php');

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
    

    public function novaSenha($nvSenha){
        $db = new Database('pessoa');
         
    }
}
