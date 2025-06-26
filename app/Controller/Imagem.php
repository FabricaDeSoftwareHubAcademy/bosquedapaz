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

    public function listar($id){
        try {
            $db = new Database('imagem');
            $imagens = $db->select_img($id);
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