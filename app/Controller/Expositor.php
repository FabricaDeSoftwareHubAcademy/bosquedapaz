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
    protected $nome_marca;
    protected $num_barraca;
    protected $voltagem;
    protected $modalidade;
    protected $tipo;
    protected $idade;
    protected $energia;
    protected $contato2;
    protected $descricao;
    protected $metodos_pgto;
    protected $cor_rua;
    protected $responsavel;
    protected $produto;



    //////////// MÉDOTO PARA CADASTRAR \\\\\\\\\\\\\\\\\\\\\


    public function cadastrar()
    {

        ///// insert na tabela pessoa \\\\\

        $db = new Database('pessoa');
        $pes_id = $db->insert_lastid(
            [
                'nome' => $this->nome,
                'email' => $this->email,
                'telefone' => $this->whats,
                'whats' => $this->whats,
                'img_perfil' => $this->foto_perfil,
                'link_instagram' => $this->link_instagram,
                'perfil' => 1,
            ]
        );

        ///// insert na tabela expostor \\\\\\

        $db = new Database('expositor');
        $res = $db->insert(
            [
                'id_pessoa' => $pes_id,
                'id_categoria' => $this->id_categoria,
                'nome_marca' => $this->nome_marca,
                'num_barraca' => $this->num_barraca,
                'voltagem' => $this->voltagem,
                'energia' => $this->energia,
                'modalidade' => $this->modalidade,
                'tipo' => $this->tipo,
                'idade' => $this->idade,
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


    ////////////// MÉTODOS DE BUSCAS \\\\\\\\\\\\\\\\\\\\

    public function listar($where = null){
        try {
            $db = new Database('view_expositor');

            //// RETORNA TODOS OS EXPOSITORES VALIDADOS
            if($where == null){
                $expositores = $db->select('validacao != "aguardando"', 'nome')->fetchAll(PDO::FETCH_ASSOC);
                return $expositores ? $expositores : FALSE;
            }

            //// RETORNA OS EXPOITORES FILTRADOS COM WHERE
            else {
                $expositores = $db->select($where, 'nome')->fetchAll(PDO::FETCH_ASSOC);
                return $expositores ? $expositores : FALSE;
            }
        
        //// RETORNA FALSE NO CASO DE ERRO
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function filtrar($filtro, $status = '!='){
        try {
            $db = new Database('view_expositor');

            //// RETORNA O EXPOSITOR PELO FILTRO
            $expositores = $db->select(
                "nome_marca LIKE '%$filtro%' and validacao ".$status." 'aguardando' 
                OR nome LIKE '%$filtro%' and validacao ".$status." 'aguardando' 
                OR email LIKE '%$filtro%' and validacao ".$status." 'aguardando' 
                OR num_barraca LIKE '%$filtro%' and validacao ".$status." 'aguardando' 
                ", 'nome'
            )->fetchAll(PDO::FETCH_ASSOC);
            return $expositores ? $expositores : FALSE;
        
        //// RETORNA FALSE NO CASO DE ERRO
        } catch (\Throwable $th) {
            return FALSE;
        }
    }


    //////////////////// MÉDOTOS SETTERS \\\\\\\\\\\\\\\\\\\\\\\\\\

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
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    public function setModalidade($modalidade)
    {
        $this->modalidade = $modalidade;
    }
    public function setIdade($idade)
    {
        $this->idade = $idade;
    }
}

/*


WHERE pes.nome LIKE '%$filtro%'
OR exp.nome_marca LIKE '%$filtro%'
OR exp.produto LIKE '%$filtro%' 
OR cat.descricao = '%$filtro%';

WHERE cat.descricao = '$cat'

*/