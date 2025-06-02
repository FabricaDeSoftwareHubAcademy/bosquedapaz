<?php

namespace app\Controller;
require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

    Class UtilidadePublica
    {
        public int $id_utilidadesPublica;
        public string $titulo;
        public string $descricao;
        public string $data_inicio;
        public string $data_fim;
        public string $imagem;

        public function cadastrar()
        {
            $db = new Database('utilidadesPublica');
            $res = $db->insert(
                [
                    'titulo' => $this->titulo,
                    'descricao' => $this->descricao,
                    'data_inicio' => $this->data_inicio,
                    'data_fim' => $this->data_fim,
                    'imagem' => $this->imagem
                ]
            );
            return $res;
        } 
    }

?>