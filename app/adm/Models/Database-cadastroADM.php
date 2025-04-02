<?php 

Class Database{
    private $conn;
    private string $server = "localhost";
    private string $db = "adm";
    private string $user = "root";
    private string $pass = "";
    private $table;

    public function __construct($table = null){
        $this->table = $table;
        $this->connect();
    }

    public function connect(){
        try{
            $this->conn = new PDO("mysql:host=" . $this->server . ";dbname="  . $this->db . ";", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Throwable $th){
            die("<pre>Erro na conexão com o banco de dados: " . $th->getMessage() . "</pre>");
        }
    }

    public function execute($query, $binds = []){
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;

        }catch (\Throwable $th){
            //throw $th;
        }
    }

    public function insert($values){
        try{
            $fields = array_keys($values);
            $binds = array_fill(0, count($fields), '?');

            $query = 'INSERT INTO ' . $this->table . ' (' . implode(',',$fields) . ') VALUES (' . implode(',', $binds) . ')';
            $res = $this->execute($query, array_values($values));

            if (!$res) {
                throw new Exception("Erro ao inserir os dados no banco.");
            }

            return true;
        } catch (Throwable $th){
            echo "<pre>Erro no insert: " . $th->getMessage() . "</pre>";
            return false;
        }
    }

    public function select($fields = '*'){
        try{
            $query = "SELECT ". $fields ."FROM ". $this->table . ";";
            
            return $this->execute($query);
        } catch (\Throwable $th){
                        //throw $th;
            // echo '<pre>';
            // echo print_r( $query );
            // echo '</pre>';
        }
    }

    public function update($where, $array){
        try{
            $fields = array_keys($array);
            $values = array_values($array);

            $query = "UPDATE ". $this->table . " SET " . implode("=?,
            ", $fields) . "=? WHERE " . $where;

            $res = $this->execute($query, $values);

        } catch (\Throwable){
            //throw $th
        }
    }

    public function delete($where){
        try{
            $query = "DELETE FROM " . $this->table . " WHERE " . $where;
            $del = $this->execute($query);
            $del = $del->rowCount();

            if($del == 1){
                return true;
            } else{
                return false;
            }

        }catch (\Throwable){
            //throw $th
        }
    }
}
?>