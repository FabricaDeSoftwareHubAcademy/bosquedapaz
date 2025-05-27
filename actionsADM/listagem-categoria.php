<?php
    require_once '../app/adm/Controller/Categoria.php';

    $cat = new Categoria();
    $cats= $cat->listar();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listar</title>
    <style>
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table border="1" class="table tabela-alunos mt-3">
        <thead>
            <td>Id Categoria</td>
            <td>Descrição</td>
            <td>Cor</td>
            <td>Icone</td>
            <td>Editar</td>
            <td>Excluir</td>
        </thead>
        <tbody id="aluno-list">
            <?php
                    foreach($cats as $categoria):
                      ?>
                      <tr>
                        <td><?php echo $categoria->id_categoria?></td>
                        <td><?php echo $categoria->descricao?></td>
                        <td><?php echo $categoria->cor?></td>
                        <td style="background-color: <?php echo $categoria->cor?>;"><img id="ft" src="<?php echo $categoria->icone?>"></td>
                        <td><a href="editar.php?id_categoria=<?php echo $categoria->id_categoria; ?>">Editar</a></td>
                        <td><a href="excluir.php?id_categoria=<?php echo $categoria->id_categoria; ?>">Excluir</a></td>
                      </tr>
                      <?php
                    endforeach;
            ?>
        </tbody>
    </table>
</body>
</html>