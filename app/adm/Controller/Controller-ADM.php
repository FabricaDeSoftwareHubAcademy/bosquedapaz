<?php

class Database {
    private $conn;
    private string $local = "localhost";
    private string $db = "bosquedapaz";
    private string $user = "root";
    private string $password = "";
    private string $table;

    function __construct($table = null){
        $this->table = $table;
        $this->conecta();
    }

    private function conecta(){
        try {
            $this->conn = new PDO("mysql:host=".$this->local.";dbname=".$this->db,$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXPEPTION);
            echo "foi";
        }

        catch(PDOExption $err){
            die("Conection Failed".$err.getMessage());
        }
    }

    
}

$db = new Database('carrosel');

?>