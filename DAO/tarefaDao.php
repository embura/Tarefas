<?php
require_once '../DB/DB.php';
require_once '../Model/tarefa.php';
class tarefaDao {
	private $conexao;

	public function __construct() {
		$db = new DB ();
		$this->conexao = $db->getConnection ();
	}
	
	/**
	 *
	 * @param String $nome
	 * @param String $descricao
	 * @param int $ativo
	 * @return resource boolean
	 */
	public function insert(Tarefa $tarefa) {
		$query = "INSERT INTO `tarefa`( `nome`, `descricao`, `ativo`) VALUES ('{$tarefa->getNome()}','{$tarefa->getDescricao()}','{$tarefa->getAtivo()}')";
		return $this->conexao->query( $query);
	}
	
	/**
	 * Pegar todas as terafas
	 * @return ArrayObject Tarefa
	 */
	public function selectAll() {
		$tarefas = new ArrayObject ();
		$query = "SELECT * FROM `tarefa`";
        $result = $this->conexao->query( $query);

		if ($result->num_rows > 0) {
            while ( $tarefa = $result->fetch_object('tarefa')  ) {
				$tarefas->append ( $tarefa );
			}
		}
		return $tarefas;
	}

    /**
     * @param $idTarefa
     * @return object tarefa
     */
    public function getTarefa($idTarefa) {
		$query = "SELECT * FROM `tarefa` where id = " . $idTarefa;
		$result = $this->conexao->query( $query );
		return $result->fetch_object('tarefa');
	}

    /** Executa update da tarefa
     * @param Tarefa $tarefa
     * @return bool|mysqli_result
     */
    public function update(Tarefa $tarefa) {
		$query = "UPDATE `tarefa` SET `nome`='{$tarefa->getNome()}',`descricao`='{$tarefa->getDescricao()}',`ativo`='{$tarefa->getAtivo()}' WHERE id = " . $tarefa->getId ();
		return $this->conexao->query ( $query);
	}

    /** Deleta uma tarefa
     * @param $id
     * @return bool|mysqli_result
     */
    public function delete($id) {
		$query = "DELETE FROM `tarefa` WHERE id=" . $id;
		return $this->conexao->query ( $query);
	}
}

?>