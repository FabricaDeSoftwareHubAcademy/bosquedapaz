<?php

namespace app\Controller;

require_once('../vendor/autoload.php');
use PDO;
use app\Models\Database;

class DadosFeira {
    public int $id_dadosFeira;
    public int $qtd_visitantes;
    public int $qtd_expositores;
    public int $qtd_artistas;

    public function atualizar(int $id, array $values){
        $db = new Database('dadosFeira');

        $values = $values;

        $res = $db->update('id_dadosFeira = '. $id, $values);

        return $res ? true : false;
    }

    public function get_dados(){
    $db = new Database('dadosFeira');

        $res = $db->select()->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }
}

?>