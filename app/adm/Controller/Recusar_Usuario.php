<?php
if (isset($_POST['id_usuario'])) {
    $id = $_POST['id_usuario'];

    $conn = new mysqli("localhost", "root", "", "banco_info");

    if ($conn->connect_error) {
        http_response_code(500);
        exit("Erro de conexão");
    }

    $stmt = $conn->prepare("DELETE FROM info_usuarios WHERE id_usuario = ?");
    $stmt->bind_param("i", $id);

    $stmt->execute();

    $stmt->close();
    $conn->close();
}
?>
