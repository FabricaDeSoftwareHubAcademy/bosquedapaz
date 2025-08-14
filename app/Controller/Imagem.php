<?php

namespace app\Controller;

require_once('../vendor/autoload.php');

use PDO;
use app\Models\Database;

class Imagem {
    public int $id;
    public string $caminho;
    public int $posicao;
    public int $id_expositor;

    public function listar($id_expositor){
        try {
            $db = new Database('imagem');
            $imagens = $db->select("id_expositor = '$id_expositor'")->fetchAll(PDO::FETCH_ASSOC);
            if ($imagens){
                return $imagens;
            }else {
                return FALSE;
            }
        } catch (\Throwable $th) {
            return FALSE;
        }

    }

    public function cadastro(){
        $value = [
            'caminho' => $this->caminho,
            'id_expositor' => $this->id_expositor,
        ];
        $db = new Database('imagem');
        $cadastro = $db->insert($value);
        return $cadastro;
    }

    public function atualizar($id_imagem, $novo_caminho) {
        $db = new Database('imagem');
        
        try {
            $result = $db->update(
                "id_imagem = " . $id_imagem,
                [
                    'caminho' => $novo_caminho
                ]
            );
            return $result;
        } catch (\Exception $e) {
            error_log("Erro ao atualizar imagem: " . $e->getMessage());
            return false;
        }
    }
    
    public function deletar($id_imagem) {
        $db = new Database('imagem');
        
        try {
            // Primeiro, buscar o caminho da imagem para poder deletar o arquivo
            $imagem = $db->select("id_imagem = " . $id_imagem)->fetch(PDO::FETCH_ASSOC);
            
            if ($imagem) {
                // Deletar o arquivo físico se existir
                $caminhoCompleto = '../' . $imagem['caminho'];
                if (file_exists($caminhoCompleto)) {
                    unlink($caminhoCompleto);
                }
                
                // Deletar registro do banco
                $result = $db->execute("DELETE FROM imagem WHERE id_imagem = ?", [$id_imagem]);
                return $result;
            }
            
            return false;
        } catch (\Exception $e) {
            error_log("Erro ao deletar imagem: " . $e->getMessage());
            return false;
        }
    }
    
    public function buscarPorExpositor($id_expositor) {
        $db = new Database('imagem');
        
        try {
            $imagens = $db->select("id_expositor = " . $id_expositor, "id_imagem ASC")->fetchAll(PDO::FETCH_ASSOC);
            return $imagens ? $imagens : [];
        } catch (\Exception $e) {
            error_log("Erro ao buscar imagens: " . $e->getMessage());
            return [];
        }
    }
}