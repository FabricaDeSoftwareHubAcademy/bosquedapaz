<?php
require_once __DIR__ . '/../../Models/meuDatabase.php';

class Expositor {

    public function ListarPorId($id) {
        $db = new Database("expositores_pendentes");
        $res = $db->select("id_expositor = " . $id)->fetchObject(self::class);
        return $res;
    }
}

?>