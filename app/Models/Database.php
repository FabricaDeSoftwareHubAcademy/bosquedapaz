<?php

// namespace app\Models;

// use PDO;
// use PDOException;

class Database
{
    private $conn;
    private string $local = 'localhost';          // <--- SEU HOST
    private string $db = 'banco_bosquedapaz';    // <--- NOME DO BANCO
    private string $user = 'root';         // <--- USUÁRIO DO BANCO
    private string $password = '';       // <--- SENHA DO BANCO
    private ?string $table;

    function __construct($table = null)
    {
        $this->table = $table;
        $this->conecta();
    }

    private function conecta()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->local};dbname={$this->db}", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            die("Connection Failed: " . $err->getMessage());
        }
    }

    public function execute($query, $binds = [])
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        } catch (PDOException $err) {
            die("Connection failed: " . $err->getMessage());
        }
    }

    public function insert($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
        return $this->execute($query, array_values($values)) ? true : false;
    }

    public function insert_lastid($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');
        $query = 'INSERT INTO ' . $this->table . '(' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
        $res = $this->execute($query, array_values($values));
        return $res ? $this->conn->lastInsertId() : false;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function select($where = null, $order = null, $limit = null, $fields = "*")
    {
        $where = strlen($where) ? ' WHERE ' . $where : '';
        $order = strlen($order) ? ' ORDER BY ' . $order : '';
        $limit = strlen($limit) ? ' LIMIT ' . $limit : '';
        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;
        return $this->execute($query);
    }

    public function select_all($tableP, $id_name, $where = null)
    {
        $where = strlen($where) ? " WHERE " . $where : '';
        $query = "SELECT * FROM " . $this->table . " AS A INNER JOIN " . $tableP . " AS B ON A." . $id_name . " = B." . $id_name . ' ' . $where;
        return $this->execute($query);
    }

    public function update($where, $values)
    {
        $fields = array_keys($values);
        $param = array_values($values);
        $query = "UPDATE " . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;
        return $this->execute($query, $param) ? true : false;
    }

    public function update_all($values1, $values2, $tableP, $id_name, $where)
    {
        $where = strlen($where) ? " WHERE " . $where : '';
        $fields = array_keys($values1);
        $fields2 = array_keys($values2);
        $masterArray = array_merge($values1, $values2);
        $param = array_values($masterArray);

        $query = "UPDATE " . $this->table . " SET " . implode('=?,', $fields) . "=? " . $where . "; UPDATE " . $tableP . " SET " . implode('=?,', $fields2) . "=? WHERE " . $id_name . " = ( SELECT " . $id_name . " FROM " . $this->table . $where . ")";

        return $this->execute($query, $param) ? true : false;
    }

    public function delete($where)
    {
        $query = "UPDATE " . $this->table . " SET status = 0 WHERE " . $where;
        return $this->execute($query) ? true : false;
    }

    // Database Guilherme
    public function listar_expositor_para_cadastro($nome)
    {
        $query = "SELECT
        p.nome, p.cpf, e.id_expositor
        FROM pessoa p
        INNER JOIN expositor e ON p.id_pessoa = e.id_pessoa
        WHERE p.nome LIKE :nome";
        $binds = [":nome" => "%$nome%"];
        return $this->execute($query, $binds);
    }

    public function listar_todos_boletos()
    {
        $query = "SELECT
        b.id_boleto, 
        e.id_expositor,
        p.nome, 
        DATE_FORMAT(b.vencimento, '%d/%m/%Y') AS vencimento,
        b.mes_referencia,
        b.valor, 
        e.status_exp
        FROM boleto b 
        INNER JOIN expositor e ON b.id_expositor = e.id_expositor
        INNER JOIN pessoa p ON e.id_pessoa = p.id_pessoa;";


        return $this->execute($query);
    }

    public function filtrar_boletos_por_nome($nome)
    {
        $query = "SELECT
        b.id_boleto, e.id_expositor,
        p.nome, b.vencimento,
        b.mes_referencia,
        b.valor, e.status_exp
        FROM boleto b 
        INNER JOIN expositor e ON b.id_expositor = e.id_expositor
        INNER JOIN pessoa p ON e.id_pessoa = p.id_pessoa
        WHERE p.nome LIKE :nome;";

        $binds = [":nome" => "%$nome%"];
        return $this->execute($query, $binds);
    }

    public function filtrar_boletos_por_data($data_inicial, $data_final)
    {
        $query = "SELECT
        b.id_boleto, e.id_expositor,
        p.nome, b.vencimento as vencimento,
        b.mes_referencia,
        b.valor, e.status_exp
        FROM boleto b 
        INNER JOIN expositor e ON b.id_expositor = e.id_expositor
        INNER JOIN pessoa p ON e.id_pessoa = p.id_pessoa
        WHERE b.vencimento BETWEEN STR_TO_DATE(:data_inicial, '%d/%m/%Y') and STR_TO_DATE(:data_final, '%d/%m/%Y')
        ORDER BY b.vencimento ASC";

        $binds = [
            ":data_inicial" => $data_inicial,
            ":data_final" => $data_final
        ];
        return $this->execute($query, $binds);
    }

    public function filtrar_boletos_por_status($status)
    {
        $query = "SELECT
        b.id_boleto, e.id_expositor,
        p.nome, b.vencimento,
        b.mes_referencia,
        b.valor, e.status_exp
        FROM boleto b 
        INNER JOIN expositor e ON b.id_expositor = e.id_expositor
        INNER JOIN pessoa p ON e.id_pessoa = p.id_pessoa";

        $binds = [];

        if (!empty($status)) {
            $query .= " WHERE e.status_exp = :status_exp;";
            $binds = [":status_exp" => "$status"];
        }
        return $this->execute($query, $binds);
    }

    public function capturar_boleto_por_id($id)
    {
        $query = "SELECT
        e.id_expositor, b.id_boleto,
        p.nome, b.vencimento,
        b.mes_referencia,
        b.valor, b.status_bol
        FROM pessoa p
        INNER JOIN expositor e ON p.id_pessoa = e.id_pessoa
        INNER JOIN boleto b on e.id_expositor = b.id_expositor
        WHERE e.id_expositor = :id_expositor;";

        $binds = [":id_expositor" => "$id"];
        return $this->execute($query, $binds);
    }

    // Database Matheus
    public function listar_colaboradores()
    {
        $query = "SELECT
        c.id_colaborador,
        p.nome,
        p.email,
        p.telefone,
        c.cargo,
        c.status_col
        FROM colaborador c
        INNER JOIN pessoa p ON c.id_pessoa = p.id_pessoa";
        return $this->execute($query);
    }

    public function filtrar_colaboradores($nome)
    {
        $query = "SELECT
        c.id_colaborador,
        p.nome,
        p.email,
        p.telefone,
        c.cargo,
        c.status_col
        FROM colaborador c
        INNER JOIN pessoa p ON c.id_pessoa = p.id_pessoa
        WHERE p.nome LIKE :nome";
        $binds = [":nome" => "%$nome%"];
        return $this->execute($query, $binds);
    }
}
