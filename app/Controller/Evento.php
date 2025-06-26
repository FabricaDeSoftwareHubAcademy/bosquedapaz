<?php
namespace app\Controller;
require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

class Evento
{
    public int $id_evento;
    public string $nome_evento;
    public string $descricao;
    public string  $data_evento;
    public int $status;
    public string $banner;


    public function cadastrar()
    {
        $db = new Database('evento');
        $res = $db->insert([
            'nome_evento' => $this->nome_evento,
            'descricao' => $this->descricao,
            'data_evento' => $this->data_evento,
            'banner' => $this->banner
        ]);

        return $res;
    }

    public function listar($where = null,$order = null,$limit = null){
        $db = new Database('evento');
        $res = $db->select($where,$order,$limit)->fetchAll(PDO::FETCH_ASSOC);
        
        return $res;
    }

    public function buscarPorId($id) {
        $db = new Database('evento');
        $res = $db->select("id_evento = {$id}")
                        ->fetchObject(self::class);

        return $res;
    }

    public function atualizar($id){
    $db = new Database('evento');

    $valores = [
        'nome_evento' => $this->nome_evento,
        'descricao' => $this->descricao,
        'data_evento' => $this->data_evento,
        'banner' => $this->banner,
        'status' => $this->status
    ];

        return $db->update("id_evento = {$id}", $valores);
    }
}
