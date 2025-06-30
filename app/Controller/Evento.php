<?php
namespace app\Controller;
require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

class Evento
{
    public int $id_evento;
    public string $nome_evento;
    public string $subtitulo_evento;
    public string $descricao_eento;
    public string  $data_evento;
    public string $hora_inicio;
    public string $hora_fim;
    public string $endereco_evento;
    public int $status;
    public string $banner_evento;


    public function cadastrar_evento()
    {
        $db = new Database('evento');
        $res = $db->insert([
            'nome_evento' => $this->nome_evento,
            'subtitulo_evento' => $this->subtitulo_evento,
            'descricao_evento' => $this->descricao_evento,
            'data_evento' => $this->data_evento,
            'hora_inicio' => $this->hora_inicio,
            'hora_fim' => $this->hora_fim,
            'endereco_evento' => $this->endereco_evento,
            'banner_evento' => $this->banner_evento
        ]);

        return $res;
    }

    public function listar_evento($where = null,$order = null,$limit = null){
        $db = new Database('evento');
        $res = $db->select($where,$order,$limit)->fetchAll(PDO::FETCH_ASSOC);
        
        return $res;
    }

    public function buscarPorId_evento($id) {
        $db = new Database('evento');
        $res = $db->select("id_evento = {$id}")
                        ->fetchObject(self::class);

        return $res;
    }

    public function atualizar_evento($id){
    $db = new Database('evento');

    $valores = [
        'nome_evento' => $this->nome_evento,
        'subtitulo' => $this->subtitulo,
        'descricao' => $this->descricao,
        'data_evento' => $this->data_evento,
        'hora_inicio' => $this->hora_inicio,
        'hora_fim' => $this->hora_fim,
        'endereco' => $this->endereco,
        'banner' => $this->banner,
        'status' => $this->status
    ];

        return $db->update("id_evento = {$id}", $valores);
    }
}
