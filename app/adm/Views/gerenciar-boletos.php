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

                <div class="espacamento"></div>
                
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
                
                <div class="espacamento"></div>
    
                <!-- filtro de status -->
                <div class="filtro-status">
                    <label for="">Filtrar por Status</label>
                    <select name="" id="campo_status" class="campo-status">
                        <option value="">Procurar por Status</option>
                        <option value="pago">Pago</option>
                        <option value="pendente">Pendente</option>
                    </select>
                </div>

                <div class="espacamento"></div>

                <!-- botao para filtrar -->
                <div class="area-filtragem">
                    <label for="">Realizar Pesquisa</label>
                    <button class="botao-filtrar">Filtrar</button>
                </div>
            </div>

            <div class="area-table-lisEsp">
                <table class="table-lisEsp">
                    <thead>
                        <tr>
                            <th>Expositor</th>
                            <th>Vencimento</th>
                            <th>Referência</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Arlindo Nobrega de Souza</td>
                            <td>12/05/2024</td>
                            <td>Abril</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pago">Pago</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                        <tr>
                            <td>Roberto Carlos</td>
                            <td>13/05/2024</td>
                            <td>Janeiro</td>
                            <td>R$ 2500,50</td>
                            <td><button class="botao-status status-pendente">Pendente</button></td>
                            <td><button><i class="fa-solid fa-pen"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</body>
</html>