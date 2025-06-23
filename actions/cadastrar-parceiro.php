<?php

require_once('../vendor/autoload.php');

use app\Controller\Parceiro;
use app\Controller\Endereco;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $endereco = new Endereco();
        $parceiro = new Parceiro();

        $parceiro->nome_parceiro = $_POST["nome_parceiro"];
        $parceiro->telefone = $_POST["telefone"];
        $parceiro->email = $_POST["email"];
        $parceiro->nome_contato = $_POST["nome_contato"];
        $parceiro->tipo = $_POST["tipo"];
        $parceiro->cpf_cnpj = $_POST["cpf_cnpj"];

        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
            $nome_arquivo = $_FILES['logo']['name'];
            $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
        
            // Gera nome único
            $nome_arquivo_unico = uniqid('logo_', true) . '.' . $extensao;
        
            $destino = '../../../Public/uploads/logos/' . $nome_arquivo_unico;
        
            // Cria a pasta se não existir
            if (!is_dir('../../../Public/uploads/logos')) {
                mkdir('../../../Public/uploads/logos', 0755, true);
            }
        
            if (move_uploaded_file($_FILES['logo']['tmp_name'], $destino)) {
                $parceiro->logo = $destino;
            } else {
                echo json_encode(["status" => "erro", "msg" => "Erro ao salvar a logo!"]);
                exit;
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
