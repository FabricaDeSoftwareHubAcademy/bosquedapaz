<?php
session_start();

$host = 'localhost';
$db = 'banco_info';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['validar-expositor'])) {
    $id_usuario = $_POST['id_usuario'] ?? null;

    if ($id_usuario) {
        $stmt = $conn->prepare("DELETE FROM info_usuarios WHERE id_usuario = ?");
        $stmt->bind_param("i", $id_usuario);

        if ($stmt->execute()) {
            $_SESSION['status'] = 'success';
        } else {
            $_SESSION['status'] = 'error';
        }

        $stmt->close();
    } else {
        $_SESSION['status'] = 'error';
    }

    

    $conn->close();

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
