<?php

namespace app\Controller;

use PDO;
use app\Controller\Pessoa;
use app\Models\Database;


class Artista extends Pessoa
{
    protected $id_artista;
    protected $id_pessoa;
    protected $linguagem_artistica;
    protected $tempo_apresentacao;
    protected $valor_cache;

    public function cadastrar()
    {
        $db = new Database('pessoa');
        $pes_id = $db->insert_lastid(
            [
                'nome' => $this->nome,
                'email' => $this->email,
                'telefone' => $this->telefone,
                'link_instagram' => $this->link_instagram,

            ]
        );

        $db = new Database('artista');
        $res = $db->insert(
            [
                ''
            ]
        )
    }
}
