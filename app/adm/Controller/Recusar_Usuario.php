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

    public function recusarExpositor($id_usuario) {
        $stmt = $this->conn->prepare("DELETE FROM info_usuarios WHERE id_usuario = ?");
        $stmt->bind_param("i", $id_usuario);
        $executado = $stmt->execute();
        $stmt->close();
        return $executado;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recusar-expositor'])) {
    $id_usuario = $_POST['id_usuario'] ?? null;

    $db = new Database();
    $manager = new UsuarioManager($db->conn);

    if ($id_usuario && $manager->recusarExpositor($id_usuario)) {
        $_SESSION['status-recusar'] = 'success';
    } else {
        $_SESSION['status-recusar'] = 'error';
    }

    $db->close();

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
