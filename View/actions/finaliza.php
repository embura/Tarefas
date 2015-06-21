<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jefferson
 * Date: 23/05/15
 * Time: 07:16
 * To change this template use File | Settings | File Templates.
 */


require_once '../../DAO/tarefaDao.php';
require_once '../../Model/tarefa.php';
$tarefa = new tarefa();
$tarefaDao = new tarefaDao ();


$id = $_REQUEST['idTarefa'];
$tarefa = $tarefaDao->find($id);
$tarefa->setAtivo(0);

$data = date("Y-m-d H:i:s");
$tarefa->setDataFinalizacao($data);

if($tarefaDao->update($tarefa)){
    echo "<table class='table  table-striped table-bordered table-condensed' id='lista'>
    <tr >
        <td>".$tarefa->getID()."</td>
        <td>".$tarefa->getNome()."</td>
        <td>".$tarefa->getDataFinalizacao()."</td>
        <td><a href='editaTarefa.php?id=".$tarefa->getID()."' >Editar</a></td>
         <td><a href='#' onClick='removeTarefa(".$tarefa->getID().")' >Remover</a></td>
    </tr></table>";

}else{
    echo "Tarefas ".$tarefa->getNome()." Não foi atualizada com sucesso";
}

