<?php
class Database {
    private $servidor = "localhost";
    private $banco_de_dados = "gerenciar_expositor";
    private $usuario = "root";
    private $senha = "";
    public $conexao;

    public function __construct() {
        $this->conectar();
    }

    public function conectar() {
        $this->conexao = null;

        try {
            $this->conexao = new PDO("mysql:host=" . $this->servidor . ";dbname=" . $this->banco_de_dados, $this->usuario, $this->senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Conexão estabelecida.";
        } catch (PDOException $error) {
            echo "Erro na conexão com o banco de dados.";
            echo "<br>";
            echo $error->getMessage();
        }
        return $this->conexao;
    }

    // Comando para listar um expositor
    // SELECT * FROM expositores_pendentes WHERE id_expositor = ?
    public function listarPorId($id) {
        $sql = "SELECT * FROM expositores_pendentes WHERE id_expositor = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Comando para deletar expositor da tabela
    // DELETE FROM expositores_pendentes WHERE id_expositor = ?
    public function deletarExpositor($id) {
        $sql = "DELETE FROM expositores_pendentes WHERE id_expositor = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // Comando para adicionar expositor da tabela
    // INSERT INTO expositores_validados (nome, cpf, marca, numero_barraca, cor_rua) values (?, ?, ?, ?, ?)
    public function cadastrarExpositorValidado($nome, $email, $whatsapp, $cpf, $marca, $numero_barraca, $cor_rua) {
        $sql = "INSERT INTO expositores_validados (nome, email, whatsapp, cpf, marca, numero_barraca, cor_rua) values (:nome, :email, :whatsapp, :cpf, :marca, :numero_barraca, :cor_rua)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":whatsapp", $whatsapp);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":marca", $marca);
        $stmt->bindParam(":numero_barraca", $numero_barraca);
        $stmt->bindParam(":cor_rua", $cor_rua);
        return $stmt->execute();
    }

    // Funcionalidade para deletar usuario e validar ao mesmo tempo
    public function validarExpositor($id, $numero_barraca, $cor_rua) {
        $dados = $this->listarPorId($id);
        if ($dados) {
            if ($this->cadastrarExpositorValidado(
                $dados['nome'],
                $dados['email'],
                $dados['whatsapp'],
                $dados['cpf'],
                $dados['marca'],
                $numero_barraca,
                $cor_rua
            )) {
                return $this->deletarExpositor($id);
            }
        }
        return false;
    }
}

// $db = new Database();
// $conexao = $db->conectar();

?>