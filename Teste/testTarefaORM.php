<?php

require_once "../DAO/tarefaORM.php";
//require_once "../Model/Entity/tarefa.php";
require_once "../Model/tarefa.php";


$orm = new tarefaORM();
$tarefa = new \Model\tarefa();

$tarefa->setNome("teste orm dao 2");
$tarefa->setDataFinalizacao(new DateTime());
$tarefa->setDescricao("Teste orm dao descricao 2");
$tarefa->setAtivo(1);

/** Savando tarefa */
//$orm->save($tarefa); //ok

/** find  */


$tarefa1 = $orm->get(129);

print_r($tarefa1);





