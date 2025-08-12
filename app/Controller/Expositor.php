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

    public function cpfExiste($cpf){
        $db = new Database('pessoa');

        $email = $db->select("cpf = '$cpf'")->fetch(PDO::FETCH_ASSOC);

        return $email;
    }


    public function cadastrar(){
        try {
            $this->aceitou_termos = $_SESSION['aceitou_termos'] ?? $_POST['aceitou_termos'];

            $db = new Database('endereco');
    
            $conn = $db->getConnection();
    
            $conn->beginTransaction();
    
            $endereco_id = $db->insert_lastid(
                [
                    'cidade' => $this->cidade,
                ]
            );
            
            ///// insert na tabela login \\\\\
            
            $db->setTable('pessoa_user');
            $login_id = $db->insert_lastid(
                [
                'email' => $this->email,
                'perfil' => '0',
                ]
            );
                
    
            
    
            ///// insert na tabela pessoa \\\\\
            $db->setTable('pessoa');   
            $pes_id = $db->insert_lastid(
                [
                    'nome' => $this->nome,
                    'cpf' => $this->cpf,
                    'telefone' => $this->telefone,
                    'whats' => $this->whats,
                    'img_perfil' => $this->foto_perfil,
                    'link_instagram' => $this->link_instagram,
                    'id_login' => $login_id,
                    'id_endereco' => $endereco_id,
                    'img_perfil' => '../../../Public/imgs/barraca-padrao.png',
                    'termos' => $this->aceitou_termos // <== NÃO REMOVER ISSO (FUNCIONALIDADE DE ACEITAR TERMOS)
                ]
            );

            ///// insert na tabela expostor \\\\\\

            $db->setTable('expositor');
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
                    ]
            );

            //// insert das imagens do expositor \\\\\\
            
            $conn->commit();

            $imagem = new Imagem();
            $imagem->id_expositor = $idExpositor;
            foreach ($this->imagens as $key => $value) {
                $imagem->caminho = $value;
                $res = $imagem->cadastro();
            }
            return true;

        } catch (\Throwable $th) {
            return false;
        }
    }


    ////////////// MÉTODOS DE BUSCAS \\\\\\\\\\\\\\\\\\\\

    public function listar($where = null){
        try {
            $db = new Database('view_expositor');

            //// RETORNA TODOS OS EXPOSITORES VALIDADOS
            if($where == null){
                $expositores = $db->select('validacao = "validado"', 'status_pes')->fetchAll(PDO::FETCH_ASSOC);
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

    public function filtrar($filtro, $status = "= 'validado'", $valido = false){
        try {
            $db = new Database('view_expositor');

            if($valido){
                //// RETORNA O EXPOSITOR PELO FILTRO
                $expositores = $db->select(
                    "nome_marca LIKE '%$filtro%' and validacao ='validado' OR nome LIKE '%$filtro%' and validacao ='validado' OR email LIKE '%$filtro%' and validacao ='validado' OR num_barraca LIKE '%$filtro%' and validacao ='validado'", 'nome and status_pes'
                )->fetchAll(PDO::FETCH_ASSOC);
                return $expositores ? $expositores : FALSE;
            }else {
                //// RETORNA O EXPOSITOR PELO FILTRO
                $expositores = $db->select(
                    "nome_marca LIKE '%$filtro%' and validacao ".$status." 
                    OR nome LIKE '%$filtro%' and validacao ".$status." 
                    OR email LIKE '%$filtro%' and validacao ".$status." 
                    OR num_barraca LIKE '%$filtro%' and validacao ".$status." 
                    ", 'nome and status_pes'
                )->fetchAll(PDO::FETCH_ASSOC);
                return $expositores ? $expositores : FALSE;

            }
        
        //// RETORNA FALSE NO CASO DE ERRO
        } catch (\Throwable $th) {
            return FALSE;
        }
    }


    //////////////////// VÁLIDAR EXPOSITOR \\\\\\\\\\\\\\\\\\\\\\\\

    public function validarExpositor($id_expositor, $status, $categoria = null, $newSenha = null, $num_barraca = null, $cor_rua = null, $id_login = null){
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
            
            
            $db = new Database('pessoa_user');

            $updateSenha = $db->update('id_login = "'. $id_login. '"',$senha);
            
            if($updateSenha){
                $db = new Database('expositor');

                $updateSenha = $db->update('id_expositor = "'. $id_expositor. '"',$newStatus);
            }

            return $updateSenha;

        }else if ($status == 'recusado'){
            ///// dados expositor
            $newStatus = [
                'validacao' => 'recusado'
            ];
            $res = $db->update('id_expositor = '. $id_expositor, $newStatus);
            return $res;
        }
    }

    /////////////////// DELETAR EXPOSITOR \\\\\\\\\\\\\\\\\\\\\\\\\

    public function alterarStatus($id, $status){
        $db = new Database('pessoa_user');
        try {
            $status = $db->delete('id_login = '. $id, $status);
            return $status;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    // public function atualizar($id){
    //     try {
    //         // Buscar dados do expositor
    //         $db = new Database('expositor');
    //         $ids_pessoa_expositor = $db->select("id_expositor = " . $id)->fetch(PDO::FETCH_ASSOC);
            
    //         if (!$ids_pessoa_expositor) {
    //             error_log("Expositor não encontrado com ID: " . $id);
    //             return false;
    //         }
    
    //         // Buscar dados da pessoa para obter id_login
    //         $db = new Database('pessoa');
    //         $dados_pessoa = $db->select("id_pessoa = " . $ids_pessoa_expositor['id_pessoa'])->fetch(PDO::FETCH_ASSOC);
            
    //         if (!$dados_pessoa) {
    //             error_log("Pessoa não encontrada com ID: " . $ids_pessoa_expositor['id_pessoa']);
    //             return false;
    //         }
    
    //         // Atualizar tabela pessoa
    //         $res_pessoa = $db->update(
    //             'id_pessoa = ' . $ids_pessoa_expositor['id_pessoa'],
    //             [
    //                 'link_instagram' => $this->link_instagram,
    //                 'whats' => $this->whats,
    //                 'link_facebook' => $this->link_facebook,
    //             ]
    //         );
    
    //         // Atualizar tabela pessoa_user (email)
    //         $db = new Database('pessoa_user');
    //         $res_user = $db->update(
    //             'id_login = ' . $dados_pessoa['id_login'], // Corrigido: usar dados_pessoa em vez de $id
    //             [
    //                 'email' => $this->email,
    //             ]
    //         );
            
    //         // Atualizar tabela expositor
    //         $db = new Database('expositor');
    //         $res_expositor = $db->update(
    //             'id_expositor = ' . $id, // Corrigido: usar $id em vez de $ids_pessoa_expositor['expositor']
    //             [
    //                 'nome_marca' => $this->nome_marca,
    //                 'descricao' => $this->descricao,
    //             ]
    //         );
            
    //         return $res_pessoa && $res_expositor && $res_user;
            
    //     } catch (\Exception $e) {
    //         error_log("Erro ao atualizar expositor: " . $e->getMessage());
    //         return false;
    //     }
    // }

    public function atualizar($id){
        try {
            // Buscar dados do expositor
            $db = new Database('expositor');
            $ids_pessoa_expositor = $db->select("id_expositor = " . $id)->fetch(PDO::FETCH_ASSOC);
            
            if (!$ids_pessoa_expositor) {
                error_log("Expositor não encontrado com ID: " . $id);
                return false;
            }
    
            // Buscar dados da pessoa para obter id_login
            $db = new Database('pessoa');
            $dados_pessoa = $db->select("id_pessoa = " . $ids_pessoa_expositor['id_pessoa'])->fetch(PDO::FETCH_ASSOC);
            
            if (!$dados_pessoa) {
                error_log("Pessoa não encontrada com ID: " . $ids_pessoa_expositor['id_pessoa']);
                return false;
            }
    
            // Preparar dados para atualização da pessoa
            $dados_pessoa_update = [
                'link_instagram' => $this->link_instagram,
                'whats' => $this->whats,
                'link_facebook' => $this->link_facebook,
            ];
    
            // Adicionar foto_perfil apenas se foi definida
            if (!empty($this->foto_perfil)) {
                $dados_pessoa_update['img_perfil'] = $this->foto_perfil;
            }
    
            // Atualizar tabela pessoa
            $res_pessoa = $db->update(
                'id_pessoa = ' . $ids_pessoa_expositor['id_pessoa'],
                $dados_pessoa_update
            );
    
            // Atualizar tabela pessoa_user (email)
            $db = new Database('pessoa_user');
            $res_user = $db->update(
                'id_login = ' . $dados_pessoa['id_login'],
                [
                    'email' => $this->email,
                ]
            );
            
            // Atualizar tabela expositor
            $db = new Database('expositor');
            $res_expositor = $db->update(
                'id_expositor = ' . $id,
                [
                    'nome_marca' => $this->nome_marca,
                    'descricao' => $this->descricao,
                ]
            );
            
            return $res_pessoa && $res_expositor && $res_user;
            
        } catch (\Exception $e) {
            error_log("Erro ao atualizar expositor: " . $e->getMessage());
            return false;
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

    public function setFoto_perfil($foto_perfil)
    {
        $this->foto_perfil = $foto_perfil;
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
