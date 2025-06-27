<?php

namespace app\Controller;

require_once('../vendor/autoload.php');

use PDO;
use app\Controller\Pessoa;
use app\Models\Database;
use app\Controller\Imagem;


class Expositor extends Pessoa
{

    protected $id_expositor;
    protected $id_pessoa;
    protected $id_categoria;
    // protected $id_imagem;
    protected $nome_marca;
    protected $num_barraca;
    protected $voltagem;
    protected $energia;
    protected $contato2;
    protected $descricao;
    protected $metodos_pgto;
    protected $cor_rua;
    protected $responsavel;
    protected $produto;
    protected $imagens;


    public function setId_expositor($id_expositor)
    {
        $this->id_expositor = $id_expositor;
    }

    public function setImagens($imagens)
    {
        $this->imagens = $imagens;
    }

    public function setId_pessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }
    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }

    public function setNome_marca($nome_marca)
    {
        $this->nome_marca = $nome_marca;
    }

    public function setEnergia($energia)
    {
        $this->energia = $energia;
    }
    public function setVoltagem($voltagem)
    {
        $this->voltagem = $voltagem;
    }
    public function setContato2($contato2)
    {
        $this->contato2 =  $contato2;
    }
    public function setNum_barraca($num_barraca)
    {
        $this->num_barraca = $num_barraca;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function setMetodos_pgto($metodos_pgto)
    {
        $this->metodos_pgto =  $metodos_pgto;
    }
    public function setCor_rua($cor_rua)
    {
        $this->cor_rua = $cor_rua;
    }
    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;
    }
    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    public function getId_expositor()
    {
        return $this->id_expositor;
    }

    public function getd_pessoa()
    {
        return $this->id_pessoa;
    }
    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    public function getNome_marca()
    {
        return $this->nome_marca;
    }

    public function getEnergia()
    {
        return $this->energia;
    }
    public function getVoltagem()
    {
        return $this->voltagem;
    }
    public function getContato2()
    {
        return $this->contato2;
    }
    public function getNum_barraca()
    {
        return $this->num_barraca;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getMetodos_pgto()
    {
        return $this->metodos_pgto;
    }
    public function getCor_rua()
    {
        return $this->cor_rua;
    }
    public function getResponsavel()
    {
        return $this->responsavel;
    }
    public function getProduto()
    {
        return $this->produto;
    }

    public function geradorSenha(){
        $tamanhoSenha = 10;
     
        $caracteresPermitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
     
        $senha = '';
        for ($i = 0; $i < $tamanhoSenha; $i++) {
        $senha .= $caracteresPermitidos[rand(0, strlen($caracteresPermitidos) - 1)];
        }
    
        return $senha;
    }

    public function cadastrar()
    {

        $senha = $this->geradorSenha();
        
        $db = new Database('pessoa');
        $pes_id = $db->insert_lastid([
                'nome' => $this->nome,
                'email' => $this->email,
                'telefone' => $this->whats,
                'senha' => password_hash($senha, PASSWORD_DEFAULT),
                'perfil' => 1,
            ]
        );



        $db = new Database('imagem');
        $img_id = $db->insert_lastid([
            'caminho' => '../caminho/imagem.jpg',
            'posicao' => '',
            'id_expositor' => 4
        ]);


        $db = new Database('expositor');
        $res = $db->insert(
            [
                'id_expositor' => $this->id_expositor,
                'id_pessoa' => $pes_id,
                'id_categoria' => $this->id_categoria,
                'nome_marca' => $this->nome_marca,
                'num_barraca' => $this->num_barraca,
                'voltagem' => $this->voltagem,
                'energia' => $this->energia,
                'contato2' => $this->contato2,
                'descricao' => $this->descricao,
                'metodos_pgto' => $this->metodos_pgto,
                'cor_rua' => $this->cor_rua,
                'responsavel' => $this->responsavel,
                'produto' => $this->produto
            ]
        );
        return $res;
    }
    
    public function filtrar_exp($filtro){
        if (!empty($filtro)){
            $db = new Database('expositor');

            $filtrar = $db->filter_exp($filtro)->fetchAll(PDO::FETCH_ASSOC);

            return $filtrar;
        }else {
            return FALSE;
        }
    }
    public function filtrar_exp_categoria($cat){
        if (!empty($cat)){
            $db = new Database('expositor');

            $buscar_cat = $db->select_exp_catgoria($cat)->fetchAll(PDO::FETCH_ASSOC);

            return $buscar_cat;
        }else {
            return FALSE;
        }
    }

    public function listar($id = null)
    {
        if (empty($id)){
            $db = new Database('expositor');

            $buscar = $db->select_exp()->fetchAll(PDO::FETCH_ASSOC);

            return $buscar;
        }else {
            $db = new Database('expositor');
            $imagem = new Imagem();

            $buscar_img = $imagem->listar($id)->fetchAll(PDO::FETCH_ASSOC);

            $buscar_id = $db->select_exp('id_expositor = '.$id)->fetch(PDO::FETCH_ASSOC);

            $buscar_id['imagens'] = $buscar_img;
            return $buscar_id;
        }
    }
}