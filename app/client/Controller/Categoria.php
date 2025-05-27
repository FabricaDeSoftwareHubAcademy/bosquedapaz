<?php

class Categoria {


    public function listar(){
        $db = new Database("categoria");

        $stmt = $db->select();
        
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $res;
    
    }

}