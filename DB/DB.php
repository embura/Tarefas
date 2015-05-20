<?php
/**
 * Class DB prove acesso ao bando de dados
 */
class DB {

    private $host;
    private $username;
    private $password;
    private $dbName;
    private $driver;
    private $dsn;


    public function __construct() {
        $this->host = "localhost:3306";
        $this->dbName = "tarefas";
        $this->username = "root";
        $this->password = "";
        $this->driver = "mysql";
        $this->dsn = "{$this->driver}:host={$this->host};dbname={$this->dbName}";
    }


    /**
     * @return PDO
     */
    public function getConnection() {

        try{
            //$this->conexao = new PDO("mysql:host=localhost;dbname=tarefas",$this->username, $this->password);
            $this->conexao = new PDO($this->dsn,$this->username, $this->password);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexao->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
            return $this->conexao;
        }catch(PDOException $e){
            echo "<pre>";
            echo "Não foi possível se conectar ao banco de dados <br />";
            print_r($e);
        }
    }

}

?>