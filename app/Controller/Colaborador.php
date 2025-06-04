<?php

namespace app\Controller;

require_once('../vendor/autoload.php');
use PDO;
use app\Models\Database;

class Colaborador extends Pessoa
{
    private string $cargo;

    // Setters públicos para propriedades herdadas protegidas da Pessoa
    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setSenha(string $senha): void {
        $this->senha = $senha;
    }

    public function setPerfil(string $perfil): void {
        $this->perfil = $perfil;
    }

    // Setters para propriedades próprias
    public function setCargo(string $cargo): void {
        $this->cargo = $cargo;
    }

    public function setImagem(?string $imagem): void {
        $this->foto_perfil = $imagem;
    }



    public function cadastrar()
    {
        // Insere na tabela pessoa
        $dbPessoa = new Database('pessoa');
        $idPessoa = $dbPessoa->insert_lastid([
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'senha' => $this->senha,
            'perfil' => $this->perfil,
            'img_perfil' => $this->foto_perfil
        ]);

        if (!$idPessoa) {
            return false;
        }

        $dbColab = new Database('colaborador');
        $res = $dbColab->insert([
            'cargo' => $this->cargo,
            'id_pessoa' => $idPessoa
        ]);

        return $res;
    }
    
    public function buscar() {
        $dbPessoa = new Database('colaborador');
        $res = $dbPessoa->select_all('pessoa', 'id_pessoa' )->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function buscar_por_id($id) {
        $dbPessoa = new Database('colaborador');
        $res = $dbPessoa->select_all('pessoa', 'id_pessoa', 'id_colaborador = ' . $id)->fetchObject();
        return $res;
    }

    public function atualizar($id){
        $db = new Database('colaborador');

        $values1 = [
            'cargo' => $this->cargo
        ];

        $values2 = [
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'senha' => $this->senha,
            'perfil' => 'ADM',
            'img_perfil' => $this->foto_perfil,
        ];

        $res = $db->update_all($values1, $values2, 'pessoa', 'id_pessoa', 'id_colaborador = '. $id);

        return $res ? TRUE : FALSE;
    }

    public function busca_selecionada($termo = ''){
        $db = new Database('colaborador');
        $conn = $db->getConnection();

        $query = "SELECT 
            pes.*, col.cargo, col.id_colaborador
            FROM pessoa pes
            JOIN colaborador col ON pes.id_pessoa = col.id_pessoa
            ";

        if(!empty($termo)){
            $query .= " WHERE pes.nome LIKE :termo
                        OR pes.email LIKE :termo
                        OR pes.telefone LIKE :termo
                        OR col.id_colaborador = :id            
            ";
        }    

        $stmt = $conn->prepare($query);

        if (!empty($termo)){
            $id = is_numeric($termo) ? (int)$termo : 0;
            $likeTermo = "%$termo%";

            $stmt->bindParam(":termo", $likeTermo, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        }


        $stmt->execute(); 

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
