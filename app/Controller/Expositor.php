<?php

namespace app\Controller;

require_once('../vendor/autoload.php');


use PDO;
use app\Controller\Pessoa;
use app\Models\Database;


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


    public function setId_expositor($id_expositor)
    {
        $this->id_expositor = $id_expositor;
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


    public function cadastrar()
    {

        $db = new Database('pessoa');
        $pes_id = $db->insert_lastid(
            [
                'nome' => $this->nome,
                'email' => $this->email,
                'telefone' => $this->whats,
                'perfil' => 1,
            ]
        );

        if (!empty($pes_id)) {

            $db = new Database('expositor');
            $res = $db->insert_lastid(
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
        } else {
            return false;
        }
    }

   

    public function listar($busca = null)
    {
        $db = new Database('expositor');

        if ($busca) {
            $res = $db->filtrar_expositor($busca)->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } else {
            $res = $db->select_expositor()->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
    }

    public function atualizar($id)
    {
        $values1 = [
            'nome' => $this->nome,
            'email' => $this->email,
            'whats' => $this->whats,
            'telefone' => $this->telefone,
            'link_instagram' => $this->link_instagram,
            'link_facebook' => $this->link_facebook,
            'link_whats' => $this->link_whats,
            'img_perfil' => $this->foto_perfil,
        ];

        $db = new Database('expositor');

        $res = $db->update_pai('id_expositor = ' . $id, $values1, 'pessoa');

        if ($res) {
            $db = new Database('expositor');

            $values2 = [
                'nome_marca' => $this->nome_marca,
                'id_categoria' => $this->id_categoria,
                'num_barraca' => $this->num_barraca,
                'voltagem' => $this->voltagem,
                'energia' => $this->energia,
                'contato2' => $this->contato2,
                'descricao' => $this->descricao,
                'metodos_pgto' => $this->metodos_pgto,
                'cor_rua' => $this->cor_rua,
                'responsavel' => $this->responsavel,
                'produto' => $this->produto,
            ];

            $res = $db->update('id_expositor = ' . $id, $values2);
            return $res;
        }
    }
}
