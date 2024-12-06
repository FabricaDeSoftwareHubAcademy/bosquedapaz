<?php
$ips_permitidos = [
    "10.28.1.147",
];

$ip_visitante = $_SERVER['REMOTE_ADDR'];

if (!in_array($ip_visitante, $ips_permitidos)) {
    echo "Acesso negado! Você não tem autorização para entrar nessa pagina.";
    exit;
}

echo "Bem-vindo ao Bosque da Paz!";
?>
