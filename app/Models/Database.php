<?php

namespace app\Models;
require_once '../vendor/autoload.php';

use app\Models\Env;
use PDO;
Env::load();

class Database {
    //atributos do database
    private $conn;
    private string $local;
    private string $db;
    private string $user;
    private string $password;
    private string $table;


    // metodo construtor que íncia chamando o médoto de conexão com o db 
    function __construct($table = null){
        $this->table = $table;
        $this->conecta();
    }

    function set_conn(){
        $this->local = $_ENV['DB_HOST'];
        $this->db = $_ENV['DB_DATABASE'];
        $this->user = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
    } 

    // se conecta com o db
    private function conecta(){

        try {

            $this->set_conn();

            // echo $this->local;

            $this->conn = new PDO("mysql:host=".$this->local.";dbname=".$this->db,$this->user,$this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }

        catch(\PDOException $err){
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
        catch (\PDOException $err){
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
        $where = $where != null ? ' WHERE '.$where : '';
        $order = $order != null ? ' ORDER BY '.$order : '';
        $limit = $limit != null ? ' LIMIT '.$limit : '';

        $query = 'SELECT '. $fields. ' FROM '. $this->table . ' '. $where. ' '. $order. ' '. $limit;

        return $this->execute($query);
    }

    public function select_all($tableP, $id_name, $where = null){
        $where = strlen($where) ? " WHERE ". $where : '';
        $query = "SELECT * FROM ". $this->table. " AS A INNER JOIN ". $tableP. " AS B ON ". "A.".$id_name. " = B.". $id_name. ' '. $where;
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

    public function update_all($values1, $values2, $tableP, $id_name, $where){
        $where = strlen($where) ? " WHERE ". $where : '';
        $fields = array_keys($values1);
        $fields2 = array_keys($values2);
        $masterArray = array_merge($values1, $values2);
        $param = array_values($masterArray);

        $query = "UPDATE ". $this->table. " SET ". implode('=?,', $fields). "=? ". $where. "; UPDATE ". $tableP. " SET ". implode('=?,', $fields2). "=? WHERE ". $id_name. " = ( SELECT ". $id_name. " FROM ".$this->table. $where. ")";
        
        $res = $this->execute($query, $param);
        return $res ? TRUE : FALSE;
    }

    public function delete($where){
        $query = "UPDATE ". $this->table. " SET status = 0 WHERE ". $where;
        return $this->execute($query) ? true : false;
    }

    //Funções do fluxo do ADM: 
    public function listar_colaboradores() {
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

    public function filtrar_colaboradores($nome) {
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

    public function filter_exp($filtro){
        
        $query = "SELECT exp.id_expositor, exp.id_pessoa, exp.nome_marca, exp.num_barraca, exp.voltagem, exp.energia, exp.tipo, exp.contato2, exp.descricao as descricao_exp, exp.metodos_pgto, exp.cor_rua, exp.responsavel, exp.produto, exp.status_exp,
        pes.cpf, pes.nome, pes.email, pes.whats, pes.telefone, pes.link_instagram, pes.link_facebook, pes.link_whats, pes.data_nasc, pes.img_perfil, 
        cat.id_categoria, cat.descricao, cat.cor, cat.icone
        FROM expositor AS exp 
        INNER JOIN categoria AS cat 
        ON cat.id_categoria = exp.id_categoria 
        INNER JOIN pessoa AS pes 
        ON pes.id_pessoa = exp.id_pessoa
        WHERE pes.nome LIKE '%$filtro%'
        OR exp.nome_marca LIKE '%$filtro%'
        OR exp.produto LIKE '%$filtro%' 
        OR cat.descricao = '%$filtro%';
        ";

        $res = $this->execute($query);


        return $res ? $res : FALSE;
    }
    
    public function select_exp($where = null){
        $where = $where != null ? ' WHERE '.$where : '';

        $query = "SELECT exp.id_expositor, exp.id_pessoa, exp.nome_marca, exp.num_barraca, exp.voltagem, exp.energia, exp.tipo, exp.contato2, exp.descricao as descricao_exp, exp.metodos_pgto, exp.cor_rua, exp.responsavel, exp.produto, exp.status_exp,
        pes.cpf, pes.nome, pes.email, pes.whats, pes.telefone, pes.link_instagram, pes.link_facebook, pes.link_whats, pes.data_nasc, pes.img_perfil, 
        cat.id_categoria, cat.descricao, cat.cor, cat.icone
        FROM expositor AS exp 
        INNER JOIN categoria AS cat 
        ON cat.id_categoria = exp.id_categoria 
        INNER JOIN pessoa AS pes 
        ON pes.id_pessoa = exp.id_pessoa ". $where;

        return $this->execute($query);
    }
    
    public function select_exp_catgoria($cat){

        $query = "SELECT exp.id_expositor, exp.id_pessoa, exp.nome_marca, exp.num_barraca, exp.voltagem, exp.energia, exp.tipo, exp.contato2, exp.descricao as descricao_exp, exp.metodos_pgto, exp.cor_rua, exp.responsavel, exp.produto, exp.status_exp,
        pes.cpf, pes.nome, pes.email, pes.whats, pes.telefone, pes.link_instagram, pes.link_facebook, pes.link_whats, pes.data_nasc, pes.img_perfil, 
        cat.id_categoria, cat.descricao, cat.cor, cat.icone
        FROM expositor AS exp 
        INNER JOIN categoria AS cat 
        ON cat.id_categoria = exp.id_categoria 
        INNER JOIN pessoa AS pes 
        ON pes.id_pessoa = exp.id_pessoa WHERE cat.descricao = '$cat'";

        return $this->execute($query);
    }

    public function select_img($id = null){
        if (!empty($id)){

            $query = "SELECT * FROM imagem WHERE id_expositor = ". $id;
    
            return $this->execute($query);
        }else {
            return false;
        }
    }

    public function sts_adm($id_colaborador, $novoStatus) {
        $query = "UPDATE colaborador SET status_col = ? WHERE id_colaborador = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$novoStatus, $id_colaborador]);
    }

    public function buscarPorIdPessoa($idPessoa) {
        $query = "SELECT 
            c.id_colaborador,
            p.id_pessoa,
            p.nome,
            p.email,
            p.telefone,
            c.cargo,
            p.img_perfil
        FROM colaborador c
        INNER JOIN pessoa p ON c.id_pessoa = p.id_pessoa
        WHERE c.id_pessoa = ?";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idPessoa]);
        return $stmt->fetch(PDO::FETCH_ASSOC);  // retorna 1 registro associativo
    }

    
    // BLOCO DE CODIGOS PARA CLASSE BOLETO
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
        b.status_boleto
        FROM boleto b 
        INNER JOIN expositor e ON b.id_expositor = e.id_expositor
        INNER JOIN pessoa p ON e.id_pessoa = p.id_pessoa
        ORDER BY b.vencimento ASC";


        return $this->execute($query);
    }

    public function filtrar_boletos_por_nome($nome)
    {
        $query = "SELECT
        b.id_boleto, e.id_expositor,
        p.nome, b.vencimento,
        b.mes_referencia,
        b.valor, b.status_boleto
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
        b.valor, b.status_boleto
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
        b.valor, b.status_boleto
        FROM boleto b 
        INNER JOIN expositor e ON b.id_expositor = e.id_expositor
        INNER JOIN pessoa p ON e.id_pessoa = p.id_pessoa";

        $binds = [];

        if (!empty($status)) {
            $query .= " WHERE b.status_boleto = :status_boleto;";
            $binds = [":status_boleto" => "$status"];
        }
        return $this->execute($query, $binds);
    }

    public function alterar_status($status, $id) {
        $query = "UPDATE boleto set status_boleto = :status_boleto
        WHERE id_boleto = :id_boleto";

        $binds = [
            ":status_boleto" => $status,
            ":id_boleto" => $id
        ];
        return $this->execute($query, $binds);
    }

    public function capturar_boleto_por_id($id)
    {
        $query = "SELECT
        e.id_expositor, b.id_boleto,
        p.nome, DATE_FORMAT(b.vencimento, '%d/%m/%Y') AS vencimento,
        b.mes_referencia,
        b.valor, b.status_boleto
        FROM pessoa p
        INNER JOIN expositor e ON p.id_pessoa = e.id_pessoa
        INNER JOIN boleto b on e.id_expositor = b.id_expositor
        WHERE e.id_expositor = :id_expositor;";

        $binds = [":id_expositor" => "$id"];
        return $this->execute($query, $binds);
    }
}

?>
