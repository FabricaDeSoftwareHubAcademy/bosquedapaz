<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/css/css-adm/styles-gerenciar-eventos.css">
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <title>Gerenciar Eventos</title>
</head>

<body>
<?php 
    include "../../../Public/assets/adm/menu-adm.html"; 
?>
    <main class="principal">
        <div class="box">
            <h1 class="titulo">Gerenciar Eventos</h1>
            <div class="form-box">
                <div class="input-pesquisar">
                    <!-- <div class="input-group">
                        </div> -->
                    <h3>Procurar Por:</h3>
                    <input type="text" name="pesquisa" id="pesquisa">
                    <button class="buscar">BUSCAR</button>
                </div>
            </div>
            <div class="div-tabela">
                <table class="tab-eventos">
                    <thead>
                        <tr>
                            <th>Nome do Evento</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Editar</th>
                            <th>Fotos</th>
                        </tr>
                    </thead>
                    <tbody id="">
                        <tr>
                            <td>
                                teste
                            </td>
                            <td>
                                teste
                            </td>
                            <td>
                                <button class="finalizado">Finalizado</button>
                            </td>
                            <td>
                                <a href=""><img src="../../../Public/imgs/gerenciar-eventos/Edit.png" alt="Botão-Editar"></a>
                            </td>
                            <td>
                                <button class="open-modal" data-modal="modal-fotos">
                                    <img src="../../../Public/imgs/gerenciar-eventos/Frame.png" alt="Adicionar Fotos">
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                teste
                            </td>
                            <td>
                                teste
                            </td>
                            <td>
                                <button class="em_curso">Em Curso</button>
                            </td>
                            <td>
                                <a href=""><img src="../../../Public/imgs/gerenciar-eventos/Edit.png" alt="Botão-Editar"></a>
                            </td>
                            <td>
                                <button class="open-modal" data-modal="modal-fotos">
                                    <img src="../../../Public/imgs/gerenciar-eventos/Frame.png" alt="Adicionar Fotos">
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="Area-Adm.php" class="voltar-link">
                <div class="b-voltar">
                    <button class="voltar">
                        <img src="../../../Public/imgs/img-area-contate/seta-voltar.png" class="btn-voltar">
                    </button>
                </div>
            </a>
            <div class="botoes">
                <a href="../../../app/adm/Views/cadastro-evento.php"><button class="novo-evento">Novo Evento</button></a>
            </div>
        </div>
    </main>
    <div class="modal" id="modal-fotos">
        <div class="modal-content">
            <span class="close-modal" data-modal="modal-fotos">&times;</span>
            <h3>Adicionar Fotos ao Evento</h3>
            <p>Limite de 5 Fotos por Evento</p>
            <input type="file" multiple>
            <button class="submit-fotos">Adicionar Fotos</button>
        </div>
    </div>
    
    <div class="bolas-fundo">
        <img src="../../../Public/imgs/imagens-bolas/bola azul1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola azul2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola azu.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js/js-menu/js-menu.js" defer></script>
    <script src="../../../Public/js/js-adm/modal-gerenciar-eventos.js" defer></script>
</body>

</html>