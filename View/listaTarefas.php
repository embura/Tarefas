<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=GBK">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="Resources/css/style.css">
    <script type="text/javascript" src="Resources/js/jquery-1.11.3.min.js" ></script>



    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="Resources/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="Resources/css/bootstrap-theme.min.css" />

    <!-- Latest compiled and minified JavaScript -->
    <script src="Resources/js/bootstrap.min.js"></script>

    <script src="Resources/js/tarefa.js"></script>

    <title>Lista Tarefa</title>
</head>
<body>

<h2>Lista tarefas</h2>

<div>
    <div  >
        <ul class="nav nav-pills">
            <il>
                <a class="btn btn-primary" href="adicionaTarefa.php">Nova Tarefa</a>
            </il>
            <il>
                <label>Busca</label>
                <span class="glyphicon-search" ></span>
                <input type="search" id="search" placeholder="Nome da Tarefa..."/>
            </il>
        </ul>

    </div>
</div>

<?php

if(!defined('ROOT_DIR'))
    define('ROOT_DIR',$_SERVER['DOCUMENT_ROOT'].'/Tarefas/');


require_once ROOT_DIR.'/Model/tarefa.php';
require_once ROOT_DIR.'/DAO/tarefaDao.php';

$tarefaDao = new tarefaDao();
$tarefas = $tarefaDao->selectAll();
?>


<p></p><a href="menuTarefas.php">Menu tarefas</a></p>

<div id="result"></div>
<div class="col-md-10 col-md-offset-1">
    <table class="table  table-striped table-bordered table-condensed" id="lista">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data Finalização</th>
            <th>Editar</th>
            <th>Remover</th>
        </tr>
        <?php
        foreach ( $tarefas as $tarefa ) {
            ?>
            <tr id=tarefa_<?=$tarefa->getID();?>>
                <td><?=$tarefa->getID();?></td>
                <td class="nome" ><?=$tarefa->getNome();?></td>
                <td class="tdDate">
                    <?php if($tarefa->getAtivo() == 1){?>
                        <a href="#" onClick="return  finalizaTarefa('<?=$tarefa->getID();?>')" >Finalizar</a>
                    <?php }else{?>
                        <?=($tarefa->getDataFinalizacao());?>
                    <?php }?>
                </td>
                <td>
                    <a href="editaTarefa.php?id=<?=$tarefa->getID()?>" >Editar</a>
                </td>
                <td>
                    <a href="#" onClick="removeTarefa(<?=$tarefa->getID();?>)" >Remover</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>



</body>
</html>