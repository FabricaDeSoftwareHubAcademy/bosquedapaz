<?php 

require_once __DIR__ . '/../../../Models/Database.php';


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
                'senha' => $this->senha,
                'imagem' => $this->imagem,
            ]);

            if($resColaborador){
                return $dbColaborador->getConnection()->lastInsertId();
            }
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
    
        return $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
    }
}
?>

