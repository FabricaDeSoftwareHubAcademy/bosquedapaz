<?php 

require '../../../app/adm/Models/Database-cadastroADM.php';

class Adm{
   public int $id_colaborador;
   public string $nome;
   public string $email; 
   public string $telefone; 
   public string $cargo; 
   public string $senha; 
   public string $imagem; 

//    Cadastro:
    public function cadastrar(){
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
                'senha' => $this->senha,
                'imagem' => $this->imagem,
            ]);

            return $resColaborador;
        }
        return false;
    }
}


?>

