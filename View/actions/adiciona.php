<?php
if(!defined('ROOT_DIR'))
    define('ROOT_DIR',$_SERVER['DOCUMENT_ROOT'].'/Tarefas/');

/**
 * Created by JetBrains PhpStorm.
 * User: jefferson
 * Date: 19/05/15
 * Time: 16:08
 * To change this template use File | Settings | File Templates.
 */


//require_once ROOT_DIR.'/Config/config.php';
require_once ROOT_DIR.'/DAO/tarefaDao.php';
require_once ROOT_DIR.'/Model/tarefa.php';



$tarefaDao = new tarefaDao ();
$tarefa = new tarefa();

$arrayForm = $_REQUEST;

$ativo = isset( $arrayForm['ativo'] )?'1':'0';

if(!isset($arrayForm['nome']) ||  empty($arrayForm['nome']) ){
    echo '<p class="alert alert-danger" role="alert">Nome vazio. Tarefa não adicionada</p>';
    exit;
}

$tarefa->setNome ( $arrayForm ['nome'] );
$tarefa->setDescricao ( $arrayForm ['descricao'] );
$tarefa->setDataFinalizacao($arrayForm ['dataFinalizacao']);
$tarefa->setAtivo ( $ativo );



if ($tarefaDao->insert ( $tarefa )) {
    echo '<p class="alert alert-success" role="alert">Tarefa '.$tarefa->getNome().' adicionada com sucesso</p>';
    echo '<p></p><a href="adicionaTarefa.php">Adiciona tarefas</a></p>';
}else{
    echo '<p class="alert alert-danger" role="alert">Tarefa '.$tarefa->getNome().' não adicionada</p>';
}