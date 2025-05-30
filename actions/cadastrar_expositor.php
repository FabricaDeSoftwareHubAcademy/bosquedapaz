<?php
require_once('../app/Controller/Expositor.php');
require_once('../app/Controller/Pessoa.php');


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $pessoa = new Pessoa();
        $expositor = new Expositor();

        $expositor->nome = $_POST["nome"];
        $expositor->contato2 = $_POST["whatsapp"];
        $expositor->email = $_POST["email"];
        $expositor->link_instagram = $_POST["link_instagram"];

        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
            $nome_arquivo = $_FILES['logo']['name'];
            $caminho_temp = $_FILES['logo']['tmp_name'];
            $destino = '../../../Public/uploads/logos' . $nome_arquivo;
    
            // Cria o diretório, se não existir
            if (!is_dir('../../../Public/uploads/logos')) {
                mkdir('../../../Public/uploads/logos', 0755, true);
            }
    
            if (move_uploaded_file($caminho_temp, $destino)) {

                $parceiro->logo = $destino;

            } else {
                echo json_encode( ["status" => "erro", "msg" => " Erro ao fazer upload da foto!!"]);
            }
        }

        $endereco->cep = $_POST["cep"];
        $endereco->logradouro = $_POST["logradouro"];
        $endereco->num_residencia = $_POST["num_residencia"];
        $endereco->bairro = $_POST["bairro"];
        $endereco->cidade = $_POST["cidade"];
        $endereco->complemento = $_POST["complemento"];


        $result = $parceiro->cadastrar($endereco);
        if($result){
                echo json_encode( ["status" => 200, "msg" => "Cadastrado com Sucesso! "]);
        }else{
            echo json_encode( ["status" => "erro", "msg" => "Erro ao cadastrar! "]);
            }
    }
?>















