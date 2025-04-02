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

    public function cadastrar(){
        $db = new Database('colaborador');

        $res = $db->insert([
            'nome'=> $this->nome,
            'email'=> $this->email,
            'telefone' => $this->telefone,
            'cargo' => $this->cargo,
            'senha' => $this->senha,
            'imagem' => $this->imagem
        ]);

        return $res;
    }
}


?>

