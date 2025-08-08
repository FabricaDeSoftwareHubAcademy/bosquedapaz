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
    public string $descricao_evento;
    public string $data_evento;
    public string $hora_inicio;
    public string $hora_fim;
    public string $id_endereco_evento;
    public int $status;
    public string $banner_evento;


    public function cadastrar_evento()
    {
        try {
            $db = new Database('evento');
            $res = $db->insert([
                'nome_evento' => $this->nome_evento,
                'subtitulo_evento' => $this->subtitulo_evento,
                'descricao_evento' => $this->descricao_evento,
                'data_evento' => $this->data_evento,
                'hora_inicio' => $this->hora_inicio,
                'hora_fim' => $this->hora_fim,
                'id_endereco_evento' => $this->id_endereco_evento,
                'banner_evento' => $this->banner_evento
            ]);
    
            return $res;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function listar_evento($where = null,$order = null,$limit = null){
        try {
            $db = new Database('evento');
            $res = $db->select($where,$order,$limit)->fetchAll(PDO::FETCH_ASSOC);
            
            return $res;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function buscarPorNome($nome)
    {
        try {
            $db = new Database('evento');
            $query = "
            SELECT * 
            FROM evento 
            WHERE nome_evento LIKE ? 
            ORDER BY status DESC, data_evento ASC
        ";
            return $db->execute($query, ["%$nome%"])->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function buscarPorId_evento($id) {
        try {
            $db = new Database('evento');
            $query = "SELECT * FROM evento WHERE id_evento = ?";
            return $db->execute($query, [$id])->fetchObject(self::class);
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function atualizar_evento($id){
        try {
            $db = new Database('evento');

            $valores = [
                'nome_evento' => $this->nome_evento,
                'subtitulo_evento' => $this->subtitulo_evento,
                'descricao_evento' => $this->descricao_evento,
                'data_evento' => $this->data_evento,
                'hora_inicio' => $this->hora_inicio,
                'hora_fim' => $this->hora_fim,
                'id_endereco_evento' => $this->id_endereco_evento,
                'banner_evento' => $this->banner_evento,
                'status' => $this->status
            ];
        
            return $db->update("id_evento = {$id}", $valores);

        } catch (\Throwable $th) {
            return FALSE;
        }
    }
}