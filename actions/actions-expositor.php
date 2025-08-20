<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


//////// IMPORTS DE ARQUIVOS \\\\\\\\\\\\\\\\\

require_once('../vendor/autoload.php');
require_once('../app/helpers/login.php');

use app\Controller\Expositor;
use app\Controller\Imagem;
use app\suport\Csrf;



/////////////////// FUNCOES \\\\\\\\\\\\\\\\

function uploadImagem($img) {
    // chmod ("../Public/uploads/uploads-carrosel/", 0777);
    $caminho = '../Public/uploads/uploads-expositor/';
    $new_img = $img['name'];
    $new_name = uniqid();
    $extencao_imagem = strtolower(pathinfo($new_img, PATHINFO_EXTENSION));
    
    $caminho_img = $caminho . $new_name. '.'. $extencao_imagem;
    
    $upload_img = move_uploaded_file($img['tmp_name'], $caminho_img);
    
    return $caminho_img;
}

function getImagens($imgs){
    $arrayImagens = array();
    
    foreach ($imgs as $key => $value) {
    
        $i = 0;
        
        do {
            $arrayImagens['imagem'.$i+1][$key] = $imgs[$key][$i];
            $i++;
        } while ($i < count($imgs['name']));
    }
    
    return $arrayImagens;
}

function limparMaskTelefone($tel){
    return preg_replace('/[^0-9]/', '', $tel);
}

function linkInstagram($ins){
    return 'https://instagram.com/'.trim($ins, '@');
}

/////////////////// MEDOTO POST ///////////////////

