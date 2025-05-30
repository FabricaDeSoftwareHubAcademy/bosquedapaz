<?php 

namespace app\Controller;

require_once('../vendor/autoload.php');
use PDO;
use app\Models\Database;

class Colaborador{
   public int $id_colaborador;
   public string $nome;
   public string $email; 
   public string $telefone; 
   public string $cargo; 
   public string $senha; 
   public string $imagem; 

//    Cadastro:
    public function cadastrar(){
        $senhaHash = password_hash($this->senha, PASSWORD_DEFAULT);

        $dbPessoa = new Database('pessoa');
        $resPessoa = $dbPessoa->insert([
            'nome'=> $this->nome,
            'email'=> $this->email,
            'telefone' => $this->telefone,
        ]);

        if($resPessoa){
            $id_pessoa = $dbPessoa->getConnection()->lastInsertId();

            $dbColaborador = new Database('colaborador');
            $resColaborador = $dbColaborador->insert([
                'id_pessoa' => $id_pessoa,
                'cargo' => $this->cargo,
                'senha' => $senhaHash,
                'imagem' => $this->imagem,
            ]);

            if($resColaborador){
                return $dbColaborador->getConnection()->lastInsertId();
            }
        }
        return false;
    }

    public function buscar(){
        $dbPessoa = new Database()
    }
}
?>

