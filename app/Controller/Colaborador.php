<?php

namespace app\Controller;

require_once(__DIR__ . '/../../vendor/autoload.php');
use PDO;
use app\Models\Database;

class Colaborador extends Pessoa
{
    private string $cargo;

    // Setters públicos para propriedades herdadas protegidas da Pessoa
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha(string $senha): void {
        $this->senha = $senha;
    }

    public function setPerfil(string $perfil): void {
        $this->perfil = $perfil;
    }

    // Setters para propriedades próprias
    public function setCargo(string $cargo): void {
        $this->cargo = $cargo;
    }

    public function setImagem(?string $imagem): void {
        $this->foto_perfil = $imagem;
    }

    public function emailExiste($email){
        $db = new Database('pessoa_user');

        $email = $db->select("email = '$email'")->fetch(PDO::FETCH_ASSOC);

        return $email;
    }


    public function cadastrar() {
        $conn;
        try {
            // Insere na tabela pessoa
            $db = new Database('pessoa_user');

            $conn = $db->getConnection();
    
            $conn->beginTransaction();

            $db->setTable('pessoa_user');

            $idLogin = $db->insert_lastid([
                'email' => $this->email,
                'senha' => $this->senha,
                'perfil' => '1',
            ]);

            
            $db->setTable('pessoa'); 
            $idPessoa = $db->insert_lastid([
                'nome' => $this->nome,
                'telefone' => $this->telefone,
                'id_login' => $idLogin,
                'img_perfil' => $this->foto_perfil
            ]);


            $db->setTable('colaborador'); 
            $res = $db->insert([
                'cargo' => $this->cargo,
                'id_pessoa' => $idPessoa
            ]);

            $conn->commit();

            return TRUE;
        } catch (\Throwable $th) {
            return false;
        }
        
    }

    public function atualizar($id){
        
        $valuesLogin = [
        'email' => $this->email
        ];
        
        $valuesPessoa = [
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'img_perfil' => $this->foto_perfil
        ];
        
        $valuesColaborador = [
            'cargo' => $this->cargo
        ];
        
        
        ////// updata login
        $db = new Database('pessoa_user');
        $resLogin = $db->update("id_login = ". $id, $valuesLogin);

        ////// updata pessoa
        $db = new Database('pessoa');
        $resPessoa = $db->update("id_login = ". $id, $valuesPessoa);

        ////// updata colaborador
        $db = new Database('colaborador');
        $resColaborador = $db->updateColaborador("id_login = ". $id, $valuesColaborador, 'id_pessoa', 'pessoa');



        return $resLogin && $resPessoa && $resColaborador ? TRUE : FALSE;
    }

    public function listarColaboradores(?string $palavra = null){
        $db = new Database('view_colaborador');
        
        if (!empty($palavra)) {
            return $db->select("nome LIKE '%$palavra%' OR cargo LIKE '%$palavra%'")->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return $db->select('', 'status_pes')->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function mudar_status($id_login, $novoStatus) {
        $db = new Database('pessoa_user');
        return $db->delete('id_login = "'. $id_login. '"', $novoStatus); // Retorna true ou false diretamente
    }

    public static function validarSomenteLetra($texto) {
        return preg_match('/^[\p{L} ]+$/u', $texto);
    }

    public static function uploadImagem(array $file, string $uploadDir, array $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'], int $maxSize = 2 * 1024 * 1024) {
        if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
            return false;
        }

        if ($file['size'] > $maxSize) {
            return false;
        }

        if (!in_array(mime_content_type($file['tmp_name']), $allowedTypes)) {
            return false;
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid('img_', true) . '.' . $ext;

        $destination = $uploadDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return $filename;
        } else {
            return false;
        }
    }

    public function buscarPorIdPessoa(int $idPessoa) {
        $db = new Database('view_colaborador');
        return $db->select('id_login = '.$idPessoa)->fetch(PDO::FETCH_ASSOC);
    }   
}

// Matheus Manja