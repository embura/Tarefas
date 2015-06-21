<?php

require_once "../DB/ORM.php";
require_once "../Model/tarefa.php";


class tarefaORM{

    private $entityManager;


    public function __construct(){
        $orm = new orm();
        $this->entityManager = $orm->em();
    }

    public function save(\Model\tarefa $tarefa){
        try{
            $this->entityManager->persist($tarefa);
            $this->entityManager->flush();
            return true;
        }catch(Exception $e){
            return false;

        }
    }

    public function get($id){
        try{
            $repo = $this->entityManager->getRepository('\Model\tarefa');
            return $repo->find($id);
        }catch(Exception $e){
            return null;
        }
    }

    public function update(\Model\tarefa $tarefa){
        $tarefaTMP = $this->get($tarefa->getId());
        $tarefaTMP->setNome($tarefa->getNome());
        $tarefaTMP->setDescricao($tarefa->getDescricao());
        $tarefaTMP->setDataFinalizacao($tarefa->getDataFinalizacao());
        return $this->save($tarefaTMP);
    }

    public function delete($id){
        try{
            $tarefa = $this->entityManager->getPartialReference('\Model\tarefa',$id);
            $this->entityManager->remove($tarefa);
            $this->entityManager->flush();
            return true;
        }catch(Exception $e){
            return false;
        }
    }



}