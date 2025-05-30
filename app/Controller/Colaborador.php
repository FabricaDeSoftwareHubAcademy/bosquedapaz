<?php 

namespace app\Controller;


require_once('../vendor/autoload.php');
use PDO;
use app\Models\Database;
use app\Controller\Pessoa;

class Colaborador extends Pessoa{
   public int $id_colaborador;
   public string $cargo; 

//    Cadastro:
    public function cadastrar(){

        $db = new Database('pessoa');
        $pes_id = $db->insert_lastid(
            [
                'nome' => $this->nome,
                'telefone' => $this->telefone,
                'email' => $this->email,
                'senha' => $this->senha,
                'perfil' => $this->perfil,
            ]
        );


        $db = new Database('colaborador');
        $res = $db->insert(
            [
                'cargo' => $this->cargo,
                'id_pessoa' => $pes_id
            ]
        );
        return $res;

    }

    public function buscar(){
        $dbPessoa = new Database('colaborador');

        $res = $dbPessoa->select_colaborador()->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function buscar_por_id($id){
        $dbPessoa = new Database('colaborador');

        $res = $dbPessoa->select_colaborador('id_colaborador = '.$id)->fetchObject();
        return $res;
    }
}



?>

