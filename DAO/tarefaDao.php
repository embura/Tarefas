<?php

if(!defined('ROOT_DIR'))
    define('ROOT_DIR',$_SERVER['DOCUMENT_ROOT'].'/Tarefas/');

//require_once '../Config/config.php';
require_once ROOT_DIR.'/DB/DB.php';
require_once ROOT_DIR.'/Model/tarefa.php';

/**
 * Class tarefaDao reponsavel por persistir tarefa na bando de dados
 */
class tarefaDao {
    private  $conexao;

    public function __construct() {
        $db = new DB ();
        $this->conexao = $db->getConnection();
    }


    public function insert(Tarefa $tarefa) {
        $query = "INSERT INTO `tarefa`(
          `nome`,
          `descricao`,
          `dataFinalizacao`,
          `ativo`)
          VALUES (
          :nome,
          :descricao,
          :dataFinalizacao,
          :ativo)";
        try{
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":nome",$tarefa->getNome() );
            $stmt->bindValue(":descricao",$tarefa->getDescricao());
            $stmt->bindValue(":dataFinalizacao",$tarefa->getDataFinalizacao());
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
        $query = "SELECT * FROM `tarefa`";
        $stmt = $this->conexao->query($query);
        return $stmt->fetchAll(PDO::FETCH_CLASS,'\Model\tarefa');
    }

    public function paginacao($inicio,$quantidade){
        $query = "Select * FROM `tarefa` LIMIT :inicio,:quantidade";
        try{
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":inicio",(int) $inicio,PDO::PARAM_INT);
            $stmt->bindValue(":quantidade",(int) $quantidade,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS,'\Model\tarefa');
        }catch(PDOException $e){
            print($e);
        }

    }

    /**
     * @param $idTarefa
     * @return object tarefa
     */
    public function find($idTarefa) {
        $query = "SELECT * FROM `tarefa` where id = :id ";
        try{
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":id",$idTarefa);
            $stmt->execute();
            return $stmt->fetchObject('\Model\tarefa');
        }catch(PDOException $e){
            print($e);
        }
        return false;
    }


    /**
     * @param $nomeTarefa
     * @return object tarefa
     */
    public function findAll($nomeTarefa) {
        $query = "SELECT * FROM `tarefa` where nome like ? ";
        try{
            $stmt = $this->conexao->prepare($query);
            //$stmt->bindValue(":nome",$nomeTarefa);
            $stmt->execute(array("%".$nomeTarefa."%"));
            return $stmt->fetchAll(PDO::FETCH_CLASS,'\Model\tarefa');
        }catch(PDOException $e){
            print($e);
        }
        return false;
    }


    /** Executa update da tarefa
     * @param Tarefa $tarefa
     * @return bool|mysqli_result
     */
    public function update(tarefa $tarefa) {

        $query = "UPDATE `tarefa`
                    SET
                      `nome`=:nome,
                      `descricao`=:descricao,
                      `ativo`=:ativo,
                      `dataFinalizacao`=:dataFinalizacao
              WHERE id = :id";

        try{
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":id",$tarefa->getID());
            $stmt->bindValue(":nome",$tarefa->getNome());
            $stmt->bindValue(":descricao",$tarefa->getDescricao());
            $stmt->bindValue(":dataFinalizacao",$tarefa->getDataFinalizacao());
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

