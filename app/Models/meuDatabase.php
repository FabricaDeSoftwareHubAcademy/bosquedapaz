<?php

class Database {
    // Dados fixos de conexão
    private $servidor = "localhost";
    private $banco_de_dados = "gerenciar_expositor";
    private $usuario = "root";
    private $senha = "";

    // Atributos da classe
    private $conn;
    public ?string $table;

    // Construtor opcional com tabela
    public function __construct($table = null) {
        $this->table = $table;
        $this->conectar();
    }

    // Método de conexão
    private function conectar() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->servidor};dbname={$this->banco_de_dados}",
                $this->usuario,
                $this->senha
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $erro) {
            die("Erro na conexão: " . $erro->getMessage());
        }
    }

    // Executa qualquer query com ou sem binds
    public function execute($query, $binds = []) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        } catch (PDOException $erro) {
            die("Erro na execução: " . $erro->getMessage());
        }
    }

    // Insert padrão
    public function insert($values) {
        $fields = array_keys($values);
        $binds = array_fill(0, count($fields), '?');
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
        $res = $this->execute($query, array_values($values));
        return $res ? true : false;
    }

    // Insert com retorno do último ID
    public function insert_lastid($values) {
        $fields = array_keys($values);
        $binds = array_fill(0, count($fields), '?');
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
        $res = $this->execute($query, array_values($values));
        return $res ? $this->conn->lastInsertId() : false;
    }

    // Select com filtros
    public function select($where = null, $order = null, $limit = null, $fields = "*") {
        $where = strlen($where) ? ' WHERE ' . $where : '';
        $order = strlen($order) ? ' ORDER BY ' . $order : '';
        $limit = strlen($limit) ? ' LIMIT ' . $limit : '';
        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . $where . $order . $limit;
        return $this->execute($query);
    }

    // Update
    public function update($where, $values) {
        $fields = array_keys($values);
        $param = array_values($values);
        $query = "UPDATE " . $this->table . " SET " . implode('=?, ', $fields) . "=? WHERE " . $where;
        $res = $this->execute($query, $param);
        return $res ? true : false;
    }

    // Delete
    public function delete($where) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
        $result = $this->execute($query);
        return ($result->rowCount() == 1);
    }

    // Pegar conexão, caso precise
    public function getConnection() {
        return $this->conn;
    }
}
