<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jefferson
 * Date: 25/05/15
 * Time: 08:49
 * To change this template use File | Settings | File Templates.
 */
if(!defined('ROOT_DIR'))
    define('ROOT_DIR',$_SERVER['DOCUMENT_ROOT'].'/Tarefas/');

require_once ROOT_DIR.'/Model/tarefa.php';
require_once ROOT_DIR.'/DAO/tarefaDao.php';

session_start ();

$tarefa = new tarefa();
$tarefaDao = new tarefaDao ();

$id = $_REQUEST ['id'];
$tarefa = $tarefaDao->find ( $id );
$_SESSION ['id'] = $id;
//$checked = ($tarefa->getAtivo () == '1') ? 'checked' : '';



if (isset($_REQUEST ['gravar'])) {

    $arrayForm = $_REQUEST;
    $id = $_SESSION['id'];
    $ativo = ($arrayForm ['ativo'] == 'true') ? 1 : 0;

    $tarefa->setNome ( $arrayForm ['nome'] );
    $tarefa->setDescricao ( $arrayForm ['descricao'] );
    $tarefa->setAtivo ( $ativo );
    $tarefa->setDataFinalizacao($arrayForm ['dataFinalizacao']);

    if ($tarefaDao->update ( $tarefa )) {
        header("location:../listaTarefas.php");
    }else{
        echo '<p class="alert alert-danger" role="alert">Tarefa não inserida</p>';
    }

}

//$checked = ($tarefa->getAtivo () == '1') ? 'checked' : '';
unset ( $_SESSION );

?>