if(isset($_POST['tolkenCsrf']) && Csrf::validateTolkenCsrf($_POST['tolkenCsrf'])){
    try {
    
    $expositor = new Expositor();
    

    ///////////////  INATIVAR UM EXPOSITOR \\\\\\\\\\\\\\\\\\\\\
    if(isset($_POST['deletar'])){
        if(!confirmaLogin(1)){
            echo json_encode([
                'msg' => 'Login Inválido',
            ]);
            http_response_code(400);
            exit;
        }

        $id = htmlspecialchars(strip_tags($_POST['id']));
        $status = htmlspecialchars(strip_tags($_POST['status']));

        $mudarStatus = $expositor->alterarStatus($id, $status);

        if ($mudarStatus){
            echo json_encode([
                'status' => 200, 
                'msg' => 'Status alterado com sucesso', 
            ]);
            exit;
        }else {
            echo json_encode([
                'status' => 400, 
                'msg' => 'Erro ao alterar o status do expositor', 
            ]);
            exit;
        }

    //////////// CADASTRAR UM NOVO EXPOSITOR \\\\\\\\\\\\\\\\
    }else if (isset($_POST['cadastrar'])) {

            ////////////////// VALIDANDO O EMAIL\\\\\\\\\\\\\


            $email = htmlspecialchars(strip_tags($_POST['email']));
            
            $emailExiste = $expositor->emailExiste($email);
            if($emailExiste){
                echo json_encode([
                    'msg' => 'Não é possivel cadastrar, email existente',
                ]);
                http_response_code(400);
                exit;
            }

            $cpf = htmlspecialchars(strip_tags($_POST['cpf']));
            
            $cpfExiste = $expositor->cpfExiste($cpf);
            if($cpfExiste){
                echo json_encode([
                    'msg' => 'Não é possivel cadastrar, CPF existente',
                ]);
                http_response_code(400);
                exit;
            }

            ////// SETANDO DADOS \\\\\\\\\\\\

            /////// DADOS LOGIN \\\\\\\\\\\
            
            $expositor->setEmail($email);

            /////// DADOS ENDEREÇO \\\\\\\\
    
            $expositor->setCidade(htmlspecialchars(strip_tags($_POST['cidade'])));
    
            ////// DADOS PESSOA \\\\\\\\\\\
            $expositor->setNome(            htmlspecialchars(strip_tags($_POST['nome'])));
            $expositor->setCpf(             htmlspecialchars(strip_tags($_POST['cpf'])));
            $expositor->setWhats(           'https://wa.me/55'.limparMaskTelefone(htmlspecialchars(strip_tags($_POST['whats']))));
            $expositor->setTelefone(        limparMaskTelefone(htmlspecialchars(strip_tags($_POST['whats']))));
            $expositor->setlink_instagram(  linkInstagram(htmlspecialchars(strip_tags($_POST['link_instagram']))));

            $aceitou = '';

            if (isset($_POST['aceitou_termos'])) {
                $aceitou = $_POST['aceitou_termos']; // vem do input hidden do admin
            } elseif (isset($_SESSION['aceitou_termos'])) {
                $aceitou = $_SESSION['aceitou_termos']; // vem da sessão do visitante
            }

            

            //////// IMAGENS \\\\\\\\


            /// verificando se exite imagens
            if (isset($_FILES)) {
                if (count($_FILES) == 6){
                    ///////// MOVENDO A IMAGEM DE PERFIL ////////////
                    
                    // separa es imagens
                    $imagens = $_FILES;
    
                    $caminhosImagens = array();
                    
                    // move as imagens
                    foreach ($imagens as $img) {
                        // verifica quantos mb
                        if( 5 < ($img['size'] / 1024) / 1024){
                            echo json_encode([
                                'msg' => 'Imagem enviada muito grande', 
                            ]);
                            http_response_code(400);
                            exit;
                        }
    
                        $extencao_imagem = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
                        
                        // verifiva qual o tipo de extenção
                        if($extencao_imagem != 'jpg' && $extencao_imagem != 'jpeg' && $extencao_imagem != 'png'){
                            echo json_encode([
                                'msg' => 'Caminho '. $extencao_imagem. ' inválido.', 
                            ]);
                            http_response_code(400);
                            exit;
                        }
                        $caminhosImagens[] = uploadImagem($img);
                    }
                    
                    $expositor->imagens = $caminhosImagens;
    
                    
                }else {
                    echo json_encode([
                        'msg' => 'É necessário enviar 6 imagens para realizar o cadastro', 
                    ]);
                    http_response_code(400);
                    exit;
                }
            }else {
                echo json_encode([
                    'msg' => 'É necessário enviar imagens para realizar o cadastro', 
                ]);
                http_response_code(400);
                exit;
            }
            
            
            //////// DADOS EXPOSITOR \\\\\\\\\\\\\
            $expositor->setNome_marca(     htmlspecialchars(strip_tags($_POST['marca'])));
            $expositor->setVoltagem(       htmlspecialchars(strip_tags($_POST['voltagem'])));
            $expositor->setEnergia(        htmlspecialchars(strip_tags($_POST['energia'])));
            $expositor->setTipo(           htmlspecialchars(strip_tags($_POST['tipo'])));
            $expositor->setId_categoria(   htmlspecialchars(strip_tags($_POST['id_categoria'])));
            $expositor->setDescricao('');
            
            
            ///////// CADASTRANDO NO BD \\\\\\\\\\\\\
            $res = $expositor->cadastrar();
            

            ////////// ENVIANDO RESPOSTA \\\\\\\\\ 
            if($res){
                echo json_encode([
                    'msg' => 'Expositor cadastrado com sucesso!',
                ]);
                http_response_code(200);
                exit;
            }else{
                echo json_encode([
                    'msg' => 'Não foi possível realizar o cadastro de expostor!',
                ]);
                http_response_code(400);
                exit;
            }   

    }
    } catch (\Throwable $th) {
        echo json_encode([
            'msg' => 'Falha no servidor!!'
        ]);
        http_response_code(500);
        exit;
    }
}


header('Content-Type: application/json');

