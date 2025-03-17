<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Gerenciamento de Boletos</title>
    <link rel="stylesheet" href="../../../Public/css/css-adm/style-gerenciar-boletos.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../Public/css/menu-adm.css">
    <link rel="shortcut icon" href="../../../Public/assets/icons/folha.ico" >
</head>

<body class="body-boletos">
<?php include "../../../Public/assets/adm/menu-adm.html"; ?>
    <div class="box-boletos">
        <div class="area-title-boletos">
            <h1 class="title-boletos">Gerenciamento de Boletos</h1>
        </div>

        <div class="content-boletos">
            <div class="area-filtros-boletos">
                <!-- filtro de expositor -->
                <div class="filtro-expositor">
                    <label for="">Filtrar por Expositor</label>
                    <input type="text" name="" id="campo_expositor" class="campo-expositor" placeholder="Pesquisar por Expositor">
                </div>
                
                <!-- filtro de datas -->
                <div class="filtro-datas">
                    <div class="campo-data">
                        <label>Data Inicial</label>
                        <input type="date" name="" id="campo_data_inicial" class="campo-data-inicial">
                    </div>
    
                    <div class="campo-data">
                        <label>Data Inicial</label>
                        <input type="date" name="" id="campo_data_inicial" class="campo-data-inicial">
                    </div>
                </div>
    
                <!-- filtro de status -->
                <div class="filtro-status">
                    <label for="">Filtrar por Status</label>
                    <select name="" id="campo_status" class="campo-status">
                        <option value="">Procurar por Status</option>
                        <option value="pago">Pago</option>
                        <option value="pendente">Pendente</option>
                    </select>
                </div>
            </div>


            <div class="table-container">
                <table class="collaborators-table">
                    <thead>
                        <tr>
                            <th class="usuario-col">Expositor</th>
                            <th>Vencimento</th>
                            <th>Referência</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th class="fone-col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <tr>
                                <td class="usuario-col">Evento <?php echo $i; ?></td>
                                <td class="usuario-col">Evento <?php echo $i; ?></td>
                                <td>Data <?php echo $i; ?></td>
                                <td>R$ 1,200</td>
                                <td><button class="status <?php echo ($i % 2 == 0) ? 'pendente' : 'pago'; ?>"> <?php echo ($i % 2 == 0) ? 'Pendente' : 'Pago'; ?></button></td>
                                <td class="mais"><button class="open-modal"><i class="fa-solid fa-plus"></i></button></td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</body>
</html>