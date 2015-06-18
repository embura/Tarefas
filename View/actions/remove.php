<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jefferson
 * Date: 23/05/15
 * Time: 06:59
 * To change this template use File | Settings | File Templates.
 */
require_once '../../DAO/tarefaDao.php';
$tarefaDao = new tarefaDao ();

$id = $_REQUEST['idTarefa'];
if($tarefaDao->delete($id)){
    return true;
}

