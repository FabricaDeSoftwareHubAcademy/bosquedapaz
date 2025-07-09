<?php

namespace app\Controller;

require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

class Imagem {
    public int $id;
    public string $caminho;
    public int $posicao;
    public int $id_expositor;

    public function listar($id_expositor){
        try {
            $db = new Database('imagem');
            $imagens = $db->select("id_expositor = ". $id_expositor)->fetchAll(PDO::FETCH_ASSOC);
            if ($imagens){
                return $imagens;
            }else {
                return FALSE;
            }
        } catch (\Throwable $th) {
            return FALSE;
        }

    }
}