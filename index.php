<?php
// Lista de IPs permitidos (somente IPv6)
$allowed_ips = [
    '::1',           // IP do localhost (IPv6)
    'fe80::756d:2022:8c78:1574%2'
];

// Obter o IP do visitante
$user_ip = $_SERVER['REMOTE_ADDR'];

// Verifica se o IP é válido e se é IPv6
if (filter_var($user_ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
    // Verificar se o IP está na lista de permitidos
    if (!in_array($user_ip, $allowed_ips)) {
        // Se o IP não for permitido, exibe uma mensagem e impede o acesso
        header('HTTP/1.1 403 Forbidden');
        echo "<h1>Acesso Negado</h1>";
        echo "<p>Seu endereço IP ($user_ip) não está autorizado a acessar esta pasta.</p>";
        exit;
    }
} else {
    // Se não for IPv6, exibe uma mensagem de erro
    header('HTTP/1.1 403 Forbidden');
    echo "<h1>Acesso Negado</h1>";
    echo "<p>Somente endereços IPv6 são permitidos.</p>";
    exit;
}
?>
