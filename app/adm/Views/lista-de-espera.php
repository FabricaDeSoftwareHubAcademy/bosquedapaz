<?php
require_once __DIR__ . '../../Controller/Lista-Espera.php'; // Altere para o caminho real do arquivo ListaEspera

$lista = new Expositor();
$dados = $lista->ListarExpositores();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../../Public/css/menu-adm.css" />
  <link rel="stylesheet" href="../../../Public/css/css-adm/style-lista-de-espera.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" />
  <title>Adm - Bosque da Paz</title>
</head>

<body>
  <?php include "../../../Public/assets/adm/menu-adm.html" ?>

  <main class="principal">
    <div class="box">
      <h2>Lista de Espera</h2>
      <div class="area-pesquisa">
        <form method="GET" class="div-pesquisa">
          <input type="text" name="busca" placeholder="Expositor" value="<?= htmlspecialchars($busca) ?>" />
          <button class="button-buscar" type="submit">BUSCAR</button>
        </form>

        <div class="table-area">
          <table class="table">
            <thead>
              <tr>
                <th class="nome">Nome</th>
                <th class="email">Email</th>
                <th class="cat">Categoria</th>
                <th class="telefone">Telefone</th>
                <th>Perfil</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($dados)) : ?>
                <?php foreach ($dados as $dado) : ?>
                  <tr>
                    <td><?= htmlspecialchars($dado->nome) ?></td>
                    <td><?= htmlspecialchars($dado->email) ?></td>
                    <td><?= htmlspecialchars($dado->categoria) ?></td>
                    <td><?= htmlspecialchars($dado->whatsapp) ?></td>
                    <td class="perfil">
                      <a href="tela-gerenciar-expositor.php?id=<?php echo $dado->id_expositor ?>">
                        <i class="bi bi-person-badge"></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else : ?>
                <tr>
                  <td colspan="5" style="text-align: center;">Nenhum expositor encontrado.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <div class="btn-v">
          <a href="Area-Adm.php" class="voltar">
            <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar" />
          </a>
        </div>
      </div>
    </div>
  </main>

  <div class="bolas-fundo">
    <img class="bola-azul1" src="../../../Public/imgs/imagens-bolas/azul-sem-fundo1.png" alt="" />
    <img class="bola-azul2" src="../../../Public/imgs/imagens-bolas/azul-sem-fundo2.png" alt="" />
    <img class="bola-azul3" src="../../../Public/imgs/imagens-bolas/azul-sem-fundo3.png" alt="" />
  </div>

  <script src="../../../Public/js/js-adm/status-colaborador.js"></script>
</body>
</html>
