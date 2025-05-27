<?php
require_once '../../app/adm/Controller/Gerenciar-Expositor.php';
if (isset($_POST['botao-alterar-categoria'])) {
    $id = $_POST['id_expositor'];
    $categoria = $_POST['select-alterar-categoria'];

    $expositor = new Expositor();
    $res = $expositor->AlterarCategoria($id, $categoria);

    if ($res) {
        // Exemplo: recarrega a página com uma mensagem
        header("Location: ../../app/adm/Views/tela-gerenciar-expositor.php?id=" . $id);
        exit;
    } else {
        echo "Erro ao atualizar a categoria.";
    }
}

?>