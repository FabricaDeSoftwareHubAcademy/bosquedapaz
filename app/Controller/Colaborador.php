<?php

namespace app\Controller;

require_once('../vendor/autoload.php');
use PDO;
use app\Models\Database;

class Colaborador extends Pessoa
{
    private string $cargo;

    // Setters públicos para propriedades herdadas protegidas da Pessoa
    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function setEmail(string $email): void {
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


    public function cadastrar() {
        // Insere na tabela pessoa
        $dbPessoa = new Database('pessoa');
        $idPessoa = $dbPessoa->insert_lastid([
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'senha' => $this->senha,
            'perfil' => 'ADM',
            'img_perfil' => $this->foto_perfil
        ]);

        if (!$idPessoa) {
            return false;
        }

        $dbColab = new Database('colaborador');
        $res = $dbColab->insert([
            'cargo' => $this->cargo,
            'id_pessoa' => $idPessoa
        ]);

        return $res;
    }

    public function atualizar($id){
        $db = new Database('colaborador');

        $values1 = [
            'cargo' => $this->cargo
        ];

        $values2 = [
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'senha' => $this->senha,
            'perfil' => 'ADM',
            'img_perfil' => $this->foto_perfil,
        ];

        $res = $db->update_all($values1, $values2, 'pessoa', 'id_pessoa', 'id_colaborador = '. $id);

        return $res ? TRUE : FALSE;
    }

    public function listarColaboradores(?string $nome = null){
        $db = new Database('colaborador');
        
        if (!empty($nome)) {
            return $db->filtrar_colaboradores($nome)->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return $db->listar_colaboradores()->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function mudar_status($id_colaborador, $novoStatus) {
        $db = new Database('colaborador');
        return $db->sts_adm($id_colaborador, $novoStatus); // Retorna true ou false diretamente
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

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $destination = $uploadDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return $filename;
        } else {
            return false;
        }
    }
}