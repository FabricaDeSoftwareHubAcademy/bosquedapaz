<?php
require_once __DIR__ . '/../../Models/meuDatabase.php';

class Expositor {
    public function ListarExpositores($where = null, $order = null, $limit = null) {
        $db = new Database("expositores_validados");
        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }
}
?>