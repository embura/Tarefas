<?php
/**
 * Class DB prove acesso ao bando de dados
 */
class DB {

    private $host;
    private $username;
    private $password;
    private $conexao;
    private $dbName;
    private $driver;


    public function __construct() {
        $this->host = "localhost:3306";
        $this->dbName = "tarefas";
        $this->username = "root";
        $this->password = "";
        $this->driver = "mysql";
    }


    /**
     * @return PDO
     */
    public function getConnection() {

        try{
            $this->conexao = new PDO("mysql:host=localhost;dbname=tarefas",
                $this->username, $this->password);

            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexao->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);

            return $this->conexao;
        }catch(PDOException $e){
            print($e);
        }
    }

}

?>