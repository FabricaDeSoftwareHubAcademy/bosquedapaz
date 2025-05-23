

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página para gerenciar parceiros e suas informações.">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico">
    <title>Adm - Bosque da Paz</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-listar-parceiros.css">
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
<?php include "../../../Public/assets/adm/menu-adm.html" ?>
    <main class="principal">
        <div class="box">
            <h2>PARCEIROS</h2>
            <div class="container">
                <div class="search-bar">
                    <label for="status">Procurar</label>
                    <input type="text" id="status" placeholder="Parceiros" />
                    <button class="search-button">BUSCAR</button>
                </div>
                <div class="table-container">
                    <table class="collaborators-table">
                        <thead>
                            <tr>
                                <th class="usuario-col">Parceiro</th>
                                <th>Contato</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="usuario-col">Shopping Bosque dos Ipês</td>
                                <td>João</td>
                                <td>(67)99999-9999</td>
                                <td>bosquedosipes@bosque.com</td>
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a href="#modal-editar" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                    <a href="#modal-recusar" class="delete-icon">
                                        <i class="fa-solid fa-trash open-modal" data-modal="delete-modal"></i>
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="usuario-col">Prefeitura de Campo Grande</td>
                                <td>Rosângela</td>
                                <td>(67)99999-9999</td>
                                <td>prefeituracgr@prefeitura.com</td>
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a href="#modal-editar" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                    <a href="#modal-recusar" class="delete-icon">
                                        <i class="fa-solid fa-trash open-modal" data-modal="delete-modal"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuario-col">Sebrae</td>
                                <td>Greyce</td>
                                <td>(67)99999-9999</td>
                                <td>sebrae@sebrae.com</td>
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a href="#modal-editar" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                    <a href="#modal-recusar" class="delete-icon">
                                        <i class="fa-solid fa-trash open-modal" data-modal="delete-modal"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuario-col">Senac</td>
                                <td>Amaury</td>
                                <td>(67)99999-9999</td>
                                <td>senac@senac.com</td>
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a href="#modal-editar" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                    <a href="#modal-recusar" class="delete-icon">
                                        <i class="fa-solid fa-trash open-modal" data-modal="delete-modal"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="usuario-col">Sectur</td>
                                <td>Elizeu</td>
                                <td>(67)99999-9999</td>
                                <td>secur@sectur.com</td>
                                <td><button class="status active">Ativo</button></td>
                                <td>
                                    <a href="#modal-editar" class="edit-icon">
                                        <i class="fa-solid fa-pen-to-square open-modal" data-modal="edit-modal"></i>
                                    </a>
                                    <a href="#modal-recusar" class="delete-icon">
                                        <i class="fa-solid fa-trash open-modal" data-modal="delete-modal"></i>
                                    </a>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="btns">
            <a href="Area-Adm.php" class="voltar">
                <img src="../../../Public/imgs/img-listar-colaboradores/btn-voltar.png" alt="Botão de voltar" class="btn-voltar">
            </a>
        </div>

        <!-- Modal de Editar -->
        <div class="acao-editar" id="modal-editar">
            <div class="acao-content-editar">
                <h1 class="acao-texto-editar">Editar parceiro</h1>
                <!-- Contêiner para os inputs com a classe 'acao-inputs' -->
                <div class="acao-inputs">
                    <div class="input-group">
                        <label for="input1" class="acao-label">Parceiro</label>
                        <input id="input1" class="acao-input-edit" type="text" value="SENAC-Serviço Nacional de Aprendizagem Comercial">
                    </div>
                    <div class="input-group">
                        <label for="input2" class="acao-label">Telefone</label>
                        <input id="input2" class="acao-input-edit" type="text" value="(67) 3312-6260">
                    </div>
                    <div class="input-group">
                        <label for="input3" class="acao-label">Email</label>
                        <input id="input3" class="acao-input-edit" type="text" value="atendimento@ms.senac.br">
                    </div>
                    <div class="input-group">
                        <label for="input4" class="acao-label">Contato</label>
                        <input id="input4" class="acao-input-edit" type="text" value="João Pedro Costa Silva">
                    </div>
                    <div class="input-group">
                        <label for="input5" class="acao-label">Tipo</label>

                        <select name="todas_categorias" id="todas_categorias" class="acao-input-edit">

                            <option value="">selecione</option>
                            <option value="artesanato">Fisica</option>
                            <option value="gastronia">Jurídica</option>

                        </select>
                    </div>
                    <div class="input-group">
                        <label for="input6" class="acao-label">CPF/CNPJ</label>
                        <input id="input6" class="acao-input-edit" type="text" value="03.743.319/0001-52">
                    </div>
                    <div class="input-group">
                        <label for="input7" class="acao-label">Logo</label>
                        <input type="file" class="acao-input-edit" name="file" id="file" required>
                    </div>
                    <div class="input-group">
                        <label for="input8" class="acao-label">CEP</label>
                        <input id="input8" class="acao-input-edit" type="text" value="79002-141">
                    </div>
                </div>
                <div class="acao-botoes-editar">
                    <a href=""><button class="botao-cancelar">Cancelar</button></a>
                    <a href="#recusado-sucesso"><button class="botao-confirmar">Salvar</button></a>
                </div>
            </div>
        </div>


        <!-- Modal de Delete -->
        <div class="acao-recusar" id="modal-recusar">
            <div class="acao-content-recusar">
                <h1 class="acao-texto-recusar">Deseja excluir o parceiro?</h1>
                <div class="acao-botoes-recusar">
                    <a href=""><button class="botao-cancelar">Cancelar</button></a>
                    <a href="#recusado-sucesso"><button class="botao-confirmar">Excluir</button></a>
                </div>
            </div>
        </div>

        <!-- Modal confirmação -->
        <div class="mensagem-recusar" id="recusado-sucesso">
            <div class="mensagem-content-recusar">
                <h1 class="mensagem-texto-recusar">Concluído com sucesso!</h1>
                <a href="#"><button class="botao-confirmar">Confirmar</button></a>
            </div>
        </div>


    </main>

    <div class="bolas-fundo">
        <img src="../../../Public/imgs/imagens-bolas/bola azul1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../../Public/imgs/imagens-bolas/bola azul2.png" alt="Bola Fundo 2" class="bola-verde2">
        <img src="../../../Public/imgs/imagens-bolas/bola azu.png" alt="Bola Fundo 3" class="bola-rosa">
    </div>

    <script src="../../../Public/js//js-adm/status-colaborador.js"></script>
    <script src="../../../Public/js/js-modais/js-abrir-modal.js" defer></script>
</body>

</html>