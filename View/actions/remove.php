<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jefferson
 * Date: 23/05/15
 * Time: 06:59
 * To change this template use File | Settings | File Templates.
 */
require_once '../../DAO/tarefaDao.php';
$tarefa = new Tarefa();
$tarefaDao = new tarefaDao ();


$id = $_REQUEST['idTarefa'];
$tarefa = $tarefaDao->find($id);

if($tarefaDao->delete($id)){
    return true;
}

