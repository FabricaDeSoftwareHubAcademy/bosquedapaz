<?php
$ips_permitidos = [
    '127.0.0.1',      // IP local (localhost)
    '::1',            // IP IPv6 (localhost)
];

$ip_visitante = $_SERVER['REMOTE_ADDR'];

if (!in_array($ip_visitante, $ips_permitidos)) {
    echo "Acesso negado! Você não tem autorização para entrar nessa pagina.";
    exit;
}

echo "Bem-vindo ao Bosque da Paz!";
?>
