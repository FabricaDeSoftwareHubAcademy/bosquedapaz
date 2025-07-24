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
    protected $aceitou_termos; // <== NÃO REMOVER ISSO
    public $imagens;

    //////////// MÉTODO PARA CADASTRAR \\\\\\\\\\\\\\\\\\\\\

    public function cadastrar()
    {
        $db = new Database('endereco');
        $endereco_id = $db->insert_lastid(
            [
                'cidade' => $this->cidade,
            ]
        );

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
                'id_endereco' => $endereco_id,
                'aceitou_termos' => $this->aceitou_termos, // <== NÃO MEXER AQUI
            ]
        );

        ///// insert na tabela expositor \\\\\\

        $db = new Database('expositor');
        $idExpositor = $db->insert_lastid(
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

        //// insert das imagens do expositor \\\\\\
        $imagem = new Imagem();
        $imagem->id_expositor = $idExpositor;
        $res = false;
        if (is_array($this->imagens)) {
            foreach ($this->imagens as $value) {
                $imagem->caminho = $value;
                $res = $imagem->cadastro();
            }
        }

        return $res;
    }

    ////////////// MÉTODOS DE BUSCAS \\\\\\\\\\\\\\\\\\\\

    public function listar($where = null)
    {
        try {
            $db = new Database('view_expositor');

            //// RETORNA TODOS OS EXPOSITORES VALIDADOS
            if ($where === null) {
                $expositores = $db->select('validacao != "aguardando" AND validacao != "recusado"', 'nome')->fetchAll(PDO::FETCH_ASSOC);
                return $expositores ?: false;
            }

            //// RETORNA OS EXPOSITORES FILTRADOS COM WHERE
            $expositores = $db->select($where, 'nome')->fetchAll(PDO::FETCH_ASSOC);
            return $expositores ?: false;

        } catch (\Throwable $th) {
            return false;
        }
    }

    public function filtrar($filtro, $status = "= 'aprovado'")
    {
        try {
            $db = new Database('view_expositor');

            //// RETORNA O EXPOSITOR PELO FILTRO
            $condition = "(
                nome_marca LIKE '%$filtro%' OR
                nome LIKE '%$filtro%' OR
                email LIKE '%$filtro%' OR
                num_barraca LIKE '%$filtro%'
            ) AND validacao $status";

            $expositores = $db->select($condition, 'nome')->fetchAll(PDO::FETCH_ASSOC);
            return $expositores ?: false;

        } catch (\Throwable $th) {
            return false;
        }
    }

    //////////////////// VALIDAR EXPOSITOR \\\\\\\\\\\\\\\\\\\\\\\\

    public function validarExpositor($id, $status, $categoria = null, $newSenha = null)
    {
        $db = new Database('expositor');

        if ($status === 'validado') {
            //// dados pessoa
            $senha = [
                'senha' => $newSenha,
                'status_pes' => 'ativo',
            ];

            ///// dados expositor
            $newStatus = [
                'validacao' => 'validado',
                'id_categoria' => $categoria
            ];

            $res = $db->update_all($newStatus, $senha, 'pessoa', 'id_pessoa', 'id_expositor = ' . $id);

            return $res;
        } elseif ($status === 'recusado') {
            ///// dados expositor
            $newStatus = [
                'validacao' => 'recusado'
            ];
            $res = $db->update('id_expositor = ' . $id, $newStatus);
            return $res;
        }
        return false;
    }

    public function atualizar($id) // Recebe o ID como parâmetro
    {
        $db = new Database('expositor');
        $ids_pessoa_expositor = $db->select_pessoa_expositor($id)->fetch(PDO::FETCH_ASSOC);

        if (!$ids_pessoa_expositor) {
            return false;
        }

        $db = new Database('pessoa');
        $res = $db->update(
            'id_pessoa = ' . $ids_pessoa_expositor['id_pessoa'],
            [
                'link_instagram' => $this->link_instagram,
                'whats' => $this->whats,
                'link_facebook' => $this->link_facebook,
                'email' => $this->email
            ]
        );

        $db = new Database('expositor');
        $res = $db->update(
            'id_pessoa = ' . $ids_pessoa_expositor['id_pessoa'],
            [
                'nome_marca' => $this->nome_marca,
                'descricao' => $this->descricao,
            ]
        );

        // Atualização das imagens, exemplo genérico
        $db = new Database('imagem');
        $res = $db->update(
            'id_imagem = 1',
            [
                'caminho' => '../caminho/imagem.jpg',
                'posicao' => '',
                'id_expo' => 1
            ]
        );

        return $res;
    }

    //////////////////// MÉTODOS SETTERS \\\\\\\\\\\\\\\\\\\\\\\\\\

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

    public function setAceitou_termos($aceitou_termos)
    {
        $this->aceitou_termos = $aceitou_termos;
    }
}

/*


WHERE pes.nome LIKE '%$filtro%'
OR exp.nome_marca LIKE '%$filtro%'
OR exp.produto LIKE '%$filtro%' 
OR cat.descricao = '%$filtro%';

WHERE cat.descricao = '$cat'

*/
