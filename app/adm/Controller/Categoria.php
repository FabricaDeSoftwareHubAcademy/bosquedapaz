<?php
require_once __DIR__ . '/../../Models/Database.php';
    class Categoria{
        public int $id_categoria;
        public string $descricao;
        public string $cor;
        public string $icone;



        public function cadastrar(){

            $db = new Database('categoria');

            $res = $db->insert(
                [
                    'descricao' => $this->descricao,
                    'cor' => $this->cor,
                    'icone' => $this->icone,
                ]
                );

            return $res;
        }

        public function listar($where = null, $order = null, $limit = null){
            $db = new Database('categoria');
            $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
            return $res;
        }
        
        public function listar_por_id($id){
            $db = new Database('categoria');
            $res = $db->select('id_categoria = ' . $id)->fetchObject(self::class);
            return $res;
        }

        public function atualizar(){
            $db = new Database('categoria');
            $res = $db->update(
                'id_categoria = ' . $this->id_categoria,
                [
                    'descricao' => $this->descricao,
                    'cor' => $this->cor,
                    'icone' => $this->icone,
                ]
            );
            return $res;
        }

        public function excluir(){
            $db = new Database('categoria');
            $res = $db->delete('id_categoria = ' . $this->id_categoria);
            return $res;
        }

    }