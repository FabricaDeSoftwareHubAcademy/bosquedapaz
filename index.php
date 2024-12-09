<?php
// Lista de IPs permitidos
$allowed_ips = [
    '127.0.0.1', // IP do localhost
    '10.28.1.147' // IP Guilherme
];

// Obter o IP do visitante
$user_ip = $_SERVER['REMOTE_ADDR'];

// Verificar se o IP está na lista de permitidos
if (!in_array($user_ip, $allowed_ips)) {
    // Se o IP não for permitido, exibe uma mensagem e impede o acesso
    header('HTTP/1.1 403 Forbidden');
    echo "<h1>Acesso Negado</h1>";
    echo "<p>Seu endereço IP ($user_ip) não está autorizado a acessar esta pasta.</p>";
    exit;
}
?>