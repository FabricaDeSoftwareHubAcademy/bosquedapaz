<?php
namespace app\Controller;
require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

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
        $banco = new Database('pessoa');
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
        $banco = new Database('boleto');
        return $banco->listar_todos_boletos()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FiltrarPorNome($nome) {
        $banco = new Database('boleto');
        return $banco->filtrar_boletos_por_nome($nome)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FiltrarPorStatus($status) {
        $banco = new Database('boleto');
        return $banco->filtrar_boletos_por_status($status)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AlterarStatus($status, $id) {
        $banco = new Database('boleto');
        return $banco->alterar_status($status, $id);
    }

    public function FiltrarPorData($data_inicial, $data_final) {
        $banco = new Database('boleto');
        return $banco->filtrar_boletos_por_data($data_inicial, $data_final)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function CapturarBoletosPorUsuario($idPessoa) {
        if ($idPessoa !== null) {
            $banco = new Database('boleto');
            return $banco->capturar_boletos_por_usuario($idPessoa)->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }
    
    public function CapturarBoletoPorId($idPessoa, $idBoleto) {
        $banco = new Database('pessoa');
        return $banco->capturar_boleto_por_id($idPessoa, $idBoleto)->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>