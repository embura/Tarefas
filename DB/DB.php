<?php
class DB {
	private $host;
	private $user;
	private $password;
	private $conexao;
	private $dbName;
	
	
	public function __construct() {
		$this->host = "localhost:3306";
		$this->dbName = "tarefas";
		$this->user = "root";
		$this->password = "";
	}
	
	
	public function getConnection() {

        // Conecta-se ao banco de dados MySQL
		//$this->conexao = mysql_connect( $this->host, $this->user, $this->password,$this->dbName );
        $this->conexao = new mysqli($this->host, $this->user,  $this->password, $this->dbName);

        // Caso algo tenha dado errado, exibe uma mensagem de erro
        if (mysqli_connect_errno()){
            trigger_error(mysqli_connect_error());
        }
		return $this->conexao;
	}
	
	
	function close(){
		mysql_close($this->conexao);
	}
	
	
	
	
	
}

?>