<?php
// namespace app\Controller;
// require_once('../vendor/autoload.php');

// use PDO;
// use app\Models\Database;

require_once __DIR__ . '/../Models/Database.php';

class Boleto {
    public ?int $id_boleto = null;
    public ?int $id_expositor = null;
    public ?string $nome = null;
    public ?string $vencimento = null;
    public ?string $mes_referencia = null;
    public ?float $valor = null;
    public ? string $status = null;
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
}
?>