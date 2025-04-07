<?php

require_once('../../Models/Database.php');

class Carrossel {
    public int $id;
    public string $img1;
    public string $img2;
    public string $img3;

    public function atualizar(){
        $db = new Database('carrosel');

        $values = [
            "img1" => $this->img1,
            "img2" => $this->img2,
            "img3" => $this->img3
        ];

        $res = $db->update('id_carrosel = 1', $values);

        return $res ? true : false;
    }

    public function buscar_id($id){
        $db = new Database('carrosel');

        $res = $db->select("id_carrosel = ". $id)->fetchObject(self::class);
        return $res;
    }
}

?>