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

    public function listar($busca = null){
        $db = new Database('colaborador');
        
        if ($busca) {
            $query = "
                SELECT c.id_colaborador, p.nome, p.email, p.telefone, c.cargo, c.imagem
                FROM colaborador c
                JOIN pessoa p ON p.id_pessoa = c.id_pessoa
                WHERE p.nome LIKE ?
            ";
            $stmt = $db->execute($query, ["%$busca%"]);
        } else {
            $query = "
                SELECT c.id_colaborador, p.nome, p.email, p.telefone, c.cargo, c.imagem
                FROM colaborador c
                JOIN pessoa p ON p.id_pessoa = c.id_pessoa
            ";
            $stmt = $db->execute($query);
        }
    
        if ($stmt) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        
        return [];
    }
    
    
    
}


?>

