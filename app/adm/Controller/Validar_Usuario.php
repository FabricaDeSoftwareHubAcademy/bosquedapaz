<?php
session_start();

class Database {
    private $host = 'localhost';
    private $db = 'banco_info';
    private $user = 'root';
    private $pass = '';
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            die("Erro de conexão: " . $this->conn->connect_error);
        }
    }

    public function close() {
        $this->conn->close();
    }
}

class UsuarioManager {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function buscarUsuario($id_usuario) {
        $stmt = $this->conn->prepare("SELECT * FROM info_usuarios WHERE id_usuario = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();
        $stmt->close();
        return $usuario;
    }

    public function inserirExpositorValidado($nome, $cpf, $marca, $numero_barraca, $cor_rua) {
        $stmt = $this->conn->prepare("
            INSERT INTO expositores_validados (nome, cpf, marca, numero_barraca, cor_rua)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("sssss", $nome, $cpf, $marca, $numero_barraca, $cor_rua);
        $executado = $stmt->execute();
        $stmt->close();
        return $executado;
    }

    public function deletarUsuario($id_usuario) {
        $stmt = $this->conn->prepare("DELETE FROM info_usuarios WHERE id_usuario = ?");
        $stmt->bind_param("i", $id_usuario);
        $executado = $stmt->execute();
        $stmt->close();
        return $executado;
    }

    public function validarExpositor($id_usuario, $numero_barraca, $cor_rua) {
        $usuario = $this->buscarUsuario($id_usuario);
        if ($usuario) {
            if ($this->inserirExpositorValidado(
                $usuario['nome'],
                $usuario['cpf'],
                $usuario['marca'],
                $numero_barraca,
                $cor_rua
            )) {
                return $this->deletarUsuario($id_usuario);
            }
        }
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['validar-expositor'])) {
    $id_usuario = $_POST['id_usuario'] ?? null;
    $numero_barraca = $_POST['numero_barraca'] ?? '';
    $cor_rua = $_POST['selecao-cores'] ?? '';

    $db = new Database();
    $manager = new UsuarioManager($db->conn);

    if ($id_usuario && $manager->validarExpositor($id_usuario, $numero_barraca, $cor_rua)) {
        $_SESSION['status-validar'] = 'success';
    } else {
        $_SESSION['status-validar'] = 'error';
    }

    $db->close();

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
