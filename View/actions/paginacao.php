<?php
/**
 * Created by PhpStorm.
 * User: jefferson
 * Date: 19/06/2015
 * Time: 17:54
 */


if(!defined('ROOT_DIR'))
    define('ROOT_DIR',$_SERVER['DOCUMENT_ROOT'].'/Tarefas/');


require_once ROOT_DIR.'/Model/tarefa.php';
require_once ROOT_DIR.'/DAO/tarefaDao.php';




$inicio = $_POST['inicio'];
$quantidade = $_POST['quantidade'];



$tarefaDao = new tarefaDao();
$tarefas = $tarefaDao->paginacao($inicio,$quantidade);


foreach($tarefas as $tarefa){
    $arr[] = ((array) $tarefa);
}

//echo "<pre>";
//print_r($arr);



echo json_encode($arr);