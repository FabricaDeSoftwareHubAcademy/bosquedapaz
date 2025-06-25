<?php
namespace app\Controller;
require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

// require_once __DIR__ . '/../Models/Database.php';

class Boleto {
    public ?int $id_boleto = null;
    public ?int $id_expositor = null;
    public ?string $nome = null;
    public ?string $vencimento = null;
    public ?string $mes_referencia = null;
    public ?float $valor = null;
    public ?string $status = null;
    public ?string $pdf = null;

    public function PesquisarExpositor($nome) {
        $banco = new Database();
        return $banco->listar_expositor_para_cadastro($nome)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function CadastrarBoletos() {
        $banco = new Database('boleto');
        $execucao = $banco->insert([
            'pdf' => $this->pdf,
            'mes_referencia' => $this->mes_referencia,
            'valor' => $this->valor,
            'vencimento' => $this->vencimento,
            'id_expositor' => $this->id_expositor
        ]);
        return $execucao;
    }

    public function ListarBoletos() {
        $banco = new Database(); 
        return $banco->listar_todos_boletos()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FiltrarPorNome($nome) {
        $banco = new Database();
        return $banco->filtrar_boletos_por_nome($nome)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FiltrarPorStatus($status) {
        $banco = new Database();
        return $banco->filtrar_boletos_por_status($status)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FiltrarPorData($data_inicial, $data_final) {
        $banco = new Database();
        return $banco->filtrar_boletos_por_data($data_inicial, $data_final)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function CapturarBoletoPorId($id = null) {
        if ($id === null && isset($_SESSION['id_expositor'])) {
            $id = $_SESSION['id_expositor'];
        }
        if ($id !== null) {
            $banco = new Database();
            return $banco->capturar_boleto_por_id($id)->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }
    
}
?>