/////////////////// MEDOTO GET ///////////////////

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    try{
        $expositor = new Expositor();
        $imagem = new Imagem();
        
        function returnResponse($dados){
            return $dados ? ['expositor' => $dados, 'status' => 200] : ['msg' => 'Nenhum expositor foi encontrado.', 'status' => 400];
        }

        function litarCategoria($expositor){
            if(isset($_GET['categoria'])){
                $dados = $expositor->listar(
                    "descricao = '".htmlspecialchars(strip_tags($_GET['categoria']))."'and status_pes = 'ativo'", 
                    "status_pes", 
                    null, 
                    'home'
                );
                return $dados;
            }else {
                return [];
            }
        }

        function filtrarExpositor($expositor,$tipo, $dados = 'adm'){
            $where = [
                'filtrarValidos' => "validacao = 'validado'",
                'filtrarAguardando' => "validacao = 'aguardando'",
                'filtrarHome' => "status_pes = 'ativo'",
            ];
            if(isset($_GET[$tipo])){
                $dados = $expositor->filtrar(
                    htmlspecialchars(strip_tags($_GET[$tipo])), 
                    $where[$tipo],
                    $dados
                );
                return $dados;
            }else {
                return [];
            }
        }

        function buscarExpositorPorId($expositor, $imagem, $tipo){
            $where = [
                'idHome' => 'home',
                'idAdm' => 'adm',
            ];

            if(isset($_GET[$tipo])){
                $dados = $expositor->listar(
                    "id_expositor = '".htmlspecialchars(strip_tags($_GET[$tipo]))."'", 
                    null, 
                    null,
                    $where[$tipo]
                );
                $dados[0]['imagens'] = $imagem->listar(htmlspecialchars(strip_tags($_GET[$tipo])));
                return $dados;
            }else {
                return [];
            }
        }



        $rotas = [
            // filtrar expositores em espera
            'emEspera' => fn() => $expositor->listar(
                "validacao = 'aguardando'", 
                "status_pes"
            ),

            // filtra expositorers recusados
            'recusado' => fn() => $expositor->listar(
                "validacao = 'recusado'", 
                "status_pes"
            ),

            //filtar expositor pelo id o retorna as fotos home
            'idHome' => fn() => buscarExpositorPorId($expositor, $imagem,'idHome')[0],

            //filtar expositor pelo id o retorna as fotos, adm
            'idAdm' => fn() => buscarExpositorPorId($expositor, $imagem, 'idAdm')[0],

            // filtrar expositor inativos
            'inativo' => fn() => $expositor->listar(
                "status_pes = 'inativo'", 
                "status_pes"
            ),

            //filtra expositor por categoria na home
            'categoria' => fn() => litarCategoria($expositor),

            //filtra expositor validos pelo input 
            'filtrarValidos' => fn() => filtrarExpositor($expositor, 'filtrarValidos'),

            //filtra expositor aguardando pelo input 
            'filtrarAguardando' => fn() => filtrarExpositor($expositor, 'filtrarAguardando'),

            //filtra expositor ativos pelo input 
            'filtrarHome' => fn() => filtrarExpositor($expositor, 'filtrarHome', 'home'),

            //filtra todos expositor ativos
            'home' => fn() => $expositor->listar(
                "status_pes = 'ativo' and validacao = 'validado'", 
                "RAND()", 
                null, 
                'home'
            ),

            //filtrar todos os expositor validados
            'adm' => fn() => $expositor->listar(
                "validacao = 'validado'", 
                "status_pes", 
                null, 
                'adm'
            ),

            //filta 10 expositor aleatorios ativos
            'rand' => fn() => $expositor->listar(
                "status_pes = 'ativo' and validacao = 'validado'", 
                "RAND()", 
                '10', 
                'home'
            ),
        ];

        foreach ($rotas as $rota => $listar) {
            if(isset($_GET['adm']) || isset($_GET['emEspera']) || isset($_GET['recusado']) || isset($_GET['idAdm']) || isset($_GET['inativo']) || isset($_GET['filtrarAguardando']) || isset($_GET['filtrarAguardando']) || isset($_GET['filtrarAguardando'])){
                if(!confirmaLogin(1)){
                    echo json_encode([
                        'msg' => 'Login Inválido',
                    ]);
                    http_response_code(400);
                    exit;
                }
            }
            if(isset($_GET[$rota])){
                $response = returnResponse($listar());
                echo json_encode($response);
                exit;
            }
        }

        echo json_encode($response ?? ['msg' => 'Nenhum parâmetro válido', 'status' => 400]);


    } catch (\Throwable $th) {
        $response = [
            'status' => 500,
            'msg' => 'Erro no servidor'
        ];
        echo json_encode($response);
    }
}