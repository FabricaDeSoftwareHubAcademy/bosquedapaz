<?php

class Database {
    //atributos do database
    private $conn;
    private string $local = "192.168.22.9";
    private string $db = "bosquedapaz";
    private string $user = "suporte";
    private string $password = "fabrica33";
    private string $table;


    // metodo construtor que íncia chamando o médoto de conexão com o db 
    function __construct($table = null){
        $this->table = $table;
        $this->conecta();
    }

    // se conecta com o db
    private function conecta(){

        try {

            $this->conn = new PDO("mysql:host=".$this->local.";dbname=".$this->db,$this->user,$this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }

        catch(PDOException $err){
            die("Conection Failed".$err->getMessage());
        }
    }

    // médoto para executar o CRUD no db
    // recebe dois parametros, a query e os binds
    public function execute($query, $binds = []){
        try {

            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;

        }
        catch (PDOException $err){
            die("Connection failed". $err->getMessage());
        }
    }

    // método para inserir no db, tem o parametro $values,
    // que recebe os valores do que serão inseridos
    public function insert($values){
        $fields = array_keys($values);

        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO '. $this->table. ' ('. implode(',', $fields).') VALUES ('. implode(',', $binds). ')';

        $res = $this->execute($query, array_values($values));

        if ($res){
            return true;
        }
        else{
            return false;
        }
    }

    public function getConnection(){
        return $this->conn;
    }

    public function insert_lastid($values)
    {
        // quebrar o array associativo que veio como parametro
        $fields = array_keys($values);

        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO ' . $this->table . '(' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        $res = $this->execute($query, array_values($values));

        $lastId = $this->conn->lastInsertId();

        if ($res) {
            return $lastId;
        } else {
            return false;
        }
    }

    // método de select
    public function select($where = null, $order = null, $limit = null, $fields = "*") {
        $where = strlen($where) ? ' WHERE '.$where : '';
        $order = strlen($order) ? ' ORDER BY '.$order : '';
        $limit = strlen($limit) ? ' LIMIT '.$limit : '';

        $query = 'SELECT '. $fields. ' FROM '. $this->table . ' '. $where. ' '. $order. ' '. $limit;

        return $this->execute($query);
    }

    // método update, com parametros $where, $values
    public function update($where, $values){
        $fields = array_keys($values);
        $param = array_values($values);

        $query = "UPDATE ". $this->table. ' SET '. implode('=?,', $fields).'=? WHERE '. $where;

        $res = $this->execute($query, $param);

        if($res){
            return true;
        }else{
            return false;
        }
    }

    //método de deletar
    public function delete($where){
        $query = 'DELETE FROM '. $this->table. ' WHERE '.$where;

        $result = $this->execute($query);
        
        return ($result->rowCount() == 1) ? TRUE : FALSE;
    }
}

?>
