<?php

namespace app\Controller;

require_once('../vendor/autoload.php');
use PDO;
use app\Models\Database;

class Imagem
{
    public $id_imagem;
    public $id_expositor;
    public $caminho = null;
    public $posicao;

    public function cadastroImagem()
    {
        $db = new Database('imagem');
        $values = [
            'id_expositor' => $this->id_expositor,
            'caminho' => $this->caminho,
            'posicao' => $this->posicao,
        ];
        $db->insert($values);
        
    }

    public function updateImagem(){
        
    }
}
