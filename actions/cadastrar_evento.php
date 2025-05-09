<?php
require_once './app/adm/Controller/Evento.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $evento = new Evento();

    $evento->setNome($_POST['nomedoevento']);
    $evento->setDescricao($_POST['descricaodoevento']);
    $evento->setData($_POST['dataevento']); // corrigido para bater com o campo no HTML

    // Upload do banner
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $nome_arquivo = $_FILES['file']['name'];
        $caminho_temp = $_FILES['file']['tmp_name'];
        $destino = '../../../Public/uploads/' . $nome_arquivo;

        // Cria o diretório, se não existir
        if (!is_dir('../../../Public/uploads/')) {
            mkdir('../../../Public/uploads/', 0755, true);
        }

        if (move_uploaded_file($caminho_temp, $destino)) {
            $evento->setBanner($destino);
        } else {
            echo "<script>alert('Erro ao salvar o arquivo.');</script>";
            exit;
        }
    } else {
        echo "<script>alert('Erro no upload do banner.');</script>";
        exit;
    }

    $res = $evento->cadastrar();

    if ($res) {
        echo '<script>alert("Evento cadastrado com sucesso!"); window.location.href="Area-Adm.php";</script>';
    } else {
        echo '<script>alert("Erro ao cadastrar evento.");</script>';
    }

    exit;
}
?>