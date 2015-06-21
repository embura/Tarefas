<?php

require_once "../DAO/tarefaORM.php";
//require_once "../Model/Entity/tarefa.php";
require_once "../Model/tarefa.php";


$orm = new tarefaORM();
$tarefa = new \Model\tarefa();

$tarefa->setNome("teste orm dao 4");
$tarefa->setDataFinalizacao(new DateTime());
$tarefa->setDescricao("Teste orm dao descricao 4");
$tarefa->setAtivo(0);

/** Savando tarefa */
//var_dump($orm->save($tarefa)); //ok

/** find  */


$tarefa1 = $orm->get(141);
print_r($tarefa1);

// $tarefa1->setNome("teste orm dao 4 up");
// $orm->update($tarefa1); //ok

// print_r($tarefa1);
//print_r($orm->delete(141)); //ok






