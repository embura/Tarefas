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
        $this->entityManager->persist($tarefa);
        $this->entityManager->flush();
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
    }



}