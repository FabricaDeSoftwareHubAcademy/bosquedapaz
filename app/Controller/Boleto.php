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

    private function validarData($data) {
        $d = \DateTime::createFromFormat('Y-m-d', $data);
        return $d && $d->format('Y-m-d') === $data;
    }
    
    private function validarDataBR($data) {
        $d = \DateTime::createFromFormat('d/m/Y', $data);
        return $d && $d->format('d/m/Y') === $data;
    }


    public function PesquisarExpositor($nome) {
        // Validação
        if (empty($nome) || strlen($nome) < 2) {
            throw new \InvalidArgumentException("Nome deve ter pelo menos 2 caracteres");
        }
        
        // Sanitização
        $nome = htmlspecialchars(strip_tags(trim($nome)));
        
        $banco = new Database('pessoa');
        return $banco->listar_expositor_para_cadastro($nome)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function CadastrarBoletos() {
        // Validações
        if (empty($this->mes_referencia) || !preg_match('/^\d{4}-\d{2}$/', $this->mes_referencia)) {
            throw new \InvalidArgumentException("Mês de referência inválido (formato: YYYY-MM)");
        }
        
        if (!is_numeric($this->valor) || $this->valor <= 0) {
            throw new \InvalidArgumentException("Valor deve ser maior que zero");
        }
        
        if (empty($this->vencimento) || !$this->validarData($this->vencimento)) {
            throw new \InvalidArgumentException("Data de vencimento inválida");
        }
        
        if (!is_numeric($this->id_expositor) || $this->id_expositor <= 0) {
            throw new \InvalidArgumentException("ID do expositor inválido");
        }
        
        $banco = new Database('boleto');
        return $banco->insert([
            'pdf' => $this->pdf,
            'mes_referencia' => $this->mes_referencia,
            'valor' => (float)$this->valor,
            'vencimento' => $this->vencimento,
            'id_expositor' => (int)$this->id_expositor
        ]);
    }

    public function ListarBoletos() {
        $banco = new Database('boleto');
        return $banco->listar_todos_boletos()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FiltrarPorNome($nome) {
        if (empty($nome) || strlen($nome) < 2) {
            return [];
        }
        
        $nome = htmlspecialchars(strip_tags(trim($nome)));
        $banco = new Database('boleto');
        return $banco->filtrar_boletos_por_nome($nome)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FiltrarPorStatus($status) {
        $statusPermitidos = ['pendente', 'pago', 'vencido', 'cancelado'];
        if (!empty($status) && !in_array($status, $statusPermitidos)) {
            throw new \InvalidArgumentException("Status inválido");
        }
        
        $banco = new Database('boleto');
        return $banco->filtrar_boletos_por_status($status)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AlterarStatus($status, $id) {
        // Validações
        $statusPermitidos = ['pendente', 'pago', 'vencido', 'cancelado'];
        if (!in_array($status, $statusPermitidos)) {
            throw new \InvalidArgumentException("Status inválido");
        }
        
        if (!is_numeric($id) || $id <= 0) {
            throw new \InvalidArgumentException("ID do boleto inválido");
        }
        
        $banco = new Database('boleto');
        return $banco->alterar_status($status, (int)$id);
    }

    public function FiltrarPorData($data_inicial, $data_final) {
        // Validar formato de data (dd/mm/yyyy)
        if (!$this->validarDataBR($data_inicial) || !$this->validarDataBR($data_final)) {
            throw new \InvalidArgumentException("Formato de data inválido (use dd/mm/yyyy)");
        }
        
        $banco = new Database('boleto');
        return $banco->filtrar_boletos_por_data($data_inicial, $data_final)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function CapturarBoletosPorUsuario($idPessoa) {
        if (!is_numeric($idPessoa) || $idPessoa <= 0) {
            return [];
        }
        
        $banco = new Database('boleto');
        return $banco->capturar_boletos_por_usuario((int)$idPessoa)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function CapturarBoletoPorId($idPessoa, $idBoleto) {
        if (!is_numeric($idPessoa) || $idPessoa <= 0 || !is_numeric($idBoleto) || $idBoleto <= 0) {
            return [];
        }
        
        $banco = new Database('pessoa');
        return $banco->capturar_boleto_por_id((int)$idPessoa, (int)$idBoleto)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function CapturarEmailExpositor($id) {
        if (!is_numeric($id) || $id <= 0) {
            return [];
        }
        
        $banco = new Database('pessoa_user');
        return $banco->capturar_email_expositor((int)$id)->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>