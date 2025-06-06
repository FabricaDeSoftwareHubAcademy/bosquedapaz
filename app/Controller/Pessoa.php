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

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelefone()   
    {
        return $this->telefone;
    }

    public function getWhats()
    {
        return $this->whats;
    }
    public function getLink_instagram()
    {
        return $this->link_instagram;
    }

    public function getLink_facebook()
    {
        return $this->link_facebook;
    }

    public function getLink_whats()
    {
        return $this->link_whats;
    }

    public function getData_nasc()
    {
        return $this->data_nasc;
    }

    public function getImg_perfil()
    {
        return $this->foto_perfil;
    }

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
}
