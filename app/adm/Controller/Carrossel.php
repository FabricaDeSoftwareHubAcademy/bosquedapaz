<?php

require_once('../vendor/autoload.php');
// require_once('../app/Models/Database.php');

use app\Models\Database;

class Carrossel {
    public int $id;
    public string $caminho;
    public int $posicao;

    public function atualizar(int $id){
        $db = new Database('carrossel');

        $values = [
            "caminho" => $this->caminho,
            "posicao" => $this->posicao
        ];

        $res = $db->update('id_carrossel = '. $id, $values);

        return $res ? true : false;
    }

    public function get_imagem(){
        $db = new Database('carrossel');

        $res = $db->select()->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }
}

?>