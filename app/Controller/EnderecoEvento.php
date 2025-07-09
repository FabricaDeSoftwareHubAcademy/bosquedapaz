<?php
namespace app\Controller;
require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

class Evento
{
    public int $id_endereco_evento;
    public string $cep_evento;
    public string $logradouro_evento;
    public string $complemento_evento;
    public int $numero_evento;
    public string $bairro_evento;
    public string $cidade_evento;

    public function cadastrar_endereco_evento(){
        $db = new Database('endereco_evento');
        $res = $db->insert([
            'cep_evento' => $this->cep_evento,
            'logradouro_evento' => $this->logradouro_evento,
            'complemento_evento' => $this->complemento_evento,
            'numero_evento' => $this->numero_evento,
            'bairro_evento' => $this->bairro_evento,
            'cidade_evento' => $this->cidade_evento
        ]);
    }

}

