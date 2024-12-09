<?php
// Lista de IPs permitidos (somente IPv4)
$allowed_ips = [
    '127.0.0.1', // IP do localhost (IPv4)
    '10.28.1.147' // Exemplo de IP permitido (substitua pelo IP correto)
];

// Obter o IP do visitante
$user_ip = $_SERVER['REMOTE_ADDR'];

// Verifica se o IP é válido e se é IPv4
if (filter_var($user_ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
    // Verificar se o IP está na lista de permitidos
    if (!in_array($user_ip, $allowed_ips)) {
        // Se o IP não for permitido, exibe uma mensagem e impede o acesso
        header('HTTP/1.1 403 Forbidden');
        echo "<h1>Acesso Negado</h1>";
        echo "<p>Seu endereço IP ($user_ip) não está autorizado a acessar esta pasta.</p>";
        exit;
    }
} else {
    // Se não for IPv4, exibe uma mensagem de erro (se necessário)
    header('HTTP/1.1 403 Forbidden');
    echo "<h1>Acesso Negado</h1>";
    echo "<p>Somente endereços IPv4 são permitidos.</p>";
    exit;
}
?>
