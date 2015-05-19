<?php
require_once '../DB/DB.php';
require_once '../Model/Tarefa.php';

/**
 * Class tarefaDao reponsavel por persistir tarefa na bando de dados
 */
class tarefaDao {
    private $conexao;

    public function __construct() {
        $db = new DB ();
        $this->conexao = $db->getConnection();
    }


    public function insert(Tarefa $tarefa) {
        $query = "INSERT INTO `tarefa`( `nome`, `descricao`, `ativo`) VALUES (:nome,:descricao,:ativo)";

        try{
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":nome",$tarefa->getNome());
            $stmt->bindValue(":descricao",$tarefa->getDescricao());
            $stmt->bindValue(":ativo",$tarefa->getAtivo());
            return $stmt->execute();
        }catch(Exception $e){
            print($e->getMessage());
        }
    }

    /**
     * Pegar todas as terafas
     * @return ArrayObject Tarefa
     */
    public function selectAll() {
        $tarefa = new Tarefa();
        $tarefas = new ArrayObject ();
        $query = "SELECT * FROM `tarefa`";
        $stmt = $this->conexao->query($query);
        return $stmt->fetchAll(PDO::FETCH_CLASS,'Tarefa');
    }

    /**
     * @param $idTarefa
     * @return object tarefa
     */
    public function getTarefa($idTarefa) {
        $query = "SELECT * FROM `tarefa` where id = " . $idTarefa;
        $result = $this->conexao->query( $query );
        return $result->fetchObject('Tarefa');
    }

    /** Executa update da tarefa
     * @param Tarefa $tarefa
     * @return bool|mysqli_result
     */
    public function update(Tarefa $tarefa) {

        $query = "UPDATE `tarefa` SET `nome`=:nome,`descricao`=:descricao,`ativo`=:ativo WHERE id = :id";

        try{
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":id",$tarefa->getID());
            $stmt->bindValue(":nome",$tarefa->getNome());
            $stmt->bindValue(":descricao",$tarefa->getDescricao());
            $stmt->bindValue(":ativo",$tarefa->getAtivo());
            return $stmt->execute();
        }catch(PDOException $e){
            print($e);
        }

    }

    /** Deleta uma tarefa
     * @param $id
     * @return bool|mysqli_result
     */
    public function delete($id) {
        $query = "DELETE FROM `tarefa` WHERE id=" . $id;
        $stmt = $this->conexao->prepare($query);
        return $stmt->execute();
    }
}

