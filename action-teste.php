<?php
// Aqui você pode validar ou processar o dado do formulário, se quiser
// Por exemplo:
$nome = $_POST['nome'] ?? '';

// Simulando sucesso na ação
header("Location: teste.php?status=101");
exit;
