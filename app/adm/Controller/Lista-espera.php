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
    // SELECT * FROM expositores_pendentes
    public function listarExpositores() {
        $sql = "SELECT * FROM expositores_pendentes";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>