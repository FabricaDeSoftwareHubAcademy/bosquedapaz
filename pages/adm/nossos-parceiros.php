<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página para gerenciar parceiros e suas informações.">
    <title>Modelo de Tela</title>
    <link rel="stylesheet" href="../../css/css-adm/nossos-parceiros.css">
    <link rel="stylesheet" href="../../css/css-adm/style-padrao.css">
</head>
<body>

    <header class="menu-adm">
        <div class="logo">
            <img src="../../imgs/imagens-utilidades/logo 2 1.png" alt="Logo da Feira" class="img-logo">
        </div>

        <nav class="nav-bar">
            <ul class="nav-list">
                <li class="nav-item"><a href="#">Área Administrativa</a></li>
                <li class="nav-item"><a href="#">Eventos</a>
                    <ul class="submenu">
                        <li><a href="#" class="item-submenu">Cadastrar Evento</a></li>
                        <li><a href="#" class="item-submenu">Gerenciar Evento</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#">Expositores</a>
                    <ul class="submenu">
                        <li><a href="#" class="item-submenu">Cadastrar Expositor</a></li>
                        <li><a href="#" class="item-submenu">Cadastrar Expositor Kids</a></li>
                        <li><a href="#" class="item-submenu">Cadastrar Artista</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#">Carrossel</a>
                    <ul class="submenu">
                        <li><a href="#" class="item-submenu">Cadastrar Carrossel</a></li>
                        <li><a href="#" class="item-submenu">Editar Carrossel</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#">Categorias</a>
                    <ul class="submenu">
                        <li><a href="#" class="item-submenu">Todas Categorias</a></li>
                        <li><a href="#" class="item-submenu">Cadastrar Categorias</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#">Relatórios</a>
                    <ul class="submenu">
                        <li><a href="#" class="item-submenu">Relatório de Usuários</a></li>
                        <li><a href="#" class="item-submenu">Validação de Expositores</a></li>
                        <li><a href="#" class="item-submenu">Relatório de Expositores</a></li>
                        <li><a href="#" class="item-submenu">Relatório de Eventos</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#">Parceiros</a>
                    <ul class="submenu">
                        <li><a href="#" class="item-submenu">Cadastrar Parceiros</a></li>
                        <li><a href="#" class="item-submenu">Editar Parceiros</a></li>
                    </ul>
                </li>
            </ul>
            <button class="btn-login"><a href="#">Login</a></button>
        </nav>

        <div class="sandwich-menu" onclick="menuShow()">
            <img src="../img/menu.png" alt="Menu" class="menu">
        </div>

        <div class="login">
            <img src="../../imgs/imagens-utilidades/login 2 1.png" alt="Botão de login" class="img-login">
        </div>
    </header>

    <main class="principal">
        <div class="box">
            <h1 class="tela-titulo">NOSSOS PARCEIROS</h1>

            
            <div class="todo-conteudos">
                <div class="div-parceiros parceiros-pref">
                    <img src="../../imgs/cadastro-parceiros-dois/pref-cg.png" alt="Imagem de parceiro 1" class="img-pref">
                    <img src="../../imgs/cadastro-parceiros-dois/pref-cg.png" alt="Imagem de parceiro 2" class="img-pref">
                    <img src="../../imgs/cadastro-parceiros-dois/pref-cg.png" alt="Imagem de parceiro 3" class="img-pref">
                    <img src="../../imgs/cadastro-parceiros-dois/pref-cg.png" alt="Imagem de parceiro 4" class="img-pref">
                    <img src="../../imgs/cadastro-parceiros-dois/pref-cg.png" alt="Imagem de parceiro 5" class="img-pref">
                    <img src="../../imgs/cadastro-parceiros-dois/pref-cg.png" alt="Imagem de parceiro 6" class="img-pref">
                </div>
                
                
                <div class="geral">
                    <img src="../../imgs\cadastro-parceiros\Linha-vertical.png" alt="linha-central" class="linha-central">
                 
                    <img src="../../imgs\cadastro-parceiros\imagem-decoracao.png" alt="imagem-parceiros" class="img-g">
                </div>
                
            </div>
                
        </div>
    </main>

    <div class="bolas-fundo">
        <img src="../../imgs/imagens-bolas/bola-verde1.png" alt="Bola Fundo 1" class="bola-verde1">
        <img src="../../imgs/imagens-bolas/bola-verde2.png" class="bola-verde2">
        <img src="../../imgs/imagens-bolas/bola-rosa.png" class="bola-rosa">
    </div>

    <script src="../js/main.js"></script>
</body>
</html>
