<?php
$ips_permitidos = [
    // '::1'
];

$ip_usuario = $_SERVER['REMOTE_ADDR'];

if(filter_var($ip_usuario, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
    if (in_array($ip_usuario, $ips_permitidos)) {
        header("Location: Todos/");
        exit;
    }
    else {
        header("HTTP/1.1 403 Forbidden");
        echo "<p>O seu endereço IP não está na lista de conexão permitida.</p>";
        echo "<p>IP: ($ip_usuario)</p>";
        exit;
    }
}
else {
    header("HTTP/1.1 403 Forbidden");
    echo "<p>Esse tipo de acesso não está permitido.</p>";
    echo "<p>Endereço IPV6 requerido.</p>";
    exit;
}
?>