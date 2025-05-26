<?php
require_once __DIR__ . '/../../Models/meuDatabase.php';

class Expositor {

    // public int $id_expositor;
    // public string $nome;
    // public string $email;
    // public string $categoria;
    // public string $whatsapp;

    public function ListarExpositores($where = null, $order = null, $limit = null) {
        $db = new Database("expositores_pendentes");
        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }
}
?>