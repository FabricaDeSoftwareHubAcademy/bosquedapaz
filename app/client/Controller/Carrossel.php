<?php

require_once('../../Models/Database.php');

class Carrossel {
    public int $id;
    public string $img1;
    public string $img2;
    public string $img3;

    public function buscar_id($id){
        $db = new Database('carrosel');

        $res = $db->select("id_carrosel = ". $id)->fetchObject(self::class);
        return $res;
    }
}

?>