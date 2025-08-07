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
    protected $descricao;
    protected $metodos_pgto;
    protected $cor_rua;
    protected $responsavel;
    protected $produto;
    protected $aceitou_termos; // <== NÃO REMOVER ISSO (FUNCIONALIDADE DE ACEITAR TERMOS)
    public $imagens;



    //////////// MÉDOTO PARA CADASTRAR \\\\\\\\\\\\\\\\\\\\\
    public function emailExiste($email){
        $db = new Database('pessoa_user');

        $email = $db->select("email = '$email'")->fetch(PDO::FETCH_ASSOC);

        return $email;
    }

    public function cadastrar()
    {
        $this->aceitou_termos = $_SESSION['aceitou_termos'] ?? 'Não';

        $db = new Database('endereco');
        $endereco_id = $db->insert_lastid(
            [
                'cidade' => $this->cidade,
            ]
        );

        
        ///// insert na tabela login \\\\\
        
        $db = new Database('pessoa_user');
        $login_id = $db->insert_lastid(
            [
            'email' => $this->email,
            'perfil' => '0',
            ]
        );

            
        ///// insert na tabela pessoa \\\\\
        $db = new Database('pessoa');
        $pes_id = $db->insert_lastid(
            [
                'nome' => $this->nome,
                'telefone' => $this->whats,
                'whats' => $this->whats,
                'img_perfil' => $this->foto_perfil,
                'link_instagram' => $this->link_instagram,
                'id_login' => $login_id,
                'id_endereco' => $endereco_id,
                'termos' => $this->aceitou_termos // <== NÃO REMOVER ISSO (FUNCIONALIDADE DE ACEITAR TERMOS)
            ]
        );


        ///// insert na tabela expostor \\\\\\

        $db = new Database('expositor');
        $idExpositor = $db->insert_lastid(
            [
                'id_pessoa' => $pes_id,
                'id_categoria' => $this->id_categoria,
                'nome_marca' => $this->nome_marca,
                'num_barraca' => $this->num_barraca,
                'voltagem' => $this->voltagem,
                'energia' => $this->energia,
                'tipo' => $this->tipo,
                'descricao' => $this->descricao,
                'metodos_pgto' => $this->metodos_pgto,
                'cor_rua' => $this->cor_rua,
                'produto' => $this->produto
                ]
            );
            
        
        //// insert das imagens do expositor \\\\\\
        $imagem = new Imagem();
        $imagem->id_expositor = $idExpositor;
        foreach ($this->imagens as $key => $value) {
            $imagem->caminho = $value;
            $res = $imagem->cadastro();
        }


        return $res;
    }


    ////////////// MÉTODOS DE BUSCAS \\\\\\\\\\\\\\\\\\\\

    public function listar($where = null){
        try {
            $db = new Database('view_expositor');

            //// RETORNA TODOS OS EXPOSITORES VALIDADOS
            if($where == null){
                $expositores = $db->select('validacao != "aguardando" and validacao != "recusado"', 'nome and status_pes')->fetchAll(PDO::FETCH_ASSOC);
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
    
    public function listarHome($busca = null){
        try {
            $db = new Database('view_expositor');

            //// RETORNA TODOS OS EXPOSITORES VALIDADOS
            if($busca != null){
                $expositores = $db->select('validacao != "aguardando" and validacao != "recusado" and status_pes="ativo"' , "RAND() and nome and status_pes", 10)->fetchAll(PDO::FETCH_ASSOC);
                return $expositores ? $expositores : FALSE;
            }else {
                return FALSE;
            }
        
        //// RETORNA FALSE NO CASO DE ERRO
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function filtrar($filtro, $status = "= 'aprovado'"){
        try {
            $db = new Database('view_expositor');

            //// RETORNA O EXPOSITOR PELO FILTRO
            $expositores = $db->select(
                "nome_marca LIKE '%$filtro%' and validacao ".$status." 
                OR nome LIKE '%$filtro%' and validacao ".$status." 
                OR email LIKE '%$filtro%' and validacao ".$status." 
                OR num_barraca LIKE '%$filtro%' and validacao ".$status." 
                ", 'nome and status_pes'
            )->fetchAll(PDO::FETCH_ASSOC);
            return $expositores ? $expositores : FALSE;
        
        //// RETORNA FALSE NO CASO DE ERRO
        } catch (\Throwable $th) {
            return FALSE;
        }
    }


    //////////////////// VÁLIDAR EXPOSITOR \\\\\\\\\\\\\\\\\\\\\\\\

    public function validarExpositor($id, $status, $categoria = null, $newSenha = null, $num_barraca = null, $cor_rua = null){
        $db = new Database('expositor');
        if($status == 'validado'){
            //// dados pessoa
            $senha = [
                'senha' => $newSenha,
                'status_pes' => 'ativo',
            ];

            ///// dados expositor
            $newStatus = [
                'validacao' => 'validado',
                'id_categoria' => $categoria,
                'num_barraca' => $num_barraca,
                'cor_rua' => $cor_rua,
            ];

            $res = $db->update_all($newStatus, $senha, 'pessoa', 'id_pessoa', 'id_expositor = '. $id);

            return $res;

        }else if ($status == 'recusado'){
            ///// dados expositor
            $newStatus = [
                'validacao' => 'recusado'
            ];
            $res = $db->update('id_expositor = '. $id, $newStatus);
            return $res;
        }
    }

    /////////////////// DELETAR EXPOSITOR \\\\\\\\\\\\\\\\\\\\\\\\\

    public function alterarStatus($id, $status){
        $db = new Database('pessoa');
        try {
            $status = $db->delete('id_pessoa = '. $id, $status);
            return $status;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }


    public function atualizar($id) // Recebe o ID como parâmetro
    {

        $db = new Database('expositor');
        $ids_pessoa_expositor = $db->select("id_expositor = " . $id)->fetch(PDO::FETCH_ASSOC);

        $db = new Database('pessoa');
        $res = $db->update(
            'id_pessoa = ' . $ids_pessoa_expositor['id_pessoa'], // Usa o ID recebido
            [
                'link_instagram' => $this->link_instagram,
                'whats' => $this->whats,
                'link_facebook' => $this->link_facebook,
                'email' => $this->email
            ]
        );

        $db = new Database('expositor');
        $res = $db->update(
            'id_pessoa = ' . $ids_pessoa_expositor['id_pessoa'], // Usa o ID recebido
            [
                'nome_marca' => $this->nome_marca,
                'descricao' => $this->descricao,
            ]
        );

        // $ids_imagens = $db->select_img($id)->fetch(PDO::FETCH_ASSOC);

        $db = new Database('imagem');
        $res = $db->update(
            'id_imagem = ' . 1,
            [
                'caminho' => '../caminho/imagem.jpg',
                'posicao' => '',
                'id_expo' => 1
            ]
        );

        return $res;
    }


    //////////////////// MÉDOTOS SETTERS \\\\\\\\\\\\\\\\\\\\\\\\\\

    public function setId_expositor($id_expositor)
    {
        $this->id_expositor = $id_expositor;
    }

    // public function setImagens($imagens)
    // {
    //     $this->imagens = $imagens;
    // }

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

    // NÃO REMOVER ISSO (FUNCIONALIDADE DE ACEITAR TERMOS)
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